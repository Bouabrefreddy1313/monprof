# 📬 Problème des campagnes email – Résolu

## Diagnostic

Le code est correctement configuré :
- ✅ Configuration mail SMTP Hostinger
- ✅ Commande `newsletter:send-campaigns` créée
- ✅ Service d'envoi `NewsletterCampaignService`
- ✅ Modèle `Subscriber` avec logique d'envoi
- ✅ Vue du popup et inscription fonctionnelle

**PROBLÈME :** Le scheduler Laravel n'est **pas actif** sur le serveur (cron `php artisan schedule:run` absent).  
Sans lui, la campagne ne se déclenche **jamais** automatiquement. L'envoi manuel admin était aussi cassé.

---

## ✅ Corrections apportées (code inclus)

### 1. Rotation d'emails de présentation des formations — **un nouvel email tous les 10 jours**
Le service `NewsletterCampaignService` contient une rotation de **4 campagnes de formation** :

1. `formation-discovery` → « 🎓 Découvrez nos formations MonProfChezMoi »
2. `formation-soutien` → « 📚 Soutien scolaire : primaire, collège & lycée »
3. `formation-superieur` → « 🏆 Formations supérieures & diplômantes »
4. `formation-extra-sport` → « ⚽ Sport & activités extrascolaires »

L'abonné reçoit un **email différent à chaque cycle (tous les 10 jours)** selon son compteur `campaigns_sent_count` :
`$index = $campaigns_sent_count % count($formationCampaigns)`.
La cible reste l'ensemble des **abonnés actifs** inscrits via le popup newsletter.

### 2. Cadence : **tous les 10 jours**
- `Subscriber::needsCampaign()` → `now()->subDays(10)`
- `app/Console/Kernel.php` → la commande tourne chaque jour à **9h00** (le scope `needsCampaign` garantit l'espacement de 10 jours).

### 3. Bug `getFeaturedCourses()` corrigé (colonne `slug` absente)
Cette méthode requêtait la colonne **`slug`** de la table **`formations`**, qui **n'existe pas** → erreur SQL → campagne échouait. Elle cible désormais `titre`/`description`/`formations.titre` selon les mots-clés, avec repli sur les derniers cours.

### 4. Bug envoi manuel admin corrigé
`CampaignMail($subject, $body)` (admin) envoyait une **string** là où `Subscriber $subscriber` était attendu → `TypeError`.  
`CampaignMail` accepte désormais `$subscriber = null` **et** `string` → l'envoi admin manuel refonctionne.

---

## ⚙️ Configurer le CRON (indispensable)

```bash
* * * * * cd /home/u215778782/domains/monprofchezmoi-ci.com/public_html && php artisan schedule:run >> /dev/null 2>&1
```

Vérifie **chaque minute** les tâches planifiées. La commande `newsletter:send-campaigns` est planifiée chaque jour à **9h00** ; le scope (10 jours) protège les abonnés déjà servis.

---

## Vérification

### A. Test manuel immédiat
```bash
cd /home/u215778782/domains/monprofchezmoi-ci.com/public_html
php artisan newsletter:send-campaigns
```
Résultat attendu :
```
Starting newsletter campaign...
Campaign completed!
Sent: X/Y
```

### B. Vérifier la rotation des emails
Relance la commande **immédiatement** une deuxième fois, puis inspecte les données :
- Les abonnés reçoivent un **email différent** du précédent (`campaigns_sent_count` avance).
- Erreurs éventuelles visibles dans `storage/logs/laravel.log`.

### C. Options de la commande
```bash
php artisan newsletter:send-campaigns --force     # ignore le délai de 10 jours
php artisan newsletter:send-campaigns --dry-run   # simule sans envoyer
```

---

## Notes importantes

- Les emails ne sont envoyés qu'aux abonnés **actifs** (`is_active = true`).
- Un email est envoyé seulement si le dernier envoi date de **plus de 10 jours**.
- Les erreurs d'envoi sont loggées dans `storage/logs/laravel.log`.
- Sans le cron ci-dessus, aucun envoi automatique n'a lieu : c'est la clé du problème.