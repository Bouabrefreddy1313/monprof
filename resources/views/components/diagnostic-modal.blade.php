@if(!request()->is('admin*') && !request()->is('superadmin*') && !auth('admin')->check() && !auth('superadmin')->check())

<!-- Floating CTA Button -->
<div id="diagnosticFloatingBtn" class="diagnostic-float-btn" onclick="openDiagnosticModal()">
    <div class="pulse-ring"></div>
    <span class="float-icon">🎯</span>
    <span class="float-text">Trouver ma solution</span>
</div>

<!-- Modal Container -->
<div id="diagnosticModalOverlay" class="diagnostic-overlay" style="display: none;">
    <div class="diagnostic-modal-card" role="dialog" aria-modal="true" aria-labelledby="diagHeaderTitle">
        <!-- Close Button -->
        <button type="button" class="diagnostic-close-btn" onclick="closeDiagnosticModal(true)" aria-label="Fermer le diagnostic">
            <i class="fas fa-times"></i>
        </button>

        <!-- Header -->
        <div class="diagnostic-header">
            <div class="diagnostic-brand">
                <span class="brand-badge"><i class="fas fa-sparkles"></i> Diagnostic Gratuit &bull; 2 min</span>
            </div>
            <h2 id="diagHeaderTitle" class="diagnostic-title">Trouvez la solution idéale pour vous ou votre enfant</h2>
            <p id="diagHeaderSubtitle" class="diagnostic-subtitle">
                Répondez à quelques questions et découvrez instantanément les accompagnements, cours ou formations adaptés.
            </p>

            <!-- Progress Bar -->
            <div class="diagnostic-progress-wrap" id="diagnosticProgressWrap" style="display: none;">
                <div class="progress-info">
                    <span id="progressStepText">Question 1</span>
                    <span id="progressPercentageText">15%</span>
                </div>
                <div class="progress-bar-bg">
                    <div id="diagnosticProgressBar" class="progress-bar-fill" style="width: 15%;"></div>
                </div>
            </div>
        </div>

        <!-- Body / Screens -->
        <div class="diagnostic-body">
            <!-- Screen 1: Loading state -->
            <div id="diagScreenLoading" class="diag-screen text-center py-5">
                <div class="spinner-grow text-orange" role="status" style="width: 3rem; height: 3rem;">
                    <span class="visually-hidden">Chargement...</span>
                </div>
                <p class="mt-3 text-muted">Préparation de votre questionnaire sur mesure...</p>
            </div>

            <!-- Screen 2: Dynamic Question Screen -->
            <div id="diagScreenQuestion" class="diag-screen" style="display: none;">
                <div class="question-header">
                    <button type="button" id="diagBtnBack" class="btn-diag-back" onclick="goToPreviousQuestion()" style="display: none;">
                        <i class="fas fa-arrow-left"></i> Retour
                    </button>
                    <h3 id="diagQuestionTitle" class="question-title">Titre de la question</h3>
                    <p id="diagQuestionDesc" class="question-desc"></p>
                </div>

                <!-- Dynamic domain search for Parcours B -->
                <div id="diagDomainSearchWrap" style="display: none;" class="mb-3">
                    <div class="search-input-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="diagDomainSearchInput" placeholder="Rechercher un domaine ou une filière..." oninput="filterDomains(this.value)">
                    </div>
                </div>

                <!-- Options List Grid -->
                <div id="diagOptionsGrid" class="options-grid"></div>

                <!-- Multi-choice Continue Button -->
                <div id="diagMultiChoiceActions" class="mt-4 text-center" style="display: none;">
                    <button type="button" id="diagBtnMultiContinue" class="btn-diag-primary" onclick="submitMultipleChoiceAnswer()">
                        Continuer <i class="fas fa-chevron-right ms-2"></i>
                    </button>
                </div>
            </div>

            <!-- Screen 3: Recommendation & Results -->
            <div id="diagScreenResult" class="diag-screen" style="display: none;">
                <div class="result-celebration text-center">
                    <span class="celebration-badge"><i class="fas fa-check-circle"></i> Votre profil analysé</span>
                    <h3 class="result-title">Voici ce qui pourrait vous correspondre</h3>
                </div>

                <!-- Page du site recommandée (moteur de recommandation de pages) -->
                <div id="diagRecommendedPageWrap" style="display: none;">
                    <div id="diagRecommendedPageCard"></div>
                    <div id="diagRecommendedAltWrap" class="mt-4" style="display: none;">
                        <h4 id="diagAltHeading" class="alternatives-title"><i class="fas fa-link"></i> Autres pages qui pourraient vous intéresser</h4>
                        <div id="diagRecommendedAltList" class="alternatives-grid"></div>
                    </div>
                </div>

                <!-- Lead Capture Form -->
                <div class="lead-capture-box mt-4">
                    <div class="capture-header">
                        <i class="fas fa-gift text-orange"></i>
                        <div>
                            <h4>Recevez gratuitement votre sélection personnalisée</h4>
                            <p>Échangez avec l'un de nos conseillers spécialisés sans aucun engagement.</p>
                        </div>
                    </div>

                    <form id="diagLeadForm" onsubmit="submitDiagnosticLead(event)">
                        <!-- Honeypot anti-bot -->
                        <input type="text" name="website_verify_hp" id="diagHoneypot" style="display:none !important;" tabindex="-1" autocomplete="off">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="leadPrenom" class="form-label required">Votre Prénom</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" id="leadPrenom" class="diag-input" placeholder="Ex: Jean, Fatou..." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="leadTelephone" class="form-label required">Numéro de Téléphone</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-phone-alt"></i>
                                    <input type="tel" id="leadTelephone" class="diag-input" placeholder="+225 07 00 00 00 00" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="leadEmail" class="form-label">Adresse E-mail (optionnel, pour recevoir votre récapitulatif)</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" id="leadEmail" class="diag-input" placeholder="votre-email@exemple.com">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label required">Moyen de contact préféré :</label>
                                <div class="contact-channels-grid">
                                    <label class="channel-pill">
                                        <input type="radio" name="moyen_contact" value="whatsapp" checked>
                                        <span class="pill-content"><i class="fab fa-whatsapp"></i> WhatsApp</span>
                                    </label>
                                    <label class="channel-pill">
                                        <input type="radio" name="moyen_contact" value="appel">
                                        <span class="pill-content"><i class="fas fa-phone"></i> Appel</span>
                                    </label>
                                    <label class="channel-pill">
                                        <input type="radio" name="moyen_contact" value="sms">
                                        <span class="pill-content"><i class="fas fa-sms"></i> SMS</span>
                                    </label>
                                    <label class="channel-pill">
                                        <input type="radio" name="moyen_contact" value="email">
                                        <span class="pill-content"><i class="fas fa-envelope"></i> Email</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="leadCreneau" class="form-label">Meilleur créneau pour être rappelé(e) (optionnel) :</label>
                                <select id="leadCreneau" class="diag-select">
                                    <option value="">Peu importe / Dès que possible</option>
                                    <option value="Matinée (9h - 12h)">Matinée (9h - 12h)</option>
                                    <option value="Midi (12h - 14h)">Midi (12h - 14h)</option>
                                    <option value="Après-midi (14h - 18h)">Après-midi (14h - 18h)</option>
                                    <option value="Soirée (18h - 20h)">Soirée (18h - 20h)</option>
                                    <option value="Le samedi">Le samedi</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="consent-checkbox-wrap">
                                    <input type="checkbox" id="leadConsentement" required>
                                    <span class="consent-text">
                                        J'accepte d'être recontacté(e) par l'équipe MonProfChezMoi au sujet de ma recommandation personnalisée. Vos données restent strictement confidentielles.
                                    </span>
                                </label>
                            </div>

                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" id="btnSubmitLead" class="btn-diag-submit">
                                    <span>Envoyer et recevoir ma sélection</span>
                                    <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                                <div id="leadFormFeedback" class="mt-2" style="display: none;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Screen 4: Success confirmation screen -->
            <div id="diagScreenSuccess" class="diag-screen text-center py-4" style="display: none;">
                <div class="success-icon-wrap">
                    <i class="fas fa-check"></i>
                </div>
                <h3 class="success-title">Demande transmise avec succès !</h3>
                <p class="success-desc">
                    Merci <strong id="successLeadName"></strong> ! Notre conseiller pédagogique a bien reçu votre diagnostic et prépare votre orientation personnalisée.
                </p>

                <div class="whatsapp-direct-box p-4 my-4">
                    <p class="mb-2 fw-bold text-dark">Vous souhaitez échanger tout de suite avec nous ?</p>
                    <a id="btnDirectWhatsapp" href="#" target="_blank" rel="noopener noreferrer" class="btn-whatsapp-direct">
                        <i class="fab fa-whatsapp me-2"></i> Échanger maintenant sur WhatsApp
                    </a>
                </div>

                <button type="button" class="btn-diag-outline mt-2" onclick="closeDiagnosticModal(false)">
                    Fermer et poursuivre la visite du site
                </button>

                <div class="text-center mt-3">
                    <button type="button" class="btn-link-dismiss" style="text-decoration: underline; font-size: 0.88rem;" onclick="restartDiagnostic()">
                        <i class="fas fa-redo-alt me-1"></i> Recommencer un autre diagnostic
                    </button>
                </div>
            </div>
        </div>

        <!-- Footer Dismiss Link -->
        <div class="diagnostic-footer text-center" id="diagFooterDismiss">
            <button type="button" class="btn-link-dismiss" onclick="closeDiagnosticModal(true)">
                Passer pour le moment / Plus tard
            </button>
        </div>
    </div>
</div>

<style>
/* ========================================================
   DIAGNOSTIC PERSONNALISÉ — DESIGN SYSTEM WOW AESTHETICS
   Orange: #FF6B35 | Dark Blue: #0A1628 | White: #FFFFFF
   ======================================================== */
.diagnostic-float-btn {
    position: fixed;
    bottom: 28px;
    left: 28px;
    z-index: 9998;
    background: linear-gradient(135deg, #FF6B35, #E85A2B);
    color: #ffffff;
    padding: 14px 22px;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-weight: 800;
    font-size: 0.95rem;
    box-shadow: 0 10px 30px rgba(255, 107, 53, 0.38);
    cursor: pointer;
    transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    user-select: none;
}
.diagnostic-float-btn:hover {
    transform: translateY(-4px) scale(1.04);
    box-shadow: 0 14px 38px rgba(255, 107, 53, 0.48);
}
.diagnostic-float-btn .float-icon {
    font-size: 1.25rem;
    animation: bounceIcon 2s infinite ease-in-out;
}
.pulse-ring {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    border-radius: 50px;
    background: rgba(255, 107, 53, 0.45);
    animation: floatPulse 2.4s infinite;
    pointer-events: none;
    z-index: -1;
}
@keyframes floatPulse {
    0% { transform: scale(1); opacity: 0.8; }
    100% { transform: scale(1.35); opacity: 0; }
}
@keyframes bounceIcon {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-4px); }
}

/* Overlay & Card */
.diagnostic-overlay {
    position: fixed;
    inset: 0;
    background: rgba(10, 22, 40, 0.72);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    opacity: 0;
    animation: diagFadeIn 0.3s forwards ease;
    overflow-y: auto;
}
.diagnostic-modal-card {
    background: #ffffff;
    width: 100%;
    max-width: 680px;
    border-radius: 24px;
    box-shadow: 0 25px 70px rgba(10, 22, 40, 0.28);
    position: relative;
    overflow: hidden;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    animation: diagSlideUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
.diagnostic-close-btn {
    position: absolute;
    top: 18px;
    right: 20px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(10, 22, 40, 0.06);
    border: none;
    color: #0A1628;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.2s ease;
    z-index: 10;
}
.diagnostic-close-btn:hover {
    background: #FF6B35;
    color: #ffffff;
    transform: rotate(90deg);
}

/* Header */
.diagnostic-header {
    background: linear-gradient(135deg, #0A1628 0%, #1A2E4C 100%);
    color: #ffffff;
    padding: 28px 32px 22px;
    position: relative;
}
.brand-badge {
    display: inline-block;
    background: rgba(255, 107, 53, 0.2);
    color: #FF8C5A;
    border: 1px solid rgba(255, 107, 53, 0.35);
    padding: 4px 12px;
    border-radius: 50px;
    font-size: 0.76rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    margin-bottom: 12px;
    text-transform: uppercase;
}
.diagnostic-title {
    font-size: 1.35rem;
    font-weight: 800;
    line-height: 1.3;
    margin: 0 0 6px;
    color: #ffffff;
    padding-right: 35px;
}
.diagnostic-subtitle {
    font-size: 0.88rem;
    color: rgba(255, 255, 255, 0.78);
    margin: 0;
    line-height: 1.5;
}

/* Progress */
.diagnostic-progress-wrap {
    margin-top: 18px;
}
.progress-info {
    display: flex;
    justify-content: space-between;
    font-size: 0.78rem;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.85);
    margin-bottom: 6px;
}
.progress-bar-bg {
    height: 6px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 10px;
    overflow: hidden;
}
.progress-bar-fill {
    height: 100%;
    background: linear-gradient(90deg, #FF6B35, #FF8C5A);
    border-radius: 10px;
    transition: width 0.4s ease;
}

/* Body */
.diagnostic-body {
    padding: 28px 32px;
    overflow-y: auto;
    flex: 1;
}
.question-header {
    margin-bottom: 22px;
}
.btn-diag-back {
    background: none;
    border: none;
    color: #5F6368;
    font-weight: 700;
    font-size: 0.85rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 0;
    margin-bottom: 10px;
    transition: color 0.2s;
}
.btn-diag-back:hover {
    color: #FF6B35;
}
.question-title {
    font-size: 1.25rem;
    font-weight: 800;
    color: #0A1628;
    margin: 0 0 6px;
}
.question-desc {
    font-size: 0.88rem;
    color: #5F6368;
    margin: 0;
}

/* Options Grid */
.options-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.option-card {
    border: 2px solid #E8EAED;
    border-radius: 16px;
    padding: 16px 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    cursor: pointer;
    transition: all 0.25s cubic-bezier(0.165, 0.84, 0.44, 1);
    background: #ffffff;
    user-select: none;
    text-align: left;
    width: 100%;
}
.option-card:hover {
    border-color: #FF8C5A;
    background: #FFF7ED;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 107, 53, 0.12);
}
.option-card.selected {
    border-color: #FF6B35;
    background: #FFF7ED;
    box-shadow: 0 8px 24px rgba(255, 107, 53, 0.18);
}
.option-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: #F1F3F4;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0A1628;
    font-size: 1.15rem;
    flex-shrink: 0;
    transition: all 0.25s ease;
}
.option-card:hover .option-icon,
.option-card.selected .option-icon {
    background: #FF6B35;
    color: #ffffff;
}
.option-label {
    font-size: 0.98rem;
    font-weight: 700;
    color: #0A1628;
    flex: 1;
}
.option-check {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border: 2px solid #D1D5DB;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    color: transparent;
    transition: all 0.2s ease;
}
.option-card.selected .option-check {
    background: #FF6B35;
    border-color: #FF6B35;
    color: #ffffff;
}

/* Domain search */
.search-input-box {
    position: relative;
}
.search-input-box i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #9AA0A6;
}
.search-input-box input {
    width: 100%;
    padding: 12px 16px 12px 42px;
    border-radius: 12px;
    border: 2px solid #E8EAED;
    font-size: 0.92rem;
    outline: none;
    transition: border-color 0.2s;
}
.search-input-box input:focus {
    border-color: #FF6B35;
}

/* Buttons */
.btn-diag-primary,
.btn-diag-submit {
    background: linear-gradient(135deg, #FF6B35, #E85A2B);
    color: #ffffff;
    border: none;
    padding: 14px 28px;
    border-radius: 12px;
    font-weight: 800;
    font-size: 1rem;
    cursor: pointer;
    box-shadow: 0 8px 24px rgba(255, 107, 53, 0.28);
    transition: all 0.25s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.btn-diag-primary:hover,
.btn-diag-submit:hover {
    background: linear-gradient(135deg, #E85A2B, #D0481B);
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(255, 107, 53, 0.38);
    color: #ffffff;
}

/* Results Cards */
.celebration-badge {
    display: inline-block;
    background: #D1FAE5;
    color: #065F46;
    padding: 5px 14px;
    border-radius: 50px;
    font-weight: 800;
    font-size: 0.8rem;
    margin-bottom: 8px;
}
.result-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0A1628;
    margin-bottom: 20px;
}
.primary-course-card {
    background: #ffffff;
    border: 2px solid #FF8C5A;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 12px 32px rgba(255, 107, 53, 0.15);
    margin-bottom: 20px;
}
.course-card-inner {
    padding: 24px;
}
.course-badge-top {
    background: #FF6B35;
    color: #ffffff;
    font-size: 0.75rem;
    font-weight: 800;
    padding: 4px 10px;
    border-radius: 6px;
    text-transform: uppercase;
    display: inline-block;
    margin-bottom: 10px;
}
.course-card-title {
    font-size: 1.25rem;
    font-weight: 800;
    color: #0A1628;
    margin-bottom: 8px;
}
.course-card-desc {
    font-size: 0.9rem;
    color: #5F6368;
    line-height: 1.5;
    margin-bottom: 16px;
}
.course-meta-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 18px;
}
.meta-chip {
    background: #F1F3F4;
    padding: 5px 12px;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 700;
    color: #3C4043;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.btn-view-course {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #FF6B35;
    font-weight: 800;
    font-size: 0.92rem;
    text-decoration: none;
    transition: all 0.2s ease;
}
.btn-view-course:hover {
    color: #E85A2B;
    transform: translateX(4px);
}

/* Page du site recommandée */
.recommended-page-card {
    background: linear-gradient(135deg, #FFF6F1 0%, #FFFFFF 60%);
    border: 2px solid #FF6B35;
    border-radius: 20px;
    padding: 22px 24px;
    box-shadow: 0 12px 32px rgba(255, 107, 53, 0.15);
    margin-bottom: 22px;
}
.recommended-badge {
    background: #0A1628;
    color: #ffffff;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: .3px;
    padding: 5px 12px;
    border-radius: 50px;
    text-transform: uppercase;
    display: inline-block;
    margin-bottom: 14px;
}
.recommended-head {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 10px;
}
.recommended-icon {
    flex: 0 0 auto;
    width: 48px;
    height: 48px;
    border-radius: 14px;
    background: #FF6B35;
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}
.recommended-head .course-card-title {
    margin-bottom: 4px;
}
.recommended-type {
    display: inline-block;
    background: #F1F3F4;
    color: #3C4043;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 50px;
}
.btn-recommended-page {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #FF6B35, #E85A2B);
    color: #ffffff;
    font-weight: 800;
    font-size: 0.95rem;
    padding: 12px 22px;
    border-radius: 50px;
    text-decoration: none;
    box-shadow: 0 10px 24px rgba(255, 107, 53, 0.3);
    transition: all 0.2s ease;
}
.btn-recommended-page:hover {
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 14px 30px rgba(255, 107, 53, 0.38);
}
.recommended-alt-card {
    background: #FAFBFC;
    border: 1px solid #E8EAED;
    border-radius: 14px;
    padding: 12px 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
}
.recommended-alt-card h5 {
    margin: 0 0 3px;
    font-size: 0.92rem;
    font-weight: 700;
    color: #0A1628;
}
.recommended-alt-card p {
    margin: 0;
    font-size: 0.78rem;
    color: #5F6368;
}

.personalized-rationale {
    background: #F8F9FA;
    border-left: 4px solid #FF6B35;
    border-radius: 12px;
    padding: 18px 20px;
    margin-bottom: 20px;
}
.rationale-header {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 6px;
}
.rationale-header h4 {
    margin: 0;
    font-size: 1rem;
    font-weight: 800;
    color: #0A1628;
}
.starting-tip {
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid #E8EAED;
    display: flex;
    gap: 10px;
    font-size: 0.88rem;
    color: #3C4043;
}

/* Alternatives */
.alternatives-title {
    font-size: 1.05rem;
    font-weight: 800;
    color: #0A1628;
    margin-bottom: 12px;
}
.alternatives-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 10px;
}
.alt-card {
    background: #FAFBFC;
    border: 1px solid #E8EAED;
    border-radius: 14px;
    padding: 14px 18px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.alt-card h5 {
    margin: 0 0 4px;
    font-size: 0.95rem;
    font-weight: 700;
    color: #0A1628;
}
.alt-card p {
    margin: 0;
    font-size: 0.8rem;
    color: #5F6368;
}

/* Lead capture box */
.lead-capture-box {
    background: #FFF7ED;
    border: 1.5px solid rgba(255, 107, 53, 0.25);
    border-radius: 20px;
    padding: 24px;
}
.capture-header {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    margin-bottom: 20px;
}
.capture-header i {
    font-size: 1.6rem;
    margin-top: 2px;
}
.capture-header h4 {
    margin: 0 0 4px;
    font-size: 1.15rem;
    font-weight: 800;
    color: #0A1628;
}
.capture-header p {
    margin: 0;
    font-size: 0.85rem;
    color: #5F6368;
}

.diag-input, .diag-select {
    width: 100%;
    padding: 12px 14px;
    border-radius: 10px;
    border: 1.5px solid #E8EAED;
    font-size: 0.92rem;
    outline: none;
    transition: all 0.2s;
    background: #ffffff;
}
.input-with-icon {
    position: relative;
}
.input-with-icon i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #9AA0A6;
}
.input-with-icon .diag-input {
    padding-left: 40px;
}
.diag-input:focus, .diag-select:focus {
    border-color: #FF6B35;
    box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.15);
}

.contact-channels-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
}
.channel-pill {
    cursor: pointer;
    margin: 0;
}
.channel-pill input {
    display: none;
}
.channel-pill .pill-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 10px 8px;
    border-radius: 10px;
    border: 1.5px solid #E8EAED;
    background: #ffffff;
    font-weight: 700;
    font-size: 0.85rem;
    color: #0A1628;
    transition: all 0.2s;
    text-align: center;
}
.channel-pill input:checked + .pill-content {
    border-color: #FF6B35;
    background: #FF6B35;
    color: #ffffff;
}

.consent-checkbox-wrap {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    cursor: pointer;
    font-size: 0.8rem;
    color: #5F6368;
    margin: 8px 0 0;
}
.consent-checkbox-wrap input {
    margin-top: 3px;
}

/* Success Screen */
.success-icon-wrap {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background: #D1FAE5;
    color: #059669;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin-bottom: 16px;
    animation: scaleBounce 0.5s ease;
}
.success-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0A1628;
    margin-bottom: 8px;
}
.success-desc {
    color: #5F6368;
    font-size: 0.95rem;
    max-width: 480px;
    margin: 0 auto;
}
.whatsapp-direct-box {
    background: #ECFDF5;
    border-radius: 16px;
    border: 1.5px solid #A7F3D0;
}
.btn-whatsapp-direct {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #25D366;
    color: #ffffff;
    text-decoration: none;
    font-weight: 800;
    font-size: 1rem;
    padding: 14px 26px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(37, 211, 102, 0.3);
    transition: all 0.25s ease;
}
.btn-whatsapp-direct:hover {
    background: #20BA5A;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(37, 211, 102, 0.4);
}
.btn-diag-outline {
    background: none;
    border: 1.5px solid #D1D5DB;
    padding: 10px 22px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.88rem;
    color: #5F6368;
    cursor: pointer;
    transition: all 0.2s;
}
.btn-diag-outline:hover {
    border-color: #0A1628;
    color: #0A1628;
}

/* Footer */
.diagnostic-footer {
    padding: 12px 20px 18px;
    background: #ffffff;
    border-top: 1px solid #F1F3F4;
}
.btn-link-dismiss {
    background: none;
    border: none;
    color: #9AA0A6;
    font-size: 0.82rem;
    font-weight: 600;
    cursor: pointer;
    transition: color 0.2s;
}
.btn-link-dismiss:hover {
    color: #FF6B35;
    text-decoration: underline;
}

/* Animations */
@keyframes diagFadeIn {
    to { opacity: 1; }
}
@keyframes diagSlideUp {
    from { transform: translateY(40px) scale(0.96); opacity: 0; }
    to { transform: translateY(0) scale(1); opacity: 1; }
}
@keyframes scaleBounce {
    0% { transform: scale(0.3); opacity: 0; }
    50% { transform: scale(1.15); }
    100% { transform: scale(1); opacity: 1; }
}

@media (max-width: 767px) {
    .diagnostic-float-btn {
        bottom: 20px;
        left: 20px;
        padding: 12px 18px;
        font-size: 0.88rem;
    }
    .diagnostic-modal-card {
        border-radius: 20px;
        max-height: 95vh;
    }
    .diagnostic-header {
        padding: 20px 22px 16px;
    }
    .diagnostic-title {
        font-size: 1.15rem;
    }
    .diagnostic-body {
        padding: 20px;
    }
    .contact-channels-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<script>
(function() {
    let sessionToken = null;
    let currentQuestion = null;
    let questionHistory = [];
    let multipleChoiceSelections = [];
    let realFormationsList = [];
    let redisplayDays = 7;
    let isInitialized = false;

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    // Utilitaire Cookie / LocalStorage
    function getStoredItem(key) {
        return localStorage.getItem(key) || getCookie(key);
    }
    function setStoredItem(key, val, days) {
        localStorage.setItem(key, val);
        setCookie(key, val, days);
    }
    function getCookie(name) {
        let v = "; " + document.cookie;
        let parts = v.split("; " + name + "=");
        if (parts.length === 2) return parts.pop().split(";").shift();
        return null;
    }
    function setCookie(name, val, days) {
        let d = new Date();
        d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = name + "=" + val + "; expires=" + d.toUTCString() + "; path=/";
    }

    // Télémétrie & Analytics Events
    function dispatchAnalytics(eventName, details) {
        try {
            window.dispatchEvent(new CustomEvent(eventName, { detail: details }));
            if (window.dataLayer && Array.isArray(window.dataLayer)) {
                window.dataLayer.push({ event: eventName, ...details });
            }
        } catch (e) {
            console.warn('Analytics event dispatch error', e);
        }
    }

    // Initialisation
    async function initDiagnostic() {
        if (isInitialized) return;
        try {
            const utmParams = new URLSearchParams(window.location.search);
            const res = await fetch('/api/diagnostic/init', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    session_token: localStorage.getItem('mppm_diagnostic_session'),
                    utm_source: utmParams.get('utm_source'),
                    utm_medium: utmParams.get('utm_medium'),
                    utm_campaign: utmParams.get('utm_campaign'),
                    page_entree: window.location.href,
                })
            });

            const data = await res.json();
            if (!data.active) {
                const btn = document.getElementById('diagnosticFloatingBtn');
                if (btn) btn.style.display = 'none';
                return;
            }

            sessionToken = data.session_token;
            localStorage.setItem('mppm_diagnostic_session', sessionToken);
            realFormationsList = data.real_formations || [];
            redisplayDays = data.delai_reaffichage || 7;

            if (data.accroche) {
                const sub = document.getElementById('diagHeaderSubtitle');
                if (sub) sub.textContent = data.accroche;
            }

            currentQuestion = data.first_question;
            isInitialized = true;

            // Détection ouverture automatique (après 6 secondes si non différé et non complété)
            checkAutoOpen();
        } catch (err) {
            console.error('Erreur initialisation diagnostic', err);
        }
    }

    function checkAutoOpen() {
        const isDismissed = getStoredItem('mppm_diagnostic_dismissed');
        const isCompleted = getStoredItem('mppm_diagnostic_completed');

        if (!isDismissed && !isCompleted) {
            setTimeout(() => {
                const isStillDismissed = getStoredItem('mppm_diagnostic_dismissed');
                if (!isStillDismissed && !document.getElementById('diagnosticModalOverlay').classList.contains('active-modal')) {
                    openDiagnosticModal();
                }
            }, 6000);
        }
    }

    window.openDiagnosticModal = function(forceRestart = false) {
        const overlay = document.getElementById('diagnosticModalOverlay');
        if (!overlay) return;
        overlay.style.display = 'flex';
        overlay.classList.add('active-modal');
        document.body.style.overflow = 'hidden';

        const resultScreen = document.getElementById('diagScreenResult');
        if (forceRestart || (resultScreen && resultScreen.style.display === 'block')) {
            window.restartDiagnostic();
            return;
        }

        if (!isInitialized) {
            initDiagnostic().then(() => renderCurrentQuestion());
        } else {
            renderCurrentQuestion();
        }

        dispatchAnalytics('diagnostic_demarre', { session_token: sessionToken });
    };

    window.restartDiagnostic = function() {
        localStorage.removeItem('mppm_diagnostic_session');
        localStorage.removeItem('mppm_diagnostic_completed');
        sessionToken = '';
        currentQuestion = null;
        questionHistory = [];
        multipleChoiceSelections = [];
        isInitialized = false;

        const resultScreen = document.getElementById('diagScreenResult');
        if (resultScreen) resultScreen.style.display = 'none';
        const wrap = document.getElementById('diagRecommendedPageWrap');
        if (wrap) wrap.style.display = 'none';
        const loading = document.getElementById('diagScreenLoading');
        if (loading) loading.style.display = 'block';

        initDiagnostic().then(() => renderCurrentQuestion());
    };

    window.closeDiagnosticModal = function(isDismissal = false) {
        const overlay = document.getElementById('diagnosticModalOverlay');
        if (!overlay) return;
        overlay.style.display = 'none';
        overlay.classList.remove('active-modal');
        document.body.style.overflow = '';

        if (isDismissal) {
            setStoredItem('mppm_diagnostic_dismissed', '1', redisplayDays);
        }
    };

    function renderCurrentQuestion() {
        document.getElementById('diagScreenLoading').style.display = 'none';
        document.getElementById('diagScreenResult').style.display = 'none';
        document.getElementById('diagRecommendedPageWrap').style.display = 'none';
        document.getElementById('diagScreenSuccess').style.display = 'none';
        document.getElementById('diagScreenQuestion').style.display = 'block';
        document.getElementById('diagnosticProgressWrap').style.display = 'block';

        if (!currentQuestion) return;

        // Titre & description
        document.getElementById('diagQuestionTitle').textContent = currentQuestion.titre;
        document.getElementById('diagQuestionDesc').textContent = currentQuestion.description || '';

        // Bouton retour
        const btnBack = document.getElementById('diagBtnBack');
        btnBack.style.display = (questionHistory.length > 0) ? 'inline-flex' : 'none';

        // Barre de progression
        const step = questionHistory.length + 1;
        const totalEstimated = 6;
        const pct = Math.min(95, Math.round((step / totalEstimated) * 100));
        document.getElementById('progressStepText').textContent = `Étape ${step}`;
        document.getElementById('progressPercentageText').textContent = `${pct}%`;
        document.getElementById('diagnosticProgressBar').style.width = `${pct}%`;

        const optionsGrid = document.getElementById('diagOptionsGrid');
        optionsGrid.innerHTML = '';
        multipleChoiceSelections = [];

        const isMulti = currentQuestion.type_champ === 'multiple_choice';
        const isDynamicDomain = currentQuestion.type_champ === 'dynamic_domain';

        document.getElementById('diagMultiChoiceActions').style.display = isMulti ? 'block' : 'none';
        document.getElementById('diagDomainSearchWrap').style.display = isDynamicDomain ? 'block' : 'none';

        if (isDynamicDomain) {
            renderDynamicDomains(realFormationsList);
            return;
        }

        const options = currentQuestion.options || [];
        options.forEach(opt => {
            const card = document.createElement('div');
            card.className = 'option-card';
            card.setAttribute('data-valeur', opt.valeur);
            card.onclick = () => handleOptionClick(opt, card, isMulti);

            const iconHtml = opt.icone ? `<i class="${opt.icone}"></i>` : '<i class="fas fa-check"></i>';
            card.innerHTML = `
                <div class="option-icon">${iconHtml}</div>
                <div class="option-label">${opt.label}</div>
                <div class="option-check"><i class="fas fa-check"></i></div>
            `;
            optionsGrid.appendChild(card);
        });
    }

    function renderDynamicDomains(formations) {
        const grid = document.getElementById('diagOptionsGrid');
        grid.innerHTML = '';

        if (!formations.length) {
            grid.innerHTML = '<p class="text-muted text-center">Aucun domaine trouvé.</p>';
            return;
        }

        formations.forEach(f => {
            const card = document.createElement('div');
            card.className = 'option-card';
            card.setAttribute('data-valeur', f.titre);
            card.onclick = () => {
                selectSingleOption(f.titre);
            };

            card.innerHTML = `
                <div class="option-icon"><i class="fas fa-graduation-cap"></i></div>
                <div class="option-label">
                    <strong>${f.titre}</strong>
                    ${f.sous_formations && f.sous_formations.length ? `<br><small class="text-muted">${f.sous_formations.length} filières disponibles</small>` : ''}
                </div>
                <div class="option-check"><i class="fas fa-check"></i></div>
            `;
            grid.appendChild(card);
        });
    }

    window.filterDomains = function(query) {
        const q = (query || '').toLowerCase().trim();
        const filtered = realFormationsList.filter(f => {
            if (f.titre.toLowerCase().includes(q)) return true;
            if (f.sous_formations) {
                return f.sous_formations.some(sf => sf.titre.toLowerCase().includes(q));
            }
            return false;
        });
        renderDynamicDomains(filtered);
    };

    function handleOptionClick(option, cardElement, isMulti) {
        if (!isMulti) {
            // Sélection unique : activation visuelle et envoi direct
            document.querySelectorAll('.option-card').forEach(c => c.classList.remove('selected'));
            cardElement.classList.add('selected');
            setTimeout(() => selectSingleOption(option.valeur), 200);
        } else {
            // Choix multiple : toggle
            const val = option.valeur;
            if (multipleChoiceSelections.includes(val)) {
                multipleChoiceSelections = multipleChoiceSelections.filter(v => v !== val);
                cardElement.classList.remove('selected');
            } else {
                multipleChoiceSelections.push(val);
                cardElement.classList.add('selected');
            }
        }
    }

    async function selectSingleOption(valeur) {
        await submitAnswer(valeur);
    }

    window.submitMultipleChoiceAnswer = async function() {
        if (!multipleChoiceSelections.length) {
            alert('Veuillez sélectionner au moins une option pour continuer.');
            return;
        }
        await submitAnswer(multipleChoiceSelections);
    };

    async function submitAnswer(answerValue) {
        try {
            questionHistory.push({
                question: currentQuestion,
                answer: answerValue,
            });

            dispatchAnalytics('question_repondue', {
                session_token: sessionToken,
                question_identifier: currentQuestion.code_identifiant,
                reponse: answerValue,
            });

            // Afficher le loader pendant le calcul
            document.getElementById('diagScreenQuestion').style.display = 'none';
            document.getElementById('diagScreenLoading').style.display = 'block';

            const res = await fetch('/api/diagnostic/answer', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    session_token: sessionToken,
                    question_identifier: currentQuestion.code_identifiant,
                    reponse: answerValue,
                })
            });

            const data = await res.json();
            if (data.is_finished || !data.next_question) {
                // Fin du questionnaire : demander la recommandation
                await loadRecommendation();
            } else {
                currentQuestion = data.next_question;
                renderCurrentQuestion();
            }
        } catch (err) {
            console.error('Erreur enregistrement réponse', err);
            document.getElementById('diagScreenLoading').style.display = 'none';
            document.getElementById('diagScreenQuestion').style.display = 'block';
        }
    }

    window.goToPreviousQuestion = function() {
        if (!questionHistory.length) return;
        const prev = questionHistory.pop();
        currentQuestion = prev.question;
        renderCurrentQuestion();
    };

    function diagEscapeHtml(value) {
        return String(value == null ? '' : value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    // Affiche la page ou le cours recommandé
    // renvoyé par le moteur DiagnosticPageRecommendationService.
    function renderRecommendedPage(page, alternatives) {
        const wrap = document.getElementById('diagRecommendedPageWrap');
        const card = document.getElementById('diagRecommendedPageCard');
        const altWrap = document.getElementById('diagRecommendedAltWrap');
        const altList = document.getElementById('diagRecommendedAltList');

        if (!wrap || !card) return;

        if (!page) {
            wrap.style.display = 'none';
            return;
        }

        const isFormation = page.type === 'formation';
        const badgeLabel = isFormation ? 'La formation la plus adaptée à votre profil' : 'La page la plus adaptée à votre profil';
        const btnLabel = isFormation ? 'Consulter cette formation' : 'Découvrir cette page';

        const altHeadingEl = document.getElementById('diagAltHeading');
        if (altHeadingEl) {
            altHeadingEl.innerHTML = isFormation
                ? '<i class="fas fa-graduation-cap"></i> Autres formations recommandées pour vous'
                : '<i class="fas fa-link"></i> Autres pages qui pourraient vous intéresser';
        }

        const icon = diagEscapeHtml(page.icone || (isFormation ? 'fas fa-briefcase' : 'fas fa-star'));
        card.innerHTML = `
            <div class="recommended-page-card">
                <span class="recommended-badge"><i class="fas fa-bullseye me-1"></i> ${badgeLabel}</span>
                <div class="recommended-head">
                    <span class="recommended-icon"><i class="${icon}"></i></span>
                    <div>
                        <h3 class="course-card-title">${diagEscapeHtml(page.titre)}</h3>
                        <span class="recommended-type">${diagEscapeHtml(page.type_label)}</span>
                    </div>
                </div>
                <p class="course-card-desc">${diagEscapeHtml(page.description)}</p>
                <a href="${diagEscapeHtml(page.url)}" target="_blank" rel="noopener" class="btn-recommended-page">
                    ${btnLabel} <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        `;
        wrap.style.display = 'block';

        if (alternatives && alternatives.length > 0) {
            altWrap.style.display = 'block';
            altList.innerHTML = alternatives.map(alt => `
                <div class="recommended-alt-card">
                    <div>
                        <h5><i class="${diagEscapeHtml(alt.icone || 'fas fa-graduation-cap')} me-1 text-orange"></i>${diagEscapeHtml(alt.titre)}</h5>
                        <p>${diagEscapeHtml(alt.type_label)} &bull; ${diagEscapeHtml(alt.description)}</p>
                    </div>
                    <a href="${diagEscapeHtml(alt.url)}" target="_blank" rel="noopener" class="btn-view-course">Voir &rarr;</a>
                </div>
            `).join('');
        } else {
            altWrap.style.display = 'none';
            altList.innerHTML = '';
        }
    }

    async function loadRecommendation() {
        try {
            const res = await fetch('/api/diagnostic/recommendation', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ session_token: sessionToken })
            });

            const data = await res.json();
            const rec = data.recommendation;

            document.getElementById('diagScreenLoading').style.display = 'none';
            document.getElementById('diagScreenResult').style.display = 'block';
            document.getElementById('diagnosticProgressWrap').style.display = 'none';
            document.getElementById('diagFooterDismiss').style.display = 'none';


            // Page du site recommandée (moteur de recommandation de pages)
            renderRecommendedPage(rec.page_recommandee, rec.pages_alternatives);

            dispatchAnalytics('diagnostic_termine', { session_token: sessionToken, score: rec.score });
        } catch (err) {
            console.error('Erreur chargement recommandation', err);
        }
    }

    window.submitDiagnosticLead = async function(event) {
        event.preventDefault();
        const btn = document.getElementById('btnSubmitLead');
        const feedback = document.getElementById('leadFormFeedback');

        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Envoi en cours...';
        feedback.style.display = 'none';

        try {
            const prenom = document.getElementById('leadPrenom').value;
            const telephone = document.getElementById('leadTelephone').value;
            const email = document.getElementById('leadEmail').value;
            const creneau = document.getElementById('leadCreneau').value;
            const moyenContact = document.querySelector('input[name="moyen_contact"]:checked')?.value || 'whatsapp';
            const consentement = document.getElementById('leadConsentement').checked;
            const hp = document.getElementById('diagHoneypot').value;

            const res = await fetch('/api/diagnostic/submit-lead', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    session_token: sessionToken,
                    prenom: prenom,
                    telephone: telephone,
                    email: email,
                    moyen_contact_prefere: moyenContact,
                    creneau_rappel: creneau,
                    consentement: consentement,
                    website_verify_hp: hp,
                })
            });

            const data = await res.json();
            if (data.success) {
                setStoredItem('mppm_diagnostic_completed', '1', 365);
                document.getElementById('diagScreenResult').style.display = 'none';
                document.getElementById('diagScreenSuccess').style.display = 'block';
                document.getElementById('successLeadName').textContent = prenom;

                if (data.whatsapp_url) {
                    document.getElementById('btnDirectWhatsapp').setAttribute('href', data.whatsapp_url);
                }

                dispatchAnalytics('lead_soumis', {
                    lead_id: data.lead_id,
                    session_token: sessionToken,
                    moyen_contact: moyenContact,
                });
            } else {
                feedback.className = 'text-danger small mt-2';
                feedback.textContent = data.message || 'Une erreur est survenue, veuillez réessayer.';
                feedback.style.display = 'block';
            }
        } catch (err) {
            console.error('Erreur soumission lead', err);
            feedback.className = 'text-danger small mt-2';
            feedback.textContent = 'Erreur réseau. Veuillez vérifier vos données.';
            feedback.style.display = 'block';
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<span>Envoyer et recevoir ma sélection</span> <i class="fas fa-paper-plane ms-2"></i>';
        }
    };

    // Auto-init au chargement du DOM
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDiagnostic);
    } else {
        initDiagnostic();
    }
})();
</script>

@endif
