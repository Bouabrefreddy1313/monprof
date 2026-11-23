<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'prenom',
        'telephone',
        'email',
        'moyen_contact_prefere',
        'creneau_rappel',
        'consentement',
        'consentement_date',
        'texte_recommandation',
        'cours_recommande_id',
        'titre_cours_recommande',
        'page_recommandee',
        'cours_alternatifs',
        'aucune_correspondance',
        'recommandation_manuelle',
        'statut',
        'assigned_to',
        'notes_internes',
    ];

    protected $casts = [
        'consentement' => 'boolean',
        'consentement_date' => 'datetime',
        'cours_alternatifs' => 'array',
        'page_recommandee' => 'array',
        'aucune_correspondance' => 'boolean',
        'recommandation_manuelle' => 'boolean',
    ];

    public function session()
    {
        return $this->belongsTo(DiagnosticSession::class, 'session_id');
    }

    public function coursRecommande()
    {
        return $this->belongsTo(Cours::class, 'cours_recommande_id');
    }

    public function assignee()
    {
        return $this->belongsTo(Admin::class, 'assigned_to');
    }

    public function activities()
    {
        return $this->hasMany(LeadActivity::class, 'lead_id')->orderBy('created_at', 'desc');
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->statut) {
            'nouveau' => 'badge-danger',
            'contacte' => 'badge-info',
            'en_discussion' => 'badge-warning',
            'converti' => 'badge-success',
            'perdu' => 'badge-secondary',
            default => 'badge-secondary',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->statut) {
            'nouveau' => 'Nouveau',
            'contacte' => 'Contacté',
            'en_discussion' => 'En discussion',
            'converti' => 'Converti',
            'perdu' => 'Perdu',
            default => ucfirst($this->statut),
        };
    }

    /**
     * Titre réellement affiché dans les dashboards, emails et exports.
     *
     * Le visiteur voit la PAGE recommandée par DiagnosticPageRecommendationService
     * dans le modal du diagnostic : c'est elle qui doit s'afficher en titre.
     * Le cours (DiagnosticRecommendationService) reste un complément, sauf si
     * l'admin a manuellement recommandé un autre cours (son choix prime).
     */
    public function getTitreRecommandationAttribute(): ?string
    {
        if (!$this->recommandation_manuelle && !empty($this->page_recommandee['titre'])) {
            return $this->page_recommandee['titre'];
        }

        return $this->titre_cours_recommande;
    }

    /**
     * URL de la page recommandée (null pour les leads antérieurs au backfill
     * ou quand l'admin a remplacé la recommandation manuellement).
     */
    public function getUrlPageRecommandeeAttribute(): ?string
    {
        if ($this->recommandation_manuelle) {
            return null;
        }

        return $this->page_recommandee['url'] ?? null;
    }

    /**
     * Libellé du type de page recommandée (« Soutien scolaire », « Activité »…).
     */
    public function getTypePageRecommandeeAttribute(): ?string
    {
        if ($this->recommandation_manuelle) {
            return null;
        }

        return $this->page_recommandee['type_label'] ?? null;
    }
}
