<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\SousFormationController;
use App\Http\Controllers\ShowDataController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\LeconsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\userPayementController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GiftVoucherController;
use App\Models\GiftVoucher;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Admin\GiftVoucherController as AdminGiftVoucherController;
use App\Http\Controllers\Admin\VoucherVerificationController;
use App\Http\Controllers\VoucherOrderController;
use App\Http\Controllers\RappelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\CinetPayController;
use App\Http\Controllers\Api\ChatbotController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/api/chatbot/ask', [ChatbotController::class, 'ask']);
Route::put('/reponses/{id}/terminer', [ShowDataController::class, 'terminer'])->name('reponse.terminer');
Route::put('/reponse/{id}/annuler', [ShowDataController::class, 'annulerTerminer'])->name('reponse.annuler');
Route::post('/order/{id}/terminer', [ShowDataController::class, 'terminerOrder'])->name('terminerOrder');
Route::post('/order/{id}/annuler', [ShowDataController::class, 'annulerTerminerOrder'])->name('annulerTerminerOrder');
Route::post('/contact/{id}/annuler', [ShowDataController::class, 'annulerTerminerContact'])->name('annulerTerminerContact');
Route::post('/contact/{id}/terminer', [ShowDataController::class, 'terminerContact'])->name('terminerContact');

Route::get('/getSousFormations/{formation_id}', [CoursController::class, 'getSousFormations']);

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/groupe', function () {
    return view('groupes');
});

Route::post('/matiere/payment/notify', [PayementController::class, 'paymentNotify'])->name('matiere.payment.notify');
Route::get('/matiere/payment/return', [PayementController::class, 'paymentReturn'])->name('matiere.payment.return');

Route::get('/formation', [ShowDataController::class, 'formation'])->name('formation');
Route::get('/formations', [ShowDataController::class, 'formations'])->name('formations');
Route::get('/cours/{id}', [ShowDataController::class, 'cours'])->name('cours');
Route::get('/valider', function () {
    return view('valider');
});

Route::get('/order/{id}', [ShowDataController::class, 'showOrderForm'])->name('order.form');
Route::post('/order', [ShowDataController::class, 'storeOrder'])->name('order.store');
Route::get('/order/confirmation', [ShowDataController::class, 'confirmation'])->name('order.confirmation');
// web.php
Route::post('/contacts/{id}/commentaire', [ShowDataController::class, 'ajouterCommentaire'])->name('ajouterCommentaire');
// Route pour ajouter ou modifier un commentaire sur une commande
Route::post('/orders/{id}/commentaire', [ShowDataController::class, 'ajouterCommentaireOrder'])->name('ajouterCommentaireOrder');


Route::get('/voircours', [ShowDataController::class, 'showvoircours'])->name('orders.sho');
// Dans web.php
Route::put('/orders/{id}/marquer-vendu', [ShowDataController::class, 'marquerVenduOrder'])->name('orders.marquerVendu');
Route::put('/orders/{id}/marquer-annule', [ShowDataController::class, 'marquerAnnuleOrder'])->name('orders.marquerAnnule');



Route::delete('/orders/{id}', [ShowDataController::class, 'destroy'])->name('orders.destroy');
Route::get('/voircontact', [ShowDataController::class, 'consulter'])->name('voircontact.consulter');

Route::get('/formations/sous-formation/{id}/formation', [ShowDataController::class, 'showCourses'])->name('sous_formation_cours');

// Route pour afficher toutes les matières
// Route::get('/matieres', [MatiereController::class, 'index'])->name('matieres.index');
// Route pour afficher le formulaire de création d'une nouvelle matière
Route::get('/matieres/create', [MatiereController::class, 'create'])->name('matieres.create');

// Route pour stocker une nouvelle matière
Route::post('/matieres', [MatiereController::class, 'store'])->name('matieres.store');

// Route pour afficher les détails d'une matière spécifique
Route::get('/matieres/{id}', [MatiereController::class, 'show'])->name('matieres.show');

// Route pour afficher toutes les leçons d'une matière spécifique
Route::get('/matieres/{id}/lecons', [MatiereController::class, 'showCours'])->name('matiere.lecons');
// Route pour créer une nouvelle leçon
Route::get('/lecons/create', [LeconsController::class, 'create'])->name('lecons.create');
Route::post('/lecons', [LeconsController::class, 'store'])->name('lecons.store');

Route::get('/choisir', function () {
    return view('choisir');
});

Route::get('/create', function () {
    return view('create');
});


Route::get('/extrascolaire', function () {
    return view('extra');
});
// Route pour afficher le formulaire de création de cours
Route::get('/create', [CoursController::class, 'create']);

// Route pour traiter le formulaire de création de cours
Route::post('/cours', [CoursController::class, 'store'])->name('cours.store');

Route::get('/formcreate', [FormationController::class, 'formcreate']);
Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');

Route::get('/souscreate', [SousFormationController::class, 'souscreate']);
Route::post('/sous_formations', [SousFormationController::class, 'store'])->name('sous_formations.store');
Route::get('/formations/{id}/sous-formations', [ShowDataController::class, 'showSousFormations'])->name('sous_formations');

Route::get('/liste', [ShowDataController::class, 'index'])->name('liste');
Route::get('/formations/{id}/edit', [ShowDataController::class, 'editFormation'])->name('formations.edit');
Route::delete('/formations/{id}', [ShowDataController::class, 'deleteFormation'])->name('formations.destroy');
Route::get('/sous_formations/{id}/edit', [ShowDataController::class, 'editSousFormation'])->name('sous-formations.edit');
Route::delete('/sous_formations/{id}', [ShowDataController::class, 'deleteSousFormation'])->name('sous-formations.destroy');
Route::get('/cours/{id}/edit', [ShowDataController::class, 'editCours'])->name('cours.edit');
Route::delete('/cours/{id}', [ShowDataController::class, 'deleteCours'])->name('cours.destroy');
Route::put('/formations/{id}', [ShowDataController::class, 'updateFormation'])->name('formations.update');
Route::put('/sous-formations/{id}', [SousFormationController::class, 'update'])->name('sous-formations.update');

// Route pour enregistrer une réponse
Route::post('/reponse', [ShowDataController::class, 'store'])->name('reponse.store');
Route::get('/reponse', [ShowDataController::class, 'repo']);

Route::get('/voirsoutien', [ShowDataController::class, 'voir'])->name('voirsoutien');
Route::post('/reponse/{id}/commenter', [ShowDataController::class, 'commenter'])->name('reponse.commenter');

Route::get('/superieur', [ShowDataController::class, 'superieur'])->name('superieur');
Route::get('/reussir', [ShowDataController::class, 'reussir']);
Route::get('/coaching', [ShowDataController::class, 'coaching']);
Route::get('/musique', [ShowDataController::class, 'musique']);
Route::get('/sportif', [ShowDataController::class, 'sportif']);
Route::get('/bouge', [ShowDataController::class, 'bouge']);
Route::get('/codage', [ShowDataController::class, 'codage']);
Route::get('/minimetier', [ShowDataController::class, 'mini']);
Route::get('/petit', [ShowDataController::class, 'petit']);
Route::get('/cabine', [ShowDataController::class, 'cabine']);
Route::get('/petit-3-4-ans', [ShowDataController::class, 'petit34']);
Route::get('/petit-5-6-ans', [ShowDataController::class, 'petit56']);
Route::get('/petit-7-8-ans', [ShowDataController::class, 'petit78']);
Route::get('/petit-9-10-ans', [ShowDataController::class, 'petit910']);
Route::get('/petit-11-18-ans', [ShowDataController::class, 'petit1118']);
Route::get('primaire', [ShowDataController::class, 'primaire']);
Route::get('/accompagnement', [ShowDataController::class, 'accompagnement']);
Route::get('/methode', [ShowDataController::class, 'methode']);
Route::get('/sportenf', [ShowDataController::class, 'sportenf']);
Route::get('/soutien-collège', [ShowDataController::class, 'soutienCollege']);
Route::get('/soutien-brevet', [ShowDataController::class, 'soutienBrevet']);
Route::get('/college-methode', [ShowDataController::class, 'collegeMethode']);
Route::get('/lycee-sous', [ShowDataController::class, 'lyceesous']);
Route::get('/lycee-preparation', [ShowDataController::class, 'lyceePreparation']);
Route::get('/lycee-coaching', [ShowDataController::class, 'lyceeCoaching']);
Route::get('/college-competence', [ShowDataController::class, 'collegecompe']);
Route::get('/college-digital', [ShowDataController::class, 'collegeDigital']);
Route::get('/seconde', [ShowDataController::class, 'seconde']);
Route::get('/premiere', [ShowDataController::class, 'premiere']);
Route::get('/orientation-superieur', [ShowDataController::class, 'orientationSuperieur']);
Route::get('/soutien-superieur', [ShowDataController::class, 'soutienSuperieur']);
Route::get('/methode-superieur', [ShowDataController::class, 'methodeSuperieur']);
Route::get('/sport-adulte', [ShowDataController::class, 'sportAdulte']);

Route::get('/terminale', function () {
    return view('terminale');
});
Route::delete('/reponse/{id}/supprimer', [ShowDataController::class, 'supprimer'])->name('reponse.supprimer');

Route::get('/contact', [ShowDataController::class, 'showContactForm'])->name('contact.form');
Route::post('/contact', [ShowDataController::class, 'storeContact'])->name('contact.store');
Route::get('/contact/confirmation', function () {
    return view('contact-confirmation');
})->name('contact.confirmation');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/matieres/order/{id}', [userPayementController::class, 'initPayement'])->name('order.matiere');
});

// ============================================
// ROUTES AUTH ADMIN
// ============================================
Route::prefix('admin')->group(function () {
    // Connexion admin
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

    // Enregistrement admin
    Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register.form');
    Route::post('register', [AdminAuthController::class, 'register'])->name('admin.register.submit');

    // Logout admin
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Routes protégées admin (auth:admin)
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        // Gestion des vidéos DCG/DSCG par l'admin
        Route::get('videos', [App\Http\Controllers\AdminVideoController::class, 'index'])->name('admin.videos.index');
        Route::get('videos/create', [App\Http\Controllers\AdminVideoController::class, 'create'])->name('admin.videos.create');
        Route::post('videos', [App\Http\Controllers\AdminVideoController::class, 'store'])->name('admin.videos.store');
        Route::get('videos/{video}/edit', [App\Http\Controllers\AdminVideoController::class, 'edit'])->name('admin.videos.edit');
        Route::put('videos/{video}', [App\Http\Controllers\AdminVideoController::class, 'update'])->name('admin.videos.update');
        Route::delete('videos/{video}', [App\Http\Controllers\AdminVideoController::class, 'destroy'])->name('admin.videos.destroy');

        // Notifications admin
        Route::get('notifications', [App\Http\Controllers\AdminNotificationController::class, 'index'])->name('admin.notifications.index');
        Route::post('notifications/{id}/read', [App\Http\Controllers\AdminNotificationController::class, 'markAsRead'])->name('admin.notifications.read');
        Route::post('notifications/read-all', [App\Http\Controllers\AdminNotificationController::class, 'markAllAsRead'])->name('admin.notifications.readAll');

        // Configuration paiement
        Route::get('payement-configuration', [PayementController::class, 'getAccountInfo'])->name('payements.configuration');
        Route::post('handle-payement-configuration', [PayementController::class, 'handleUpdateInfo'])->name('payements.updateconfiguration');
    });
});

// ============================================
// ROUTES AUTH SUPER ADMIN
// ============================================
Route::prefix('superadmin')->group(function () {
    // Connexion super admin
    Route::get('login', [App\Http\Controllers\SuperAdminAuthController::class, 'showLoginForm'])->name('superadmin.login.form');
    Route::post('login', [App\Http\Controllers\SuperAdminAuthController::class, 'login'])->name('superadmin.login.submit');

    // Enregistrement super admin
    Route::get('register', [App\Http\Controllers\SuperAdminAuthController::class, 'showRegisterForm'])->name('superadmin.register.form');
    Route::post('register', [App\Http\Controllers\SuperAdminAuthController::class, 'register'])->name('superadmin.register.submit');

    // Logout super admin
    Route::post('logout', [App\Http\Controllers\SuperAdminAuthController::class, 'logout'])->name('superadmin.logout');

    // Routes super admin (accès sans authentification obligatoire)
    Route::get('dashboard', [App\Http\Controllers\SuperAdminController::class, 'index'])->name('superadmin.dashboard');

    // Notifications super admin (si nécessaire)
    Route::get('notifications', [App\Http\Controllers\AdminNotificationController::class, 'index'])->name('superadmin.notifications.index');
});

Route::delete('/contacts/{id}', [ShowDataController::class, 'destroy'])->name('contacts.destroy');
Route::get('/rechercher-formations', [FormationController::class, 'search'])->name('search.formations');
Route::get('/sous-formations/{formationId}/filter', [ShowDataController::class, 'filterCourses'])->name('filtrer_sous_formation');
Route::get('/payments/index', [PaymentController::class, 'index']);
Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');


Route::get('/cours/{id}/edit', [CoursController::class, 'edit'])->name('cours.edit');
Route::post('/cours/{id}', [CoursController::class, 'update'])->name('cours.update');
Route::get('/cours', [CoursController::class, 'index'])->name('cours.index');
Route::get('/orders/{id}', [ShowDataController::class, 'show'])->name('orders.show');


Route::get('/bons', [AdminGiftVoucherController::class, 'index'])->name('vouchers.index'); // liste
    Route::get('/bons/create', [AdminGiftVoucherController::class, 'create'])->name('vouchers.create'); // form ajout
    Route::post('/bons', [AdminGiftVoucherController::class, 'store'])->name('vouchers.store'); // sauvegarde
    Route::get('/bons/{voucher}/edit', [AdminGiftVoucherController::class, 'edit'])->name('vouchers.edit'); // modifier
    Route::put('/bons/{voucher}', [AdminGiftVoucherController::class, 'update'])->name('vouchers.update');
    Route::delete('/bons/{id}', [AdminGiftVoucherController::class, 'destroy'])->name('bons.destroy');


    // Redirection de l'ancienne route vers la page unique des bons
    Route::redirect('/bons/client', '/gift-vouchers');

    // Vérification et liaison des bons cadeaux par la commerciale / admin
    Route::get('/admin/bons/verifier', [VoucherVerificationController::class, 'index'])->name('admin.bons.verifier');
    Route::post('/admin/bons/verifier/rechercher', [VoucherVerificationController::class, 'search'])->name('admin.bons.rechercher');
    Route::post('/admin/bons/verifier/lier-direct', [VoucherVerificationController::class, 'directLink'])->name('admin.bons.lier_direct');
    Route::post('/admin/bons/verifier/{order}/lier', [VoucherVerificationController::class, 'linkFormation'])->name('admin.bons.lier');

// Page pour voir tous les bons de formation
Route::get('/gift-vouchers', [GiftVoucherController::class, 'voir'])
    ->name('gift-vouchers.index');
// Page achat d'un bon
Route::get('/bons/client/{voucher}/purchase', [VoucherOrderController::class, 'create'])->name('voucher-orders.create');
Route::post('/bons/client/{voucher}/purchase', [VoucherOrderController::class, 'store'])->name('voucher-orders.store');

// Validation admin
Route::post('/admin/orders/{order}/validate', [VoucherOrderController::class, 'validateOrder'])->name('admin.orders.validate');

// Page admin liste des commandes
Route::get('/admin/orders', [VoucherOrderController::class, 'adminIndex'])->name('admin.orders.index');

// Validation et rejet
Route::post('/admin/orders/{order}/validate', [VoucherOrderController::class, 'validateOrder'])->name('admin.orders.validate');
Route::post('/admin/orders/{order}/reject', [VoucherOrderController::class, 'rejectOrder'])->name('admin.orders.reject');

Route::put('/reponse/{id}/vendu', [ShowDataController::class, 'marquerVendu'])->name('reponse.vendu');
Route::put('/reponse/{id}/annuler', [ShowDataController::class, 'marquerAnnule'])->name('reponse.annuler');

Route::post('/contacts/{id}/confirmer', [ShowDataController::class, 'confirmerCommande'])->name('confirmerCommande');
Route::post('/contacts/{id}/vendre', [ShowDataController::class, 'vendreCommande'])->name('vendreCommande');
Route::post('/contacts/{id}/annuler', [ShowDataController::class, 'annulerCommande'])->name('annulerCommande');
Route::post('/contacts/{id}/commentaire', [ShowDataController::class, 'ajouterCommentaire'])->name('ajouterCommentaire');
Route::delete('/contacts/{id}', [ShowDataController::class, 'destroy'])->name('contacts.destroy');
Route::delete('/orders/{id}', [ShowDataController::class, 'destroyOrder'])->name('orders.destroy');

Route::post('/rappel/store', [RappelController::class, 'store'])->name('rappel.store');
Route::get('/rappels', [RappelController::class, 'index'])->name('rappels.index');

// ============================================
// ROUTES DCG / DSCG - VIDÉOS DE FORMATION
// ============================================
Route::get('/dcg', [App\Http\Controllers\VideoController::class, 'index'])->name('dcg.index');
Route::get('/dscg', [App\Http\Controllers\VideoController::class, 'index'])->name('dscg.index');
Route::get('/video/{id}', [App\Http\Controllers\VideoController::class, 'show'])->name('video.show');
Route::get('/video/{id}/payer', [App\Http\Controllers\VideoController::class, 'payer'])->name('video.payer');
Route::post('/video/{id}/init-payment', [App\Http\Controllers\VideoController::class, 'initPayment'])->name('video.init_payment');
Route::get('/video/return', [App\Http\Controllers\VideoController::class, 'returnPayment'])->name('video.return');
Route::post('/video/notify', [App\Http\Controllers\VideoController::class, 'notify'])->name('video.notify');
Route::get('/video/cancel', [App\Http\Controllers\VideoController::class, 'cancel'])->name('video.cancel');
Route::get('/video/success/{videoId}', [App\Http\Controllers\VideoController::class, 'success'])->name('video.success');
Route::get('/video/stream/{id}', [App\Http\Controllers\VideoController::class, 'stream'])->name('video.stream');
Route::get('/dashboard/videos', [App\Http\Controllers\VideoController::class, 'dashboard'])->name('video.dashboard')->middleware('auth');

// Panier vidéos
Route::post('/panier/ajouter/{videoId}', [App\Http\Controllers\PanierVideoController::class, 'add'])->name('panier.add')->middleware('auth');
Route::get('/panier', [App\Http\Controllers\PanierVideoController::class, 'index'])->name('panier.index')->middleware('auth');
Route::get('/panier/retirer/{videoId}', [App\Http\Controllers\PanierVideoController::class, 'remove'])->name('panier.remove')->middleware('auth');
Route::post('/panier/checkout', [App\Http\Controllers\PanierVideoController::class, 'checkout'])->name('panier.checkout')->middleware('auth');
Route::get('/panier/return', [App\Http\Controllers\PanierVideoController::class, 'returnPayment'])->name('panier.return')->middleware('auth');
Route::post('/panier/notify', [App\Http\Controllers\PanierVideoController::class, 'notify'])->name('panier.notify');
Route::get('/panier/cancel', [App\Http\Controllers\PanierVideoController::class, 'cancel'])->name('panier.cancel')->middleware('auth');


// Système de réservation
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/confirmation/{token}', [ReservationController::class, 'confirmation'])->name('reservation.confirmation');
Route::post('/reservation/paiement/{token}', [ReservationController::class, 'processPayment'])->name('reservation.paiement');
Route::get('/reservation/success/{token}', [ReservationController::class, 'success'])->name('reservation.success');
Route::post('/reservation/session/{token}', [ReservationController::class, 'chooseSession'])->name('reservation.session');

// API pour calcul dynamique
Route::get('/api/reservation/calcul', [ReservationController::class, 'calcul'])->name('reservation.calcul');
Route::post('/inscription', [ReservationController::class, 'storextra'])->name('inscription.store');

// ==================== PAIEMENT CINETPAY V2 ====================

Route::post('/payment/initiate', [PaymentController::class, 'initiate'])
    ->name('payment.initiate');

Route::post('/payment/notify', [PaymentController::class, 'notify'])
    ->name('payment.notify');

Route::get('/payment/return', [PaymentController::class, 'returnPayment'])
    ->name('payment.return');

Route::get('/payment/success', [PaymentController::class, 'success'])
    ->name('payment.success');

Route::get('/payment/cancel', [PaymentController::class, 'cancel'])
    ->name('payment.cancel');

Route::get('/payment/manual', [PaymentController::class, 'manual'])
    ->name('payment.manual');

// Routes admin inscriptions
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/inscriptions', [InscriptionController::class, 'index'])->name('inscriptions.index');
    Route::get('/inscriptions/{inscription}', [InscriptionController::class, 'show'])->name('inscriptions.show');
    Route::patch('/inscriptions/{inscription}/contacte', [InscriptionController::class, 'marquerContacte'])->name('inscriptions.contacte');
    Route::patch('/inscriptions/{inscription}/confirme', [InscriptionController::class, 'marquerConfirme'])->name('inscriptions.confirme');
    Route::patch('/inscriptions/{inscription}/annuler', [InscriptionController::class, 'annuler'])->name('inscriptions.annuler');
    Route::patch('/inscriptions/{inscription}/notes', [InscriptionController::class, 'ajouterNotes'])->name('inscriptions.notes');
    Route::delete('/inscriptions/{inscription}', [InscriptionController::class, 'destroy'])->name('inscriptions.destroy');
});


Route::get('/check-ip', function() {
    $ip = file_get_contents('https://api.ipify.org');
    return "IP sortante : " . $ip;
});
// ============================================
// ROUTES NEWSLETTER / SUBSCRIBERS
// ============================================
Route::post('/subscriber/subscribe', [App\Http\Controllers\SubscriberController::class, 'subscribe']);
Route::get('/unsubscribe', [App\Http\Controllers\SubscriberController::class, 'unsubscribe']);

// Admin routes for subscribers
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/subscribers', [App\Http\Controllers\SubscriberController::class, 'adminIndex'])->name('subscribers.index');
    Route::get('/subscribers/campaign', [App\Http\Controllers\SubscriberController::class, 'campaignForm'])->name('subscribers.campaign');
    Route::post('/subscribers/campaign/send', [App\Http\Controllers\SubscriberController::class, 'sendCampaign'])->name('subscribers.send-campaign');
    Route::delete('/subscribers/{id}', [App\Http\Controllers\SubscriberController::class, 'destroy'])->name('subscribers.destroy');
});

// ============================================
// ROUTES MODULE DIAGNOSTIC PERSONNALISÉ & LEADS
// ============================================

// API Visiteur (Diagnostic adaptatif en ligne)
Route::prefix('api/diagnostic')->name('api.diagnostic.')->group(function () {
    Route::post('/init', [App\Http\Controllers\DiagnosticController::class, 'init'])->name('init');
    Route::post('/answer', [App\Http\Controllers\DiagnosticController::class, 'answer'])->name('answer');
    Route::post('/recommendation', [App\Http\Controllers\DiagnosticController::class, 'recommendation'])->name('recommendation');
    Route::post('/submit-lead', [App\Http\Controllers\DiagnosticController::class, 'submitLead'])->name('submit-lead');
});

// Admin Dashboard - Section Diagnostics & Leads
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/leads', [App\Http\Controllers\Admin\DiagnosticLeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/export', [App\Http\Controllers\Admin\DiagnosticLeadController::class, 'exportCsv'])->name('leads.export');
    Route::get('/leads/{id}', [App\Http\Controllers\Admin\DiagnosticLeadController::class, 'show'])->name('leads.show');
    Route::post('/leads/{id}/status', [App\Http\Controllers\Admin\DiagnosticLeadController::class, 'updateStatus'])->name('leads.status');
    Route::post('/leads/{id}/note', [App\Http\Controllers\Admin\DiagnosticLeadController::class, 'addNote'])->name('leads.note');
    Route::post('/leads/{id}/assign', [App\Http\Controllers\Admin\DiagnosticLeadController::class, 'assign'])->name('leads.assign');
    Route::post('/leads/{id}/change-course', [App\Http\Controllers\Admin\DiagnosticLeadController::class, 'changeCourse'])->name('leads.change-course');
});

// SuperAdmin Dashboard - Gestion avancée & Statistiques du Diagnostic
Route::prefix('superadmin/diagnostic')->name('superadmin.diagnostic.')->middleware('auth:superadmin')->group(function () {
    Route::get('/analytics', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'analytics'])->name('analytics');
    
    // Questionnaire No-code
    Route::get('/questions', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'questions'])->name('questions');
    Route::post('/questions', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'storeQuestion'])->name('questions.store');
    Route::put('/questions/{id}', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'updateQuestion'])->name('questions.update');
    Route::post('/questions/{id}/options', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'storeOption'])->name('options.store');
    Route::delete('/options/{id}', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'deleteOption'])->name('options.destroy');

    // Gestion Diagnostic <-> Cours & Tags
    Route::get('/courses', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'courses'])->name('courses');
    Route::post('/courses/{id}/toggle-active', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'toggleCourseActive'])->name('courses.toggle-active');
    Route::post('/courses/{id}/update', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'updateCourseDetails'])->name('courses.update');
    Route::post('/courses/{id}/validate-tags', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'validateSuggestedTags'])->name('courses.validate-tags');
    Route::delete('/tags/{id}', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'deleteTag'])->name('tags.destroy');
    Route::post('/rules', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'updateRecommendationRules'])->name('rules.update');
    Route::post('/mapping', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'updateFormationMapping'])->name('mapping.update');

    // Paramètres & Droit à l'effacement
    Route::get('/settings', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'settings'])->name('settings');
    Route::post('/settings', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'updateSettings'])->name('settings.update');
    Route::delete('/leads/{id}/erase', [App\Http\Controllers\SuperAdmin\DiagnosticManagementController::class, 'deleteLeadData'])->name('leads.erase');
});

require __DIR__.'/auth.php'; // Authentification de l'espace particuliers

