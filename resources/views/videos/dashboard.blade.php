<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mes vidéos - Dashboard</title>
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
       MONPROFCHEZMOI - DASHBOARD DESIGN SYSTEM
       Orange #FF6B35 | Bleu #0A1628 | Blanc
       ============================================ */

    :root {
        --orange: #FF6B35;
        --orange-dark: #E85A2B;
        --orange-light: #FF8C5A;
        --blue: #0A1628;
        --blue-light: #1E3A5F;
        --blue-accent: #3B82F6;
        --white: #FFFFFF;
        --cream: #FAFBFC;
        --gray-50: #F8F9FA;
        --gray-100: #F1F3F4;
        --gray-200: #E8EAED;
        --gray-400: #9AA0A6;
        --gray-600: #5F6368;
        --gray-800: #3C4043;
        --success: #10B981;
        --success-light: #D1FAE5;
        --danger: #EF4444;
        --danger-light: #FEE2E2;
        --info: #3B82F6;
        --info-light: #DBEAFE;
        --warning: #F59E0B;
        --shadow-sm: 0 2px 8px rgba(10,22,40,0.06);
        --shadow-md: 0 8px 24px rgba(10,22,40,0.1);
        --shadow-lg: 0 16px 48px rgba(10,22,40,0.12);
        --shadow-xl: 0 24px 64px rgba(10,22,40,0.16);
        --shadow-orange: 0 8px 32px rgba(255,107,53,0.25);
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
       SPINNER
       ============================================ */
    .spinner-moderne {
        width: 45px; height: 45px;
        border: 3px solid rgba(255,107,53,0.15);
        border-top-color: var(--orange);
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

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
    .btn-topbar.btn-cart {
        background: var(--cream);
        color: var(--gray-800);
        border: 1.5px solid var(--gray-200);
        position: relative;
    }
    .btn-topbar.btn-cart:hover {
        background: var(--orange);
        color: white;
        border-color: var(--orange);
        transform: translateY(-2px);
        box-shadow: var(--shadow-orange);
    }
    .cart-badge {
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
        animation: cart-pulse 2s infinite;
    }
    @keyframes cart-pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.15); }
    }
    .btn-topbar.btn-primary-moderne {
        background: var(--orange);
        color: white;
        box-shadow: 0 4px 16px rgba(255,107,53,0.25);
    }
    .btn-topbar.btn-primary-moderne:hover {
        background: var(--orange-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(255,107,53,0.35);
    }
    .btn-topbar.btn-outline-moderne {
        background: transparent;
        color: var(--gray-600);
        border: 1.5px solid var(--gray-200);
    }
    .btn-topbar.btn-outline-moderne:hover {
        background: var(--blue);
        color: white;
        border-color: var(--blue);
        transform: translateY(-2px);
    }

    /* ============================================
       DASHBOARD CONTENT
       ============================================ */
    .dashboard-content {
        padding: 32px;
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        margin-bottom: 32px;
    }
    .stat-card {
        background: var(--white);
        border-radius: 20px;
        padding: 24px;
        border: 1px solid var(--gray-100);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease both;
    }
    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
    .stat-card:nth-child(4) { animation-delay: 0.4s; }
    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-lg);
        border-color: transparent;
    }
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--orange), var(--orange-light));
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }
    .stat-card:hover::before {
        transform: scaleX(1);
    }
    .stat-icon {
        width: 52px; height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin-bottom: 16px;
        transition: all 0.3s ease;
    }
    .stat-icon.icon-orange {
        background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
        color: var(--orange);
    }
    .stat-icon.icon-blue {
        background: linear-gradient(135deg, rgba(59,130,246,0.1), rgba(59,130,246,0.05));
        color: var(--blue-accent);
    }
    .stat-icon.icon-green {
        background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(16,185,129,0.05));
        color: var(--success);
    }
    .stat-icon.icon-purple {
        background: linear-gradient(135deg, rgba(139,92,246,0.1), rgba(139,92,246,0.05));
        color: #8B5CF6;
    }
    .stat-card:hover .stat-icon {
        transform: scale(1.1) rotate(-5deg);
    }
    .stat-value {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--blue);
        margin-bottom: 4px;
        line-height: 1;
    }
    .stat-label {
        font-size: 0.85rem;
        color: var(--gray-600);
        font-weight: 600;
    }

    /* Section Header */
    .section-header-dash {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }
    .section-title-dash {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--blue);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .section-title-dash i {
        color: var(--orange);
    }
    .section-count {
        background: var(--orange);
        color: white;
        padding: 4px 14px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 700;
    }

    /* Alert Moderne */
    .alert-moderne {
        border: none;
        border-radius: 16px;
        padding: 20px 24px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 14px;
        animation: slideInRight 0.5s ease;
        position: relative;
        overflow: hidden;
    }
    .alert-moderne::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 4px; height: 100%;
    }
    .alert-moderne.alert-success {
        background: var(--success-light);
        color: #065F46;
    }
    .alert-moderne.alert-success::before {
        background: var(--success);
    }
    .alert-moderne.alert-danger {
        background: var(--danger-light);
        color: #991B1B;
    }
    .alert-moderne.alert-danger::before {
        background: var(--danger);
    }
    .alert-moderne i {
        font-size: 1.3rem;
        flex-shrink: 0;
    }
    .alert-moderne .btn-close {
        position: absolute;
        top: 16px; right: 16px;
        opacity: 0.5;
        transition: all 0.2s ease;
    }
    .alert-moderne .btn-close:hover {
        opacity: 1;
        transform: rotate(90deg);
    }

    /* Video Cards Grid */
    .videos-grid-dash {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 24px;
    }
    .video-card-dash {
        background: var(--white);
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid var(--gray-100);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        display: flex;
        flex-direction: column;
        animation: fadeInUp 0.6s ease both;
    }
    .video-card-dash:nth-child(1) { animation-delay: 0.1s; }
    .video-card-dash:nth-child(2) { animation-delay: 0.2s; }
    .video-card-dash:nth-child(3) { animation-delay: 0.3s; }
    .video-card-dash:nth-child(4) { animation-delay: 0.4s; }
    .video-card-dash:nth-child(5) { animation-delay: 0.5s; }
    .video-card-dash:nth-child(6) { animation-delay: 0.6s; }
    .video-card-dash::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--orange), var(--orange-light));
        transform: scaleX(0);
        transition: transform 0.4s ease;
        z-index: 2;
    }
    .video-card-dash:hover::before {
        transform: scaleX(1);
    }
    .video-card-dash:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-color: transparent;
    }
    .video-thumb-dash {
        position: relative;
        height: 180px;
        background-size: cover;
        background-position: center;
        overflow: hidden;
    }
    .video-thumb-dash::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(to top, rgba(10,22,40,0.7) 0%, transparent 60%);
        transition: all 0.3s ease;
    }
    .video-card-dash:hover .video-thumb-dash::after {
        background: linear-gradient(to top, rgba(10,22,40,0.8) 0%, rgba(255,107,53,0.1) 100%);
    }
    .play-overlay {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%) scale(1);
        width: 60px; height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--orange), var(--orange-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        box-shadow: var(--shadow-orange);
        transition: all 0.4s ease;
        z-index: 3;
        cursor: pointer;
    }
    .video-card-dash:hover .play-overlay {
        transform: translate(-50%, -50%) scale(1.15);
    }
    .play-overlay::before {
        content: '';
        position: absolute;
        inset: -6px;
        border-radius: 50%;
        border: 2px solid rgba(255,107,53,0.3);
        animation: play-pulse 2s ease-in-out infinite;
    }
    @keyframes play-pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.3); opacity: 0; }
    }
    .video-badge-type {
        position: absolute;
        top: 12px; left: 12px;
        background: linear-gradient(135deg, var(--blue), var(--blue-light));
        color: white;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        z-index: 3;
    }
    .video-card-body-dash {
        padding: 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .video-card-body-dash h5 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--blue);
        margin-bottom: 8px;
        line-height: 1.4;
    }
    .video-card-body-dash p {
        font-size: 0.88rem;
        color: var(--gray-600);
        line-height: 1.6;
        margin-bottom: 16px;
    }
    .video-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 16px;
    }
    .badge-dash {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.78rem;
        font-weight: 600;
    }
    .badge-dash.badge-type {
        background: var(--info-light);
        color: var(--info);
    }
    .badge-dash.badge-duree {
        background: var(--cream);
        color: var(--gray-600);
        border: 1px solid var(--gray-200);
    }
    .badge-dash.badge-valid {
        background: var(--success-light);
        color: #065F46;
    }
    .video-dates {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-bottom: 20px;
        padding: 12px 16px;
        background: var(--cream);
        border-radius: 12px;
        border: 1px solid var(--gray-100);
    }
    .video-date {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.82rem;
        color: var(--gray-600);
    }
    .video-date i {
        color: var(--orange);
        font-size: 0.85rem;
    }
    .video-date .date-label {
        font-weight: 600;
        color: var(--gray-800);
    }
    .btn-watch {
        width: 100%;
        padding: 14px 24px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.95rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.3s ease;
        border: none;
        background: linear-gradient(135deg, var(--orange), var(--orange-dark));
        color: white;
        box-shadow: 0 4px 16px rgba(255,107,53,0.25);
        font-family: 'Nunito', sans-serif;
    }
    .btn-watch:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(255,107,53,0.4);
        color: white;
    }
    .btn-watch i {
        transition: transform 0.3s ease;
    }
    .btn-watch:hover i {
        transform: translateX(3px);
    }

    /* Empty State */
    .empty-state-dash {
        text-align: center;
        padding: 80px 20px;
        background: var(--white);
        border-radius: 24px;
        border: 2px dashed var(--gray-200);
        animation: fadeInUp 0.8s ease;
    }
    .empty-icon-dash {
        width: 100px; height: 100px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--cream), var(--gray-50));
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-size: 2.5rem;
        color: var(--gray-400);
        border: 2px dashed var(--gray-200);
        animation: empty-float 3s ease-in-out infinite;
    }
    @keyframes empty-float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    .empty-state-dash h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--blue);
        margin-bottom: 8px;
    }
    .empty-state-dash p {
        color: var(--gray-600);
        margin-bottom: 24px;
    }
    .empty-actions {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    /* Progress bar for expiry */
    .expiry-progress {
        margin-top: 12px;
    }
    .expiry-progress-label {
        display: flex;
        justify-content: space-between;
        font-size: 0.75rem;
        color: var(--gray-600);
        margin-bottom: 6px;
    }
    .expiry-progress-bar {
        height: 6px;
        background: var(--gray-100);
        border-radius: 3px;
        overflow: hidden;
    }
    .expiry-progress-fill {
        height: 100%;
        border-radius: 3px;
        background: linear-gradient(90deg, var(--orange), var(--orange-light));
        transition: width 1s ease;
        position: relative;
    }
    .expiry-progress-fill::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        animation: progress-shimmer 2s infinite;
    }
    @keyframes progress-shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* ============================================
       ANIMATIONS
       ============================================ */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(30px); }
        to { opacity: 1; transform: translateX(0); }
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 991px) {
        .sidebar {
            transform: translateX(-100%);
        }
        .sidebar.open {
            transform: translateX(0);
        }
        .sidebar-toggle {
            display: flex;
        }
        .main-content {
            margin-left: 0;
        }
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 767px) {
        .stats-grid { grid-template-columns: 1fr; }
        .topbar { padding: 16px 20px; }
        .dashboard-content { padding: 20px; }
        .videos-grid-dash { grid-template-columns: 1fr; }
        .section-header-dash { flex-direction: column; gap: 12px; align-items: flex-start; }
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
            <span>MONPROFCHEZMOI</span>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="{{ url('/') }}" class="sidebar-nav-link">
                    <i class="fas fa-home"></i>
                    <span>Accueil</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('video.dashboard') }}" class="sidebar-nav-link active">
                    <i class="fas fa-film"></i>
                    <span>Mes vidéos</span>
                    @if($accessList->count() > 0)
                        <span class="badge-count">{{ $accessList->count() }}</span>
                    @endif
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('dcg.index') }}" class="sidebar-nav-link">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Formations DCG</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('dscg.index') }}" class="sidebar-nav-link">
                    <i class="fas fa-university"></i>
                    <span>Formations DSCG</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('panier.index') }}" class="sidebar-nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Mon panier</span>
                    @php
                        $cartCountDash = \App\Models\PanierVideo::where('user_id', Auth::id())->count();
                    @endphp
                    @if($cartCountDash > 0)
                        <span class="badge-count">{{ $cartCountDash }}</span>
                    @endif
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                <div class="user-info">
                    <p class="user-name">{{ Auth::user()->name }}</p>
                    <p class="user-role">Étudiant</p>
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
                <i class="fas fa-film"></i>
                Mes vidéos achetées
            </h1>
            <div class="topbar-actions">
                @auth
                    <a href="{{ route('panier.index') }}" class="btn-topbar btn-cart">
                        <i class="fas fa-shopping-cart"></i>
                        Panier
                        @if($cartCountDash > 0)
                            <span class="cart-badge">{{ $cartCountDash }}</span>
                        @endif
                    </a>
                @endauth
                <a href="{{ route('dcg.index') }}" class="btn-topbar btn-primary-moderne">
                    <i class="fas fa-graduation-cap"></i> DCG/DSCG
                </a>
                <a href="{{ route('video.dashboard') }}" class="btn-topbar btn-outline-moderne">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon icon-orange">
                        <i class="fas fa-film"></i>
                    </div>
                    <div class="stat-value">{{ $accessList->count() }}</div>
                    <div class="stat-label">Vidéos achetées</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon icon-blue">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-value">
                        @php
                            $totalDuree = 0;
                            foreach($accessList as $access) {
                                $parts = explode(':', $access->video->duree ?? '00:00');
                                $totalDuree += ($parts[0] * 60) + ($parts[1] ?? 0);
                            }
                            echo floor($totalDuree / 60) . 'h ' . ($totalDuree % 60) . 'min';
                        @endphp
                    </div>
                    <div class="stat-label">Heures de formation</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon icon-green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-value">
                        @php
                            $validCount = $accessList->filter(function($a) {
                                return $a->acces_jusquau > now();
                            })->count();
                        @endphp
                        {{ $validCount }}
                    </div>
                    <div class="stat-label">Accès actifs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon icon-purple">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="stat-value">
                        @php
                            $types = $accessList->pluck('video.formation_type')->unique()->count();
                        @endphp
                        {{ $types }}
                    </div>
                    <div class="stat-label">Formations suivies</div>
                </div>
            </div>

            <!-- Alerts -->
            @if(session('success'))
                <div class="alert-moderne alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert-moderne alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Videos Section -->
            <div class="section-header-dash">
                <h2 class="section-title-dash">
                    <i class="fas fa-play-circle"></i>
                    Mes formations
                </h2>
                <span class="section-count">{{ $accessList->count() }} vidéo(s)</span>
            </div>

            @if($accessList->count() > 0)
                <div class="videos-grid-dash">
                    @foreach($accessList as $index => $access)
                        @php
                            $totalDays = $access->created_at->diffInDays($access->acces_jusquau);
                            $remainingDays = now()->diffInDays($access->acces_jusquau, false);
                            $progressPercent = $totalDays > 0 ? max(0, min(100, (($totalDays - max(0, $remainingDays)) / $totalDays) * 100)) : 0;
                        @endphp
                        <div class="video-card-dash">
                            @if($access->video->thumbnail)
                                <div class="video-thumb-dash" style="background-image: url('{{ asset('storage/' . $access->video->thumbnail) }}');">
                            @else
                                <div class="video-thumb-dash" style="background: linear-gradient(135deg, var(--blue), var(--blue-light));">
                            @endif
                                <div class="play-overlay">
                                    <i class="fas fa-play"></i>
                                </div>
                                <span class="video-badge-type">{{ ucfirst($access->video->formation_type) }}</span>
                            </div>
                            <div class="video-card-body-dash">
                                <h5>{{ $access->video->titre }}</h5>
                                <p>{{ Str::limit($access->video->description, 80) }}</p>

                                <div class="video-badges">
                                    <span class="badge-dash badge-type">
                                        <i class="fas fa-tag"></i> {{ ucfirst($access->video->formation_type) }}
                                    </span>
                                    <span class="badge-dash badge-duree">
                                        <i class="fas fa-clock"></i> {{ $access->video->duree ?? '45:00' }}
                                    </span>
                                    <span class="badge-dash badge-valid">
                                        <i class="fas fa-check-circle"></i> Accès valide
                                    </span>
                                </div>

                                <div class="video-dates">
                                    <div class="video-date">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span><span class="date-label">Achat:</span> {{ $access->created_at ? $access->created_at->format('d/m/Y') : 'N/A' }}</span>
                                    </div>
                                    <div class="video-date">
                                        <i class="fas fa-hourglass-end"></i>
                                        <span><span class="date-label">Expire:</span> {{ $access->acces_jusquau->format('d/m/Y') }}</span>
                                    </div>
                                </div>

                                <!-- Progress bar -->
                                <div class="expiry-progress">
                                    <div class="expiry-progress-label">
                                        <span>Validité</span>
                                        <span>{{ max(0, $remainingDays) }} jours restants</span>
                                    </div>
                                    <div class="expiry-progress-bar">
                                        <div class="expiry-progress-fill" style="width: {{ 100 - $progressPercent }}%;"></div>
                                    </div>
                                </div>

                                <a href="{{ route('video.show', $access->video->id) }}" class="btn-watch" style="margin-top: 16px;">
                                    <i class="fas fa-play-circle"></i> Regarder
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state-dash">
                    <div class="empty-icon-dash">
                        <i class="fas fa-film"></i>
                    </div>
                    <h3>Aucune vidéo achetée</h3>
                    <p>Explorez nos formations DCG et DSCG pour commencer votre parcours</p>
                    <div class="empty-actions">
                        <a href="{{ route('dcg.index') }}" class="btn-watch">
                            <i class="fas fa-graduation-cap"></i> Formations DCG
                        </a>
                        <a href="{{ route('dscg.index') }}" class="btn-topbar btn-outline-moderne" style="padding: 14px 24px;">
                            <i class="fas fa-university"></i> Formations DSCG
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </main>
</div>

<!-- ============================================
     SCRIPTS
     ============================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Scroll Progress
window.addEventListener('scroll', function() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    document.getElementById('scrollProgress').style.width = (scrollTop / scrollHeight * 100) + '%';
});

// Spinner
window.addEventListener('load', function() {
    setTimeout(() => {
        const spinner = document.getElementById('spinner');
        if (spinner) spinner.classList.remove('show');
    }, 500);
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

// Auto-dismiss alerts
document.querySelectorAll('.alert-moderne').forEach(alert => {
    setTimeout(() => {
        const closeBtn = alert.querySelector('.btn-close');
        if (closeBtn) closeBtn.click();
    }, 6000);
});
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
