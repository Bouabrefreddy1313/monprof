<?php

namespace App\Services;

use App\Models\Subscriber;
use App\Models\Cours;
use App\Mail\CampaignMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewsletterCampaignService
{
    protected $campaigns = [
        'primaire' => [
            'subject' => 'Accompagnement scolaire primaire - Conseils et offres',
            'template' => 'emails.campaigns.primaire',
            'categories' => ['primaire', 'accompagnement', 'methode', 'minimetier', 'codage', 'petit'],
        ],
        'college' => [
            'subject' => 'Rentrée scolaire au collège : Nos solutions pour réussir',
            'template' => 'emails.campaigns.college',
            'categories' => ['college', 'soutien-college', 'soutien-brevet', 'college-methode', 'coaching'],
        ],
        'lycee' => [
            'subject' => 'Préparation Bac et orientations lycée - Programme exclusif',
            'template' => 'emails.campaigns.lycee',
            'categories' => ['lycee', 'lycee-sous', 'lycee-preparation', 'lycee-coaching', 'terminale', 'seconde', 'premiere'],
        ],
        'superieur' => [
            'subject' => 'DCG/DSCG et formations supérieures - Inscriptions ouvertes',
            'template' => 'emails.campaigns.superieur',
            'categories' => ['superieur', 'groupe', 'orientation-superieur', 'soutien-superieur', 'methode-superieur', 'reussir'],
        ],
        'sport' => [
            'subject' => 'Coaching sportif à domicile - Transformez votre corps',
            'template' => 'emails.campaigns.sport',
            'categories' => ['sport-adulte', 'sportenf', 'sportif'],
        ],
        'extra' => [
            'subject' => 'Activités extrascolaires - Musique, codage, langue...',
            'template' => 'emails.campaigns.extra',
            'categories' => ['musique', 'codage', 'petit', 'bouge', 'cabine', 'coaching'],
        ],
        'general' => [
            'subject' => 'Actualités MonProfChezMoi - Nouvelles formations et offres',
            'template' => 'emails.campaigns.general',
            'categories' => [],
        ],
    ];

    /**
     * Rotation des emails de présentation des formations.
     * Chaque abonné reçoit un email DIFFÉRENT à chaque cycle (tous les 10 jours),
     * selon son compteur `campaigns_sent_count`.
     */
    protected $formationCampaigns = [
        'discovery' => [
            'subject' => '🎓 Découvrez nos formations MonProfChezMoi',
            'template' => 'emails.campaigns.formation-discovery',
            'tagline' => 'Découvrez les formations qui peuvent transformer votre avenir',
            'keywords' => [],
        ],
        'soutien' => [
            'subject' => '📚 Soutien scolaire : primaire, collège & lycée',
            'template' => 'emails.campaigns.formation-soutien',
            'tagline' => 'Accompagnement personnalisé pour la réussite scolaire de votre enfant',
            'keywords' => ['primaire', 'collège', 'college', 'lycée', 'lycee', 'brevet', 'bac', 'soutien', 'math', 'français', 'anglais'],
        ],
        'superieur' => [
            'subject' => '🏆 Formations supérieures & diplômantes',
            'template' => 'emails.campaigns.formation-superieur',
            'tagline' => 'DCG, DSCG, comptabilité, gestion, développement web et plus encore',
            'keywords' => ['DCG', 'DSCG', 'supérieur', 'superieur', 'comptabilité', 'gestion', 'finance', 'web', 'management', 'audit', 'banque'],
        ],
        'extra-sport' => [
            'subject' => '⚽ Sport & activités extrascolaires pour tous',
            'template' => 'emails.campaigns.formation-extra-sport',
            'tagline' => 'Équilibre, épanouissement et talents : sport, codage, musique',
            'keywords' => ['sport', 'codage', 'musique', 'dessin', 'art', 'langue', 'échecs', 'danse', 'loisir'],
        ],
    ];

    /**
     * Envoie les campagnes aux abonnés.
     *
     * @param bool $force  Si true, ignore le délai de 10 jours (envoie à tous les actifs).
     * @param bool $dryRun Si true, simule sans réellement envoyer.
     */
    public function sendCampaigns(bool $force = false, bool $dryRun = false)
    {
        $subscribers = $force
            ? Subscriber::active()->get()
            : Subscriber::needsCampaign()->get();

        $sentCount = 0;
        $errors = [];

        foreach ($subscribers as $subscriber) {
            try {
                $campaign = $this->selectCampaign($subscriber);

                if (!$campaign) {
                    continue;
                }

                $courses = $this->getFeaturedCourses($campaign);

                $mail = new CampaignMail($campaign['subject'], $subscriber, $campaign['template'], $courses);

                if ($dryRun) {
                    Log::info('Newsletter DRY-RUN', [
                        'email' => $subscriber->email,
                        'campaign' => $campaign['subject'],
                        'template' => $campaign['template'],
                        'courses' => $courses->pluck('titre')->all(),
                    ]);
                    $sentCount++;
                    continue;
                }

                Mail::to($subscriber->email)->send($mail);

                $subscriber->update([
                    'last_campaign_sent_at' => now(),
                    'campaigns_sent_count' => $subscriber->campaigns_sent_count + 1,
                ]);

                $sentCount++;
            } catch (\Exception $e) {
                $errors[] = "Failed for {$subscriber->email}: " . $e->getMessage();
                Log::error('Campaign mail failed', [
                    'email' => $subscriber->email,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return [
            'sent' => $sentCount,
            'total' => $subscribers->count(),
            'errors' => $errors,
        ];
    }

    protected function selectCampaign(Subscriber $subscriber): ?array
    {
        // 1) Campagne ciblée selon le centre d'intérêt, si connu.
        if ($subscriber->interest_category && isset($this->campaigns[$subscriber->interest_category])) {
            return $this->campaigns[$subscriber->interest_category];
        }

        // 2) Sinon, rotation des emails de présentation des formations.
        //    Chaque cycle (tous les 10 jours) envoie un email différent.
        $rotation = array_values($this->formationCampaigns);
        $index = $subscriber->campaigns_sent_count % count($rotation);

        return $rotation[$index];
    }

    /**
     * Sélectionne les cours/formations à mettre en avant dans l'email de campagne.
     * Utilise les mots-clés du thème, avec repli sur les derniers cours disponibles.
     *
     * @param array|null $campaign
     */
    protected function getFeaturedCourses(?array $campaign, int $limit = 3): \Illuminate\Database\Eloquent\Collection
    {
        $query = Cours::query()->with('formation')->limit($limit);

        if ($campaign && !empty($campaign['keywords'])) {
            $keywords = $campaign['keywords'];
            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->orWhere('titre', 'like', "%{$keyword}%")
                      ->orWhere('description', 'like', "%{$keyword}%")
                      ->orWhereHas('formation', function ($f) use ($keyword) {
                          $f->where('titre', 'like', "%{$keyword}%");
                      });
                }
            });
        }

        $courses = $query->get();

        // Repli : si aucun cours ne correspond, on prend les derniers disponibles.
        if ($courses->isEmpty()) {
            $courses = Cours::query()->with('formation')
                ->latest()
                ->limit($limit)
                ->get();
        }

        return $courses;
    }

    public function trackPageVisit($email, $page)
    {
        $subscriber = Subscriber::where('email', $email)->first();

        if (!$subscriber) {
            return;
        }

        $category = $this->detectCategory($page);

        $subscriber->update([
            'last_visited_page' => $page,
            'interest_category' => $category,
        ]);
    }

    protected function detectCategory(string $page): ?string
    {
        $categories = [
            'primaire' => ['primaire', 'accompagnement', 'methode', 'minimetier', 'codage', 'petit', 'musique', 'bouge', 'cabine', 'sportenf'],
            'college' => ['college', 'soutien-college', 'soutien-brevet', 'college-methode', 'college-competence', 'college-digital', 'coaching'],
            'lycee' => ['lycee', 'lycee-sous', 'lycee-preparation', 'lycee-coaching', 'terminale', 'seconde', 'premiere'],
            'superieur' => ['superieur', 'groupe', 'orientation-superieur', 'soutien-superieur', 'methode-superieur', 'reussir'],
            'sport' => ['sport-adulte', 'sportenf', 'sportif'],
            'extra' => ['musique', 'codage', 'petit', 'bouge', 'cabine', 'coaching', 'minimetier'],
        ];

        foreach ($categories as $category => $pages) {
            if (in_array($page, $pages)) {
                return $category;
            }
        }

        return 'general';
    }
}
