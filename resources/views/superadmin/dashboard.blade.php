<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="asset/img/favicon.png" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    /* ============================================
       MONPROFCHEZMOI - SUPER ADMIN DASHBOARD DESIGN SYSTEM
       Orange #FF6B35 | Bleu #0A1628 | Blanc
       ============================================ */

    :root {
        --orange: #FF6B35;
        --orange-dark: #E85A2B;
        --orange-light: #FF8C5A;
        --orange-pale: #FFF0E8;
        --blue: #0A1628;
        --blue-light: #1E3A5F;
        --blue-accent: #3B82F6;
        --white: #FFFFFF;
        --cream: #FAFBFC;
        --gray-50: #F8F9FA;
        --gray-100: #F1F3F4;
        --gray-200: #E8EAED;
        --gray-300: #D1D5DB;
        --gray-400: #9AA0A6;
        --gray-500: #6B7280;
        --gray-600: #5F6368;
        --gray-700: #374151;
        --gray-800: #3C4043;
        --success: #10B981;
        --success-light: #D1FAE5;
        --danger: #EF4444;
        --danger-light: #FEE2E2;
        --info: #3B82F6;
        --info-light: #DBEAFE;
        --warning: #F59E0B;
        --warning-light: #FEF3C7;
        --purple: #8B5CF6;
        --purple-light: #EDE9FE;
        --green: #10B981;
        --green-light: #D1FAE5;
        --shadow-sm: 0 2px 8px rgba(10,22,40,0.06);
        --shadow-md: 0 8px 24px rgba(10,22,40,0.1);
        --shadow-lg: 0 16px 48px rgba(10,22,40,0.12);
        --shadow-xl: 0 24px 64px rgba(10,22,40,0.16);
        --shadow-orange: 0 8px 32px rgba(255,107,53,0.25);
        --shadow-card: 0 4px 20px rgba(10,22,40,0.08);
        --shadow-card-hover: 0 12px 40px rgba(10,22,40,0.15);
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    html { scroll-behavior: smooth; }

    body {
        font-family: 'Nunito', sans-serif;
        color: var(--gray-800);
        background: linear-gradient(135deg, var(--cream) 0%, #eef2f7 100%);
        overflow-x: hidden;
        line-height: 1.6;
        min-height: 100vh;
    }

    /* ============================================
       SCROLL PROGRESS
       ============================================ */
    .scroll-progress {
        position: fixed;
        top: 0; left: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--orange), var(--orange-light), var(--blue-accent));
        z-index: 10000;
        width: 0%;
        transition: width 0.1s;
    }

    /* ============================================
       SIDEBAR
       ============================================ */
    .dashboard-wrapper {
        display: flex;
        min-height: 100vh;
    }
    .sidebar {
        width: 280px;
        background: linear-gradient(180deg, var(--blue) 0%, var(--blue-light) 100%);
        position: fixed;
        top: 0; left: 0;
        height: 100vh;
        z-index: 1000;
        transition: all 0.4s ease;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .sidebar-brand {
        padding: 30px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid rgba(255,255,255,0.08);
    }
    .sidebar-brand img {
        height: 45px;
        filter: brightness(0) invert(1);
    }
    .sidebar-brand span {
        font-weight: 800;
        font-size: 1.2rem;
        color: white;
    }
    .sidebar-nav {
        padding: 20px 16px;
        list-style: none;
    }
    .sidebar-nav-item {
        margin-bottom: 4px;
    }
    .sidebar-nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 16px;
        border-radius: 12px;
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.92rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .sidebar-nav-link::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 3px; height: 100%;
        background: var(--orange);
        border-radius: 0 4px 4px 0;
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }
    .sidebar-nav-link:hover,
    .sidebar-nav-link.active {
        background: rgba(255,255,255,0.08);
        color: white;
    }
    .sidebar-nav-link:hover::before,
    .sidebar-nav-link.active::before {
        transform: scaleY(1);
    }
    .sidebar-nav-link i {
        width: 24px;
        text-align: center;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    .sidebar-nav-link:hover i,
    .sidebar-nav-link.active i {
        color: var(--orange);
        transform: scale(1.1);
    }
    .sidebar-nav-link .badge-count {
        margin-left: auto;
        background: var(--orange);
        color: white;
        padding: 2px 10px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
    }
    .sidebar-footer {
        position: absolute;
        bottom: 0;
        left: 0; right: 0;
        padding: 20px 24px;
        border-top: 1px solid rgba(255,255,255,0.08);
    }
    .sidebar-user {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .user-avatar {
        width: 44px; height: 44px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--orange), var(--orange-light));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
        font-size: 1.1rem;
        box-shadow: var(--shadow-orange);
    }
    .user-info {
        flex: 1;
    }
    .user-name {
        color: white;
        font-weight: 700;
        font-size: 0.9rem;
        margin: 0;
    }
    .user-role {
        color: rgba(255,255,255,0.5);
        font-size: 0.78rem;
        margin: 0;
    }

    /* Mobile sidebar toggle */
    .sidebar-toggle {
        display: none;
        position: fixed;
        top: 20px; left: 20px;
        z-index: 1001;
        width: 48px; height: 48px;
        border-radius: 12px;
        background: var(--orange);
        color: white;
        border: none;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        cursor: pointer;
        box-shadow: var(--shadow-orange);
    }

    /* ============================================
       MAIN CONTENT
       ============================================ */
    .main-content {
        flex: 1;
        margin-left: 280px;
        padding: 0;
        transition: all 0.4s ease;
    }
    .topbar {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(20px);
        padding: 16px 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid var(--gray-100);
        position: sticky;
        top: 0;
        z-index: 100;
    }
    .topbar-title {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--blue);
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .topbar-title i {
        color: var(--orange);
        font-size: 1.2rem;
    }
    .topbar-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .btn-topbar {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.88rem;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-family: 'Nunito', sans-serif;
    }
    .btn-topbar.btn-notif {
        background: var(--cream);
        color: var(--gray-800);
        border: 1.5px solid var(--gray-200);
        position: relative;
    }
    .btn-topbar.btn-notif:hover {
        background: var(--orange);
        color: white;
        border-color: var(--orange);
        transform: translateY(-2px);
        box-shadow: var(--shadow-orange);
    }
    .notif-badge {
        position: absolute;
        top: -6px; right: -6px;
        width: 22px; height: 22px;
        border-radius: 50%;
        background: var(--danger);
        color: white;
        font-size: 0.7rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: notif-pulse 2s infinite;
    }
    @keyframes notif-pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.15); }
    }
    .btn-topbar.btn-logout {
        background: var(--danger-light);
        color: var(--danger);
        border: 1.5px solid rgba(239,68,68,0.2);
    }
    .btn-topbar.btn-logout:hover {
        background: var(--danger);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(239,68,68,0.25);
    }

    /* ============================================
       DASHBOARD CONTENT
       ============================================ */
    .dashboard-content {
        padding: 32px;
    }

    /* ============================================
       QUICK ACCESS CARDS (NAVIGATION)
       ============================================ */
    .section-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--blue);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .section-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--gray-200);
        margin-left: 12px;
    }
    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 32px;
    }
    .dashboard-card {
        background: var(--white);
        border-radius: 20px;
        padding: 24px;
        border: 1px solid var(--gray-100);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        gap: 16px;
        animation: fadeInUp 0.5s ease both;
    }
    .dashboard-card:nth-child(1) { animation-delay: 0.05s; }
    .dashboard-card:nth-child(2) { animation-delay: 0.1s; }
    .dashboard-card:nth-child(3) { animation-delay: 0.15s; }
    .dashboard-card:nth-child(4) { animation-delay: 0.2s; }
    .dashboard-card:nth-child(5) { animation-delay: 0.25s; }
    .dashboard-card:nth-child(6) { animation-delay: 0.3s; }
    .dashboard-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 4px;
        background: linear-gradient(90deg, var(--orange), var(--orange-light));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }
    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-card-hover);
        border-color: transparent;
    }
    .dashboard-card:hover::before {
        transform: scaleX(1);
    }
    .card-content {
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }
    .card-icon {
        width: 56px; height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }
    .dashboard-card:hover .card-icon {
        transform: scale(1.1) rotate(-5deg);
    }
    .card-icon.orange {
        background: linear-gradient(135deg, var(--orange), var(--orange-light));
        color: white;
        box-shadow: 0 4px 16px rgba(255,107,53,0.3);
    }
    .card-icon.blue {
        background: linear-gradient(135deg, var(--blue-accent), #60A5FA);
        color: white;
        box-shadow: 0 4px 16px rgba(59,130,246,0.3);
    }
    .card-icon.green {
        background: linear-gradient(135deg, var(--success), #34D399);
        color: white;
        box-shadow: 0 4px 16px rgba(16,185,129,0.3);
    }
    .card-icon.purple {
        background: linear-gradient(135deg, var(--purple), #A78BFA);
        color: white;
        box-shadow: 0 4px 16px rgba(139,92,246,0.3);
    }
    .card-icon.teal {
        background: linear-gradient(135deg, #14B8A6, #2DD4BF);
        color: white;
        box-shadow: 0 4px 16px rgba(20,184,166,0.3);
    }
    .card-icon.rose {
        background: linear-gradient(135deg, #F43F5E, #FB7185);
        color: white;
        box-shadow: 0 4px 16px rgba(244,63,94,0.3);
    }
    .card-info h3 {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--blue);
        margin: 0 0 4px 0;
    }
    .card-info p {
        font-size: 0.85rem;
        color: var(--gray-500);
        margin: 0;
        line-height: 1.5;
    }
    .card-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 20px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.88rem;
        text-decoration: none;
        color: var(--orange);
        background: var(--orange-pale);
        border: 1.5px solid rgba(255,107,53,0.15);
        transition: all 0.3s ease;
        margin-top: auto;
    }
    .card-button:hover {
        background: var(--orange);
        color: white;
        transform: translateX(4px);
        box-shadow: var(--shadow-orange);
        border-color: var(--orange);
    }
    .card-button i {
        font-size: 0.8rem;
        transition: transform 0.3s ease;
    }
    .card-button:hover i {
        transform: translateX(4px);
    }

    /* ============================================
       TOTAL GLOBAL CARD
       ============================================ */
    .total-global-card {
        background: linear-gradient(135deg, var(--orange), var(--orange-dark));
        border-radius: 24px;
        padding: 32px 40px;
        margin-bottom: 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease both;
        box-shadow: var(--shadow-orange);
    }
    .total-global-card::before {
        content: '';
        position: absolute;
        top: -50%; right: -10%;
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(255,255,255,0.1), transparent 70%);
        animation: float-hero 8s ease-in-out infinite;
    }
    .total-global-card .label {
        color: rgba(255,255,255,0.8);
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
        display: block;
    }
    .total-global-card .montant {
        font-size: 2.8rem;
        font-weight: 800;
        color: white;
        line-height: 1;
        margin: 0;
    }
    .total-global-card .icon-bg {
        width: 80px; height: 80px;
        border-radius: 20px;
        background: rgba(255,255,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        backdrop-filter: blur(10px);
        animation: float-hero 6s ease-in-out infinite reverse;
    }

    /* ============================================
       CATÉGORIES ACCORDÉON
       ============================================ */
    .categorie-card {
        background: var(--white);
        border-radius: 24px;
        overflow: hidden;
        margin-bottom: 20px;
        border: 1px solid var(--gray-100);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        animation: fadeInUp 0.6s ease both;
    }
    .categorie-card:nth-child(1) { animation-delay: 0.1s; }
    .categorie-card:nth-child(2) { animation-delay: 0.2s; }
    .categorie-card:nth-child(3) { animation-delay: 0.3s; }
    .categorie-card:hover {
        box-shadow: var(--shadow-md);
        border-color: transparent;
    }
    .categorie-header {
        padding: 24px 28px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
        user-select: none;
        position: relative;
        overflow: hidden;
    }
    .categorie-header::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 4px; height: 100%;
        background: white;
        opacity: 0.3;
        transform: scaleY(0);
        transition: transform 0.3s ease;
        border-radius: 0 4px 4px 0;
    }
    .categorie-header:hover::before {
        transform: scaleY(1);
    }
    .categorie-header .left {
        display: flex;
        align-items: center;
        gap: 16px;
        position: relative;
        z-index: 1;
    }
    .cat-icon {
        width: 56px; height: 56px;
        border-radius: 16px;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.3rem;
        flex-shrink: 0;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    .categorie-header:hover .cat-icon {
        transform: scale(1.1) rotate(-5deg);
        background: rgba(255,255,255,0.3);
    }
    .cat-info h5 {
        margin: 0;
        font-weight: 800;
        font-size: 1.15rem;
        color: white;
    }
    .cat-info small {
        color: rgba(255,255,255,0.8);
        font-size: 0.85rem;
        font-weight: 600;
    }
    .categorie-header .right {
        display: flex;
        align-items: center;
        gap: 20px;
        position: relative;
        z-index: 1;
    }
    .montant-cat {
        font-weight: 800;
        font-size: 1.4rem;
        color: white;
    }
    .chevron {
        width: 36px; height: 36px;
        border-radius: 10px;
        background: rgba(255,255,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.8rem;
        transition: all 0.3s ease;
    }
    .chevron.open {
        transform: rotate(180deg);
        background: rgba(255,255,255,0.25);
    }

    /* Catégorie body */
    .categorie-body {
        display: none;
        border-top: 1px solid var(--gray-100);
        animation: fadeInDown 0.3s ease;
    }
    .categorie-body.open {
        display: block;
    }

    /* Table */
    .table-wrapper {
        padding: 0;
    }
    .table-moderne {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 0.9rem;
    }
    .table-moderne thead th {
        background: var(--cream);
        color: var(--gray-600);
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        padding: 16px 20px;
        border-bottom: 2px solid var(--gray-100);
    }
    .table-moderne tbody tr {
        transition: all 0.2s ease;
    }
    .table-moderne tbody tr:hover {
        background: var(--cream);
    }
    .table-moderne tbody td {
        padding: 16px 20px;
        border-bottom: 1px solid var(--gray-100);
        color: var(--gray-800);
        vertical-align: middle;
    }
    .table-moderne tbody tr:last-child td {
        border-bottom: none;
    }
    .client-cell {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .client-cell strong {
        color: var(--blue);
        font-weight: 700;
    }
    .client-cell small {
        color: var(--gray-400);
        font-size: 0.8rem;
    }
    .badge-statut {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 700;
    }
    .badge-statut.success {
        background: var(--success-light);
        color: #065F46;
    }
    .badge-statut.warning {
        background: var(--warning-light);
        color: #92400E;
    }
    .badge-statut.danger {
        background: var(--danger-light);
        color: #991B1B;
    }
    .montant-cell {
        font-weight: 800;
        color: var(--blue);
        font-size: 1rem;
    }

    /* Empty row */
    .empty-row td {
        text-align: center;
        padding: 40px 20px !important;
        color: var(--gray-400);
    }
    .empty-row i {
        font-size: 2rem;
        margin-bottom: 12px;
        display: block;
        color: var(--gray-200);
    }

    /* Responsive */
    @media (max-width: 991px) {
        .sidebar { transform: translateX(-100%); }
        .sidebar.open { transform: translateX(0); }
        .sidebar-toggle { display: flex; }
        .main-content { margin-left: 0; }
    }
    @media (max-width: 767px) {
        .dashboard-content { padding: 20px; }
        .topbar { padding: 16px 20px; flex-direction: column; gap: 12px; align-items: flex-start; }
        .topbar-actions { width: 100%; justify-content: flex-end; }
        .total-global-card { flex-direction: column; text-align: center; gap: 20px; padding: 24px; }
        .total-global-card .montant { font-size: 2rem; }
        .categorie-header { padding: 18px 20px; }
        .categorie-header .right { gap: 12px; }
        .montant-cat { font-size: 1.1rem; }
        .table-moderne { font-size: 0.85rem; }
        .table-moderne thead th, .table-moderne tbody td { padding: 12px 14px; }
        .cards-grid { grid-template-columns: 1fr; }
    }

    /* ============================================
       ANIMATIONS
       ============================================ */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes float-hero {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(-10px, -10px); }
    }

    /* Boutons de filtre */
    .btn-filter {
        position: relative;
        overflow: hidden;
        transform: translateY(0);
    }
    .btn-filter::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 50px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .btn-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.08) !important;
    }
    .btn-filter:active {
        transform: translateY(0) scale(0.96);
    }

    @keyframes fadeSlideIn {
        from {
            opacity: 0;
            transform: translateY(12px) scale(0.97);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    </style>
</head>
<body>

<!-- Scroll Progress -->
<div class="scroll-progress" id="scrollProgress"></div>

<!-- Sidebar Toggle (Mobile) -->
<button class="sidebar-toggle" id="sidebarToggle">
    <i class="fas fa-bars"></i>
</button>

<div class="dashboard-wrapper">

    <!-- ============================================
         SIDEBAR
         ============================================ -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="asset/img/logo.png" alt="Monprofchezmoi">
            <span></span>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="{{ url('/') }}" class="sidebar-nav-link">
                    <i class="fas fa-home"></i>
                    <span>Accueil Site</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('superadmin.notifications.index') }}" class="sidebar-nav-link">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                    @php $notifCount = \App\Models\Notification::unread()->count(); @endphp
                    @if($notifCount > 0)
                        <span class="badge-count">{{ $notifCount }}</span>
                    @endif
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('admin.bons.verifier') }}" class="sidebar-nav-link">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Gérer les Bons</span>
                </a>
            </li>

            <li class="sidebar-nav-item mt-3 mb-1 px-3">
                <span style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 1px; color: rgba(255,255,255,0.4); font-weight: 800;">Module Diagnostic</span>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('superadmin.diagnostic.analytics') }}" class="sidebar-nav-link">
                    <i class="fas fa-chart-pie"></i>
                    <span>Entonnoir & Stats</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('superadmin.diagnostic.questions') }}" class="sidebar-nav-link">
                    <i class="fas fa-question-circle"></i>
                    <span>Questionnaire No-Code</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('superadmin.diagnostic.courses') }}" class="sidebar-nav-link">
                    <i class="fas fa-tags"></i>
                    <span>Cours & Tags Matching</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('superadmin.diagnostic.settings') }}" class="sidebar-nav-link">
                    <i class="fas fa-sliders-h"></i>
                    <span>Configuration Module</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('admin.leads.index') }}" class="sidebar-nav-link">
                    <i class="fas fa-users"></i>
                    <span>Liste des Leads</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="user-avatar">{{ substr(Auth::guard('superadmin')->user()?->name ?? 'Admin', 0, 1) }}</div>
                <div class="user-info">
                    <p class="user-name">{{ Auth::guard('superadmin')->user()?->name ?? 'Super Admin' }}</p>
                    <p class="user-role">Super Administrateur</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- ============================================
         MAIN CONTENT
         ============================================ -->
    <main class="main-content">

        <!-- Topbar -->
        <div class="topbar">
            <h1 class="topbar-title">
                <i class="fas fa-tachometer-alt"></i>
                Suivi des commandes
            </h1>
            <div class="topbar-actions">
                <a href="{{ route('admin.bons.verifier') }}" class="btn-topbar" style="background: linear-gradient(135deg, var(--orange), var(--orange-dark)); color: white; border: none; font-weight: 700;">
                    <i class="fas fa-ticket-alt"></i> Gérer les Bons
                </a>
                <a href="{{ route('superadmin.notifications.index') }}" class="btn-topbar btn-notif">
                    <i class="fas fa-bell"></i>
                    Notifications
                    @if($notifCount > 0)
                        <span class="notif-badge">{{ $notifCount }}</span>
                    @endif
                </a>
                @if(Auth::guard('superadmin')->check())
                <form action="{{ route('superadmin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-topbar btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </button>
                </form>
                @endif
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">

            <!-- ============================================
                 TOTAL GLOBAL
                 ============================================ -->
            <div class="total-global-card">
                <div>
                    <span class="label">Revenu total (paiements confirmés)</span>
                    <p class="montant">{{ number_format($totalGlobal, 0, ',', ' ') }} FCFA</p>
                </div>
                <div class="icon-bg">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>

            <!-- Bannière Gestion des Bons -->
            <div style="background: white; border-radius: 20px; padding: 22px 28px; margin-bottom: 25px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; border: 1px solid var(--gray-100); box-shadow: var(--shadow-sm);">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="width: 50px; height: 50px; border-radius: 14px; background: linear-gradient(135deg, var(--orange), var(--orange-light)); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.4rem; box-shadow: var(--shadow-orange);">
                        <i class="fas fa-gift"></i>
                    </div>
                    <div>
                        <h4 style="margin: 0; font-weight: 800; color: var(--blue); font-size: 1.15rem;">Vérification & Gestion des Bons Cadeaux</h4>
                        <small style="color: var(--gray-500); font-weight: 600;">Vérifier le statut d'un bon, lier un bon à une formation et suivre les attributions</small>
                    </div>
                </div>
                <a href="{{ route('admin.bons.verifier') }}" style="background: linear-gradient(135deg, var(--orange), var(--orange-dark)); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 800; font-size: 0.95rem; display: inline-flex; align-items: center; gap: 8px; box-shadow: var(--shadow-orange); text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                    <i class="fas fa-ticket-alt"></i> Gérer & Vérifier les Bons
                </a>
            </div>

            <!-- ============================================
                 CATÉGORIES ACCORDÉON
                 ============================================ -->

            <!-- Autres (Toutes les commandes) -->
            <div class="categorie-card">
                <div class="categorie-header" style="background: linear-gradient(135deg, var(--purple), #7C3AED);" onclick="toggleCategorie(this)">
                    <div class="left">
                        <div class="cat-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="cat-info">
                            <h5>Suivie des commandes</h5>
                            <small>{{ $autresStats['nb'] }} confirmés · {{ $autresStats['liste']->where('est_confirme', false)->count() }} en attente</small>
                        </div>
                    </div>
                    <div class="right">
                        <span class="montant-cat">{{ number_format($autresStats['total'], 0, ',', ' ') }} F</span>
                        <div class="chevron"><i class="fas fa-chevron-down"></i></div>
                    </div>
                </div>
                <div class="categorie-body">
                    <div style="display: flex; gap: 10px; margin-bottom: 16px; flex-wrap: wrap;">
                        <button class="btn-filter active" data-filter="all" onclick="filterOrders('all', this)" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 20px; border-radius: 50px; border: none; background: var(--cream); color: var(--gray-600); font-size: 13px; font-weight: 700; cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 2px 8px rgba(0,0,0,0.04);"><i class="fas fa-th-large" style="font-size: 12px;"></i> Toutes</button>
                        <button class="btn-filter" data-filter="paye" onclick="filterOrders('paye', this)" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 20px; border-radius: 50px; border: none; background: var(--cream); color: var(--gray-600); font-size: 13px; font-weight: 700; cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 2px 8px rgba(0,0,0,0.04);"><i class="fas fa-check-circle" style="font-size: 12px;"></i> Payé</button>
                        <button class="btn-filter" data-filter="rejete" onclick="filterOrders('rejete', this)" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 20px; border-radius: 50px; border: none; background: var(--cream); color: var(--gray-600); font-size: 13px; font-weight: 700; cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 2px 8px rgba(0,0,0,0.04);"><i class="fas fa-times-circle" style="font-size: 12px;"></i> Rejeté</button>
                    </div>
                    <div class="table-wrapper table-responsive">
                        <table class="table-moderne" id="ordersTable">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Client</th>
                                    <th>Détails</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($autresStats['liste'] as $p)
                                <tr class="order-row" data-est-confirme="{{ $p['est_confirme'] ? '1' : '0' }}" data-statut="{{ $p['statut'] }}" style="cursor: pointer;" onclick="showDetails(
                                    '{{ $p['id'] }}',
                                    '{{ addslashes($p['type']) }}',
                                    '{{ addslashes($p['client']) }}',
                                    '{{ addslashes($p['email']) }}',
                                    '{{ addslashes($p['telephone']) }}',
                                    '{{ addslashes($p['details']) }}',
                                    '{{ number_format($p['montant'], 0, ',', ' ') }}',
                                    '{{ $p['est_confirme'] ? 'Confirmé' : (str_contains($p['statut'], 'attente') ? 'En attente' : 'Échec') }}',
                                    '{{ $p['date']->format('d/m/Y H:i') }}'
                                )">
                                    <td><span class="badge-statut" style="background: var(--purple-light); color: var(--purple);"><i class="fas fa-tag"></i> {{ $p['type'] }}</span></td>
                                    <td>
                                        <div class="client-cell">
                                            <strong>{{ Str::limit($p['client'], 18) }}</strong>
                                            <small>{{ $p['email'] }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <small>{{ Str::limit($p['details'], 25) }}</small>
                                        @if(!empty($p['session']))
                                            <div style="margin-top: 4px;">
                                                <span class="badge-statut" style="background: #FFF0E8; color: #E85A2B; font-size: 0.72rem;"><i class="fas fa-calendar-day"></i> {{ $p['session'] }}</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="montant-cell">{{ number_format($p['montant'], 0, ',', ' ') }} F</td>
                                    <td>
                                        @if($p['est_confirme'])
                                            <span class="badge-statut success"><i class="fas fa-check-circle"></i> Confirmé</span>
                                        @elseif(str_contains($p['statut'], 'attente'))
                                            <span class="badge-statut warning"><i class="fas fa-clock"></i> En attente</span>
                                        @else
                                            <span class="badge-statut danger"><i class="fas fa-times-circle"></i> Échec</span>
                                        @endif
                                    </td>
                                    <td><small>{{ $p['date']->format('d/m/Y H:i') }}</small></td>
                                </tr>
                                @empty
                                <tr class="empty-row">
                                    <td colspan="6">
                                        <i class="fas fa-inbox"></i>
                                        Aucun paiement
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

<!-- ============================================
     SCRIPTS
     ============================================ -->
<!-- Modal Détails Commande -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: var(--shadow-xl); overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(135deg, var(--purple), #7C3AED); border: none; padding: 20px 24px;">
                <h5 class="modal-title" style="color: white; font-weight: 800; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-info-circle"></i> Détails de la commande
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 24px;">
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">ID</span>
                        <span id="detail-id" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Type</span>
                        <span id="detail-type" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Client</span>
                        <span id="detail-client" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Email</span>
                        <span id="detail-email" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Téléphone</span>
                        <span id="detail-telephone" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Détails</span>
                        <span id="detail-details" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Montant</span>
                        <span id="detail-montant" style="font-weight: 800; color: var(--orange); font-size: 1.1rem;"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Statut</span>
                        <span id="detail-statut"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Date</span>
                        <span id="detail-date" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 1px solid var(--gray-100); padding: 16px 24px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background: var(--cream); color: var(--gray-700); font-weight: 700; border-radius: 12px; padding: 10px 24px; border: 1px solid var(--gray-200);">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function showDetails(id, type, client, email, telephone, details, montant, statut, date) {
    document.getElementById('detail-id').textContent = id;
    document.getElementById('detail-type').textContent = type;
    document.getElementById('detail-client').textContent = client;
    document.getElementById('detail-email').textContent = email;
    document.getElementById('detail-telephone').textContent = telephone;
    document.getElementById('detail-details').textContent = details;
    document.getElementById('detail-montant').textContent = montant + ' F';

    const statutEl = document.getElementById('detail-statut');
    if (statut === 'Confirmé') {
        statutEl.innerHTML = '<span class="badge-statut success"><i class="fas fa-check-circle"></i> Confirmé</span>';
    } else if (statut === 'En attente') {
        statutEl.innerHTML = '<span class="badge-statut warning"><i class="fas fa-clock"></i> En attente</span>';
    } else {
        statutEl.innerHTML = '<span class="badge-statut danger"><i class="fas fa-times-circle"></i> Échec</span>';
    }

    document.getElementById('detail-date').textContent = date;

    var modal = new bootstrap.Modal(document.getElementById('detailsModal'));
    modal.show();
}

// Scroll Progress
window.addEventListener('scroll', function() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    document.getElementById('scrollProgress').style.width = (scrollTop / scrollHeight * 100) + '%';
});

// Sidebar Toggle
document.getElementById('sidebarToggle').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('open');
});

// Close sidebar when clicking outside on mobile
document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');
    if (window.innerWidth <= 991 && !sidebar.contains(e.target) && !toggle.contains(e.target)) {
        sidebar.classList.remove('open');
    }
});

// Toggle catégories
function toggleCategorie(header) {
    const body = header.nextElementSibling;
    const chevron = header.querySelector('.chevron');

    document.querySelectorAll('.categorie-body.open').forEach(el => {
        if (el !== body) {
            el.classList.remove('open');
            el.previousElementSibling.querySelector('.chevron').classList.remove('open');
        }
    });

    body.classList.toggle('open');
    chevron.classList.toggle('open');
}

// Couleurs par filtre
const filterColors = {
    all: { bg: 'var(--orange)', shadow: '0 6px 20px rgba(255,107,53,0.3)' },
    paye: { bg: 'var(--green)', shadow: '0 6px 20px rgba(16,185,129,0.3)' },
    rejete: { bg: '#EF4444', shadow: '0 6px 20px rgba(239,68,68,0.3)' },
};

// Init filtre au chargement
document.addEventListener('DOMContentLoaded', function() {
    const firstBtn = document.querySelector('.btn-filter.active');
    if (firstBtn) {
        const c = filterColors['all'];
        firstBtn.style.background = c.bg;
        firstBtn.style.color = 'white';
        firstBtn.style.boxShadow = c.shadow;
    }
});

// Filtre commandes par statut
function filterOrders(filter, btn) {
    document.querySelectorAll('.btn-filter').forEach(b => {
        b.style.background = 'var(--cream)';
        b.style.color = 'var(--gray-600)';
        b.style.boxShadow = '0 2px 8px rgba(0,0,0,0.04)';
        b.style.transform = '';
        const icon = b.querySelector('i');
        if (icon) icon.style.transition = 'transform 0.3s ease';
    });

    const c = filterColors[filter];
    btn.style.background = c.bg;
    btn.style.color = 'white';
    btn.style.boxShadow = c.shadow;
    btn.style.transform = 'translateY(-2px)';

    // Petite animation sur l'icône
    const icon = btn.querySelector('i');
    if (icon) {
        icon.style.transform = 'scale(1.2)';
        setTimeout(() => { icon.style.transform = 'scale(1)'; }, 200);
    }

    // Animation d'apparition des lignes
    const rows = document.querySelectorAll('.order-row');
    let visibleIndex = 0;
    rows.forEach(row => {
        let show = false;
        if (filter === 'all') show = true;
        else if (filter === 'paye') show = row.dataset.estConfirme === '1';
        else if (filter === 'rejete') show = (row.dataset.estConfirme === '0' && row.dataset.statut !== 'En attente');

        if (show) {
            row.style.display = '';
            row.style.animation = 'none';
            row.offsetHeight; // reflow
            row.style.animation = `fadeSlideIn 0.35s ease forwards ${visibleIndex * 0.05}s`;
            visibleIndex++;
        } else {
            row.style.display = 'none';
        }
    });
}
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
