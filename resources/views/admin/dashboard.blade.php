<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/asset/img/favicon.png" rel="icon">

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
       MONPROFCHEZMOI - ADMIN DASHBOARD DESIGN SYSTEM
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

    /* ============================================
       QUICK ACTIONS GRID
       ============================================ */
    .section-header-dash {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
        margin-top: 40px;
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
    .actions-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
    .action-card {
        background: var(--white);
        border-radius: 24px;
        padding: 32px 24px;
        text-align: center;
        border: 1px solid var(--gray-100);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease both;
        text-decoration: none;
        display: block;
    }
    .action-card:nth-child(1) { animation-delay: 0.1s; }
    .action-card:nth-child(2) { animation-delay: 0.15s; }
    .action-card:nth-child(3) { animation-delay: 0.2s; }
    .action-card:nth-child(4) { animation-delay: 0.25s; }
    .action-card:nth-child(5) { animation-delay: 0.3s; }
    .action-card:nth-child(6) { animation-delay: 0.35s; }
    .action-card:nth-child(7) { animation-delay: 0.4s; }
    .action-card:nth-child(8) { animation-delay: 0.45s; }
    .action-card:nth-child(9) { animation-delay: 0.5s; }
    .action-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }
    .action-card:hover::before {
        transform: scaleX(1);
    }
    .action-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-color: transparent;
    }
    .action-icon {
        width: 70px; height: 70px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 1.8rem;
        color: white;
        transition: all 0.3s ease;
    }
    .action-card:hover .action-icon {
        transform: scale(1.1) rotate(-5deg);
    }
    .action-card h5 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--blue);
        margin-bottom: 16px;
    }
    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 24px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.88rem;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
    }

    /* Couleurs spécifiques */
    .action-card.orange .action-icon { background: linear-gradient(135deg, var(--orange), var(--orange-light)); }
    .action-card.orange::before { background: linear-gradient(90deg, var(--orange), var(--orange-light)); }
    .action-card.orange .btn-action { background: var(--orange); color: white; box-shadow: 0 4px 16px rgba(255,107,53,0.25); }
    .action-card.orange .btn-action:hover { background: var(--orange-dark); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(255,107,53,0.35); }

    .action-card.blue .action-icon { background: linear-gradient(135deg, var(--blue-accent), #60A5FA); }
    .action-card.blue::before { background: linear-gradient(90deg, var(--blue-accent), #60A5FA); }
    .action-card.blue .btn-action { background: var(--blue-accent); color: white; box-shadow: 0 4px 16px rgba(59,130,246,0.25); }
    .action-card.blue .btn-action:hover { background: #2563EB; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(59,130,246,0.35); }

    .action-card.green .action-icon { background: linear-gradient(135deg, var(--success), #34D399); }
    .action-card.green::before { background: linear-gradient(90deg, var(--success), #34D399); }
    .action-card.green .btn-action { background: var(--success); color: white; box-shadow: 0 4px 16px rgba(16,185,129,0.25); }
    .action-card.green .btn-action:hover { background: #059669; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(16,185,129,0.35); }

    .action-card.purple .action-icon { background: linear-gradient(135deg, var(--purple), #A78BFA); }
    .action-card.purple::before { background: linear-gradient(90deg, var(--purple), #A78BFA); }
    .action-card.purple .btn-action { background: var(--purple); color: white; box-shadow: 0 4px 16px rgba(139,92,246,0.25); }
    .action-card.purple .btn-action:hover { background: #7C3AED; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(139,92,246,0.35); }

    .action-card.red .action-icon { background: linear-gradient(135deg, var(--danger), #F87171); }
    .action-card.red::before { background: linear-gradient(90deg, var(--danger), #F87171); }
    .action-card.red .btn-action { background: var(--danger); color: white; box-shadow: 0 4px 16px rgba(239,68,68,0.25); }
    .action-card.red .btn-action:hover { background: #DC2626; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(239,68,68,0.35); }

    .action-card.yellow .action-icon { background: linear-gradient(135deg, var(--warning), #FBBF24); }
    .action-card.yellow::before { background: linear-gradient(90deg, var(--warning), #FBBF24); }
    .action-card.yellow .btn-action { background: var(--warning); color: white; box-shadow: 0 4px 16px rgba(245,158,11,0.25); }
    .action-card.yellow .btn-action:hover { background: #D97706; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(245,158,11,0.35); }

    .action-card.teal .action-icon { background: linear-gradient(135deg, #14B8A6, #2DD4BF); }
    .action-card.teal::before { background: linear-gradient(90deg, #14B8A6, #2DD4BF); }
    .action-card.teal .btn-action { background: #14B8A6; color: white; box-shadow: 0 4px 16px rgba(20,184,166,0.25); }
    .action-card.teal .btn-action:hover { background: #0D9488; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(20,184,166,0.35); }

    .action-card.cyan .action-icon { background: linear-gradient(135deg, #06B6D4, #22D3EE); }
    .action-card.cyan::before { background: linear-gradient(90deg, #06B6D4, #22D3EE); }
    .action-card.cyan .btn-action { background: #06B6D4; color: white; box-shadow: 0 4px 16px rgba(6,182,212,0.25); }
    .action-card.cyan .btn-action:hover { background: #0891B2; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(6,182,212,0.35); }

    .action-card.pink .action-icon { background: linear-gradient(135deg, #EC4899, #F472B6); }
    .action-card.pink::before { background: linear-gradient(90deg, #EC4899, #F472B6); }
    .action-card.pink .btn-action { background: #EC4899; color: white; box-shadow: 0 4px 16px rgba(236,72,153,0.25); }
    .action-card.pink .btn-action:hover { background: #DB2777; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(236,72,153,0.35); }

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

    /* Responsive */
    @media (max-width: 1200px) {
        .actions-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 991px) {
        .sidebar { transform: translateX(-100%); }
        .sidebar.open { transform: translateX(0); }
        .sidebar-toggle { display: flex; }
        .main-content { margin-left: 0; }
        .actions-grid { grid-template-columns: repeat(2, 1fr); }
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
        .actions-grid { grid-template-columns: 1fr; }
        .table-moderne { font-size: 0.85rem; }
        .table-moderne thead th, .table-moderne tbody td { padding: 12px 14px; }
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

    /* ============================================
       FACTURATION GLOBALE DESIGN SYSTEM
       ============================================ */
    .facturation-section {
        background: var(--white);
        border-radius: 24px;
        padding: 32px;
        margin-bottom: 36px;
        border: 1px solid var(--gray-100);
        box-shadow: var(--shadow-sm);
        animation: fadeInUp 0.5s ease both;
    }
    .facturation-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 24px;
        padding-bottom: 20px;
        border-bottom: 1.5px solid var(--gray-100);
    }
    .facturation-title-box {
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .facturation-icon-badge {
        width: 52px; height: 52px;
        border-radius: 16px;
        background: linear-gradient(135deg, var(--blue-accent), #1E40AF);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
    }
    .facturation-title-box h3 {
        margin: 0;
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--blue);
    }
    .facturation-title-box p {
        margin: 2px 0 0 0;
        font-size: 0.88rem;
        color: var(--gray-600);
    }
    .facturation-actions-header {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }
    .btn-facture-action {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        text-decoration: none;
    }
    .btn-facture-action.btn-csv {
        background: var(--success-light);
        color: #065F46;
        border: 1.5px solid rgba(16, 185, 129, 0.25);
    }
    .btn-facture-action.btn-csv:hover {
        background: var(--success);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }
    .btn-facture-action.btn-print {
        background: var(--gray-100);
        color: var(--gray-800);
        border: 1.5px solid var(--gray-200);
    }
    .btn-facture-action.btn-print:hover {
        background: var(--blue);
        color: white;
        border-color: var(--blue);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(10, 22, 40, 0.2);
    }

    /* KPI Cards Facturation */
    .facturation-kpis {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 28px;
    }
    .kpi-facture-card {
        padding: 20px 22px;
        border-radius: 18px;
        background: var(--cream);
        border: 1.5px solid var(--gray-100);
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .kpi-facture-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
        border-color: transparent;
    }
    .kpi-facture-card.card-success {
        background: linear-gradient(135deg, #ECFDF5 0%, #D1FAE5 100%);
        border-color: rgba(16, 185, 129, 0.25);
    }
    .kpi-facture-card.card-warning {
        background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%);
        border-color: rgba(245, 158, 11, 0.25);
    }
    .kpi-facture-card.card-info {
        background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);
        border-color: rgba(59, 130, 246, 0.25);
    }
    .kpi-facture-card.card-purple {
        background: linear-gradient(135deg, #F5F3FF 0%, #EDE9FE 100%);
        border-color: rgba(139, 92, 246, 0.25);
    }
    .kpi-facture-label {
        font-size: 0.76rem;
        text-transform: uppercase;
        font-weight: 800;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        display: block;
    }
    .kpi-facture-card.card-success .kpi-facture-label { color: #047857; }
    .kpi-facture-card.card-warning .kpi-facture-label { color: #B45309; }
    .kpi-facture-card.card-info .kpi-facture-label { color: #1D4ED8; }
    .kpi-facture-card.card-purple .kpi-facture-label { color: #6D28D9; }

    .kpi-facture-val {
        font-size: 1.45rem;
        font-weight: 800;
        line-height: 1.1;
        margin: 0;
        color: var(--blue);
    }
    .kpi-facture-sub {
        font-size: 0.75rem;
        font-weight: 700;
        margin-top: 4px;
        display: block;
    }
    .kpi-facture-card.card-success .kpi-facture-sub { color: #059669; }
    .kpi-facture-card.card-warning .kpi-facture-sub { color: #D97706; }
    .kpi-facture-card.card-info .kpi-facture-sub { color: #2563EB; }
    .kpi-facture-card.card-purple .kpi-facture-sub { color: #7C3AED; }

    .kpi-facture-icon {
        width: 48px; height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
    }
    .kpi-facture-card.card-success .kpi-facture-icon { background: rgba(16, 185, 129, 0.2); color: #047857; }
    .kpi-facture-card.card-warning .kpi-facture-icon { background: rgba(245, 158, 11, 0.2); color: #B45309; }
    .kpi-facture-card.card-info .kpi-facture-icon { background: rgba(59, 130, 246, 0.2); color: #1D4ED8; }
    .kpi-facture-card.card-purple .kpi-facture-icon { background: rgba(139, 92, 246, 0.2); color: #6D28D9; }

    /* Facturation Toolbar */
    .facturation-toolbar {
        background: var(--cream);
        border: 1.5px solid var(--gray-200);
        border-radius: 18px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }
    .facturation-search-box {
        position: relative;
        flex: 1;
        min-width: 260px;
    }
    .facturation-search-box i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-400);
        font-size: 0.95rem;
    }
    .facturation-search-input {
        width: 100%;
        padding: 10px 14px 10px 40px;
        border-radius: 12px;
        border: 1.5px solid var(--gray-200);
        background: white;
        font-size: 0.88rem;
        font-family: inherit;
        font-weight: 600;
        color: var(--gray-800);
        outline: none;
        transition: all 0.25s ease;
    }
    .facturation-search-input:focus {
        border-color: var(--blue-accent);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
    }
    .facturation-filters-group {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }
    .facturation-select {
        padding: 9px 14px;
        border-radius: 12px;
        border: 1.5px solid var(--gray-200);
        background: white;
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--gray-700);
        outline: none;
        cursor: pointer;
        transition: all 0.25s ease;
    }
    .facturation-select:focus {
        border-color: var(--blue-accent);
    }
    .btn-facture-status {
        padding: 8px 16px;
        border-radius: 50px;
        border: 1.5px solid var(--gray-200);
        background: white;
        color: var(--gray-600);
        font-size: 0.82rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-facture-status.active {
        background: var(--blue);
        color: white;
        border-color: var(--blue);
        box-shadow: 0 4px 12px rgba(10, 22, 40, 0.2);
    }
    .facturation-status-info {
        font-size: 0.82rem;
        font-weight: 700;
        color: var(--gray-600);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Factures Table Badges & Cells */
    .badge-ref-facture {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-family: monospace;
        font-weight: 800;
        font-size: 0.82rem;
        background: #F1F5F9;
        color: #1E293B;
        padding: 4px 10px;
        border-radius: 8px;
        border: 1px solid #CBD5E1;
    }
    .badge-cat-tag {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 6px;
        font-size: 0.72rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }
    .badge-cat-tag.cat-dcg { background: #EDE9FE; color: #6D28D9; }
    .badge-cat-tag.cat-dscg { background: #FCE7F3; color: #BE185D; }
    .badge-cat-tag.cat-formation { background: #DBEAFE; color: #1D4ED8; }
    .badge-cat-tag.cat-bon { background: #FEF3C7; color: #B45309; }
    .badge-cat-tag.cat-soutien { background: #E0E7FF; color: #4338CA; }
    .badge-cat-tag.cat-reservation { background: #FFEDD5; color: #C2410C; }

    .btn-view-invoice {
        background: linear-gradient(135deg, var(--blue-accent), #2563EB);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 0.78rem;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.25s ease;
    }
    .btn-view-invoice:hover {
        background: var(--blue);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
        color: white;
    }

    /* Modal Facture Print Style */
    .invoice-paper {
        background: white;
        border-radius: 16px;
        padding: 36px;
        color: #1F2937;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        position: relative;
    }
    .invoice-stamp {
        position: absolute;
        top: 130px;
        right: 40px;
        border: 3px dashed #10B981;
        color: #10B981;
        font-size: 1.3rem;
        font-weight: 900;
        text-transform: uppercase;
        padding: 6px 20px;
        border-radius: 12px;
        transform: rotate(-12deg);
        opacity: 0.85;
        letter-spacing: 2px;
    }
    .invoice-stamp.stamp-pending {
        border-color: #F59E0B;
        color: #F59E0B;
    }
    .invoice-stamp.stamp-failed {
        border-color: #EF4444;
        color: #EF4444;
    }

    @media (max-width: 992px) {
        .facturation-kpis { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 576px) {
        .facturation-kpis { grid-template-columns: 1fr; }
        .facturation-toolbar { flex-direction: column; align-items: stretch; }
    }

    /* Print View */
    @media print {
        body * { visibility: hidden; }
        #invoicePrintArea, #invoicePrintArea * { visibility: visible; }
        #invoicePrintArea {
            position: absolute;
            left: 0; top: 0;
            width: 100%;
            margin: 0;
            padding: 20px;
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
            <img src="/asset/img/logo.png" alt="Monprofchezmoi">
            <span>ADMIN</span>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="{{ url('/particuliers') }}" class="sidebar-nav-link">
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
                <a href="#facturation-section" class="sidebar-nav-link" style="color: #93C5FD;">
                    <i class="fas fa-file-invoice-dollar" style="color: #60A5FA;"></i>
                    <span>Facturation (Tous)</span>
                    <span class="badge-count" style="background: var(--blue-accent); color: white;">{{ $facturationStats['nb_total'] }}</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.admin.leads.index') }}" class="sidebar-nav-link">
                    <i class="fas fa-funnel-dollar"></i>
                    <span>Diagnostics & Leads</span>
                    @php $newLeadsCount = \App\Models\Lead::where('statut', 'nouveau')->count(); @endphp
                    @if($newLeadsCount > 0)
                        <span class="badge-count">{{ $newLeadsCount }}</span>
                    @endif
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.admin.notifications.index') }}" class="sidebar-nav-link">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                    @php $notifCount = \App\Models\Notification::unread()->count(); @endphp
                    @if($notifCount > 0)
                        <span class="badge-count">{{ $notifCount }}</span>
                    @endif
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.admin.videos.index') }}" class="sidebar-nav-link">
                    <i class="fas fa-video"></i>
                    <span>Vidéos DCG/DSCG</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ url('/particuliers/voirsoutien') }}" class="sidebar-nav-link">
                    <i class="fas fa-users"></i>
                    <span>Soutien</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.admin.bons.verifier') }}" class="sidebar-nav-link">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Vérifier Bon Cadeau</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ url('/particuliers/voircours') }}" class="sidebar-nav-link">
                    <i class="fas fa-eye"></i>
                    <span>Cours</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="user-avatar">{{ substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1) }}</div>
                <div class="user-info">
                    <p class="user-name">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                    <p class="user-role">Administrateur</p>
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
                Tableau de Bord
            </h1>
            <div class="topbar-actions">
                <a href="{{ route('particuliers.admin.notifications.index') }}" class="btn-topbar btn-notif">
                    <i class="fas fa-bell"></i>
                    Notifications
                    @if($notifCount > 0)
                        <span class="notif-badge">{{ $notifCount }}</span>
                    @endif
                </a>
                <form action="{{ route('particuliers.admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-topbar btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">

            <!-- Total Global -->
            <div class="total-global-card">
                <div>
                    <span class="label">Revenu total (paiements confirmés)</span>
                    <p class="montant">{{ number_format($totalGlobal, 0, ',', ' ') }} FCFA</p>
                </div>
                <div class="icon-bg">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
            <!-- ============================================
                 TABLEAU RÉCAPITULATIF DE FACTURATION (TOUS LES PAIEMENTS)
                 ============================================ -->
            <div id="facturation-section" class="facturation-section">
                <!-- Header Facturation -->
                <div class="facturation-header">
                    <div class="facturation-title-box">
                        <div class="facturation-icon-badge">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div>
                            <h3>Récapitulatif de Facturation</h3>
                            <p>Suivi comptable & encaissements de tous les paiements (Formations, DCG/DSCG, Bons, Soutien & Réservations)</p>
                        </div>
                    </div>
                    <div class="facturation-actions-header">
                        <button type="button" onclick="exportFacturesCSV()" class="btn-facture-action btn-csv" title="Télécharger le fichier Excel/CSV">
                            <i class="fas fa-file-excel"></i> Exporter CSV
                        </button>
                        <button type="button" onclick="printFacturesRecap()" class="btn-facture-action btn-print" title="Imprimer le tableau des factures">
                            <i class="fas fa-print"></i> Imprimer Tableau
                        </button>
                    </div>
                </div>

                <!-- KPI Cards Facturation -->
                <div class="facturation-kpis">
                    <!-- Total Encaissé -->
                    <div class="kpi-facture-card card-success">
                        <div>
                            <span class="kpi-facture-label">Total Encaissé</span>
                            <h4 class="kpi-facture-val">{{ number_format($facturationStats['total_encaisse'], 0, ',', ' ') }} F</h4>
                            <span class="kpi-facture-sub"><i class="fas fa-check-circle"></i> {{ $facturationStats['nb_encaisse'] }} paiements validés</span>
                        </div>
                        <div class="kpi-facture-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>

                    <!-- En attente d'encaissement -->
                    <div class="kpi-facture-card card-warning">
                        <div>
                            <span class="kpi-facture-label">En Attente</span>
                            <h4 class="kpi-facture-val">{{ number_format($facturationStats['total_attente'], 0, ',', ' ') }} F</h4>
                            <span class="kpi-facture-sub"><i class="fas fa-hourglass-half"></i> {{ $facturationStats['nb_attente'] }} en cours</span>
                        </div>
                        <div class="kpi-facture-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>

                    <!-- Volume Total Facturé -->
                    <div class="kpi-facture-card card-info">
                        <div>
                            <span class="kpi-facture-label">Volume Émis</span>
                            <h4 class="kpi-facture-val">{{ number_format($facturationStats['total_general'], 0, ',', ' ') }} F</h4>
                            <span class="kpi-facture-sub"><i class="fas fa-file-invoice"></i> {{ $facturationStats['nb_total'] }} factures au total</span>
                        </div>
                        <div class="kpi-facture-icon">
                            <i class="fas fa-receipt"></i>
                        </div>
                    </div>

                    <!-- Panier Moyen -->
                    <div class="kpi-facture-card card-purple">
                        <div>
                            <span class="kpi-facture-label">Panier Moyen</span>
                            <h4 class="kpi-facture-val">{{ number_format($facturationStats['panier_moyen'], 0, ',', ' ') }} F</h4>
                            <span class="kpi-facture-sub"><i class="fas fa-chart-pie"></i> Par paiement confirmé</span>
                        </div>
                        <div class="kpi-facture-icon">
                            <i class="fas fa-calculator"></i>
                        </div>
                    </div>
                </div>

                <!-- Toolbar de Filtrage & Recherche -->
                <div class="facturation-toolbar">
                    <div class="facturation-search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="factureSearchInput" oninput="applyFactureFilters()" placeholder="Rechercher client, email, téléphone, N° facture, transaction..." class="facturation-search-input">
                    </div>

                    <div class="facturation-filters-group">
                        <select id="factureCategorySelect" onchange="applyFactureFilters()" class="facturation-select">
                            <option value="all">Toutes les prestations</option>
                            <option value="dcg">Formation DCG</option>
                            <option value="dscg">Formation DSCG</option>
                            <option value="formation">Formations en ligne</option>
                            <option value="bon">Bons d'achat</option>
                            <option value="soutien">Soutien scolaire</option>
                            <option value="reservation">Réservations Flash</option>
                        </select>

                        <button type="button" class="btn-facture-status active" data-status="all" onclick="setFactureStatus('all', this)">
                            <i class="fas fa-layer-group"></i> Toutes
                        </button>
                        <button type="button" class="btn-facture-status" data-status="paye" onclick="setFactureStatus('paye', this)">
                            <i class="fas fa-check-circle" style="color: var(--success);"></i> Réglées
                        </button>
                        <button type="button" class="btn-facture-status" data-status="attente" onclick="setFactureStatus('attente', this)">
                            <i class="fas fa-clock" style="color: var(--warning);"></i> En attente
                        </button>
                        <button type="button" class="btn-facture-status" data-status="echec" onclick="setFactureStatus('echec', this)">
                            <i class="fas fa-times-circle" style="color: var(--danger);"></i> Échec / Annulé
                        </button>
                    </div>
                </div>

                <!-- Info compteur filtré -->
                <div class="facturation-status-info">
                    <span>
                        <i class="fas fa-list-ul me-1"></i> Affichage de <strong id="factureVisibleCount">{{ $facturationStats['nb_total'] }}</strong> sur {{ $facturationStats['nb_total'] }} factures
                    </span>
                    <span>
                        Montant cumulé : <strong id="factureVisibleAmount" style="color: var(--blue); font-size: 0.95rem;">{{ number_format($facturationStats['total_general'], 0, ',', ' ') }}</strong> FCFA
                    </span>
                </div>

                <!-- Tableau Moderne Facturation -->
                <div class="table-responsive table-wrapper" style="border: 1px solid var(--gray-200); border-radius: 16px; overflow: hidden; background: white;">
                    <table class="table-moderne" id="facturesTable" style="margin-bottom: 0;">
                        <thead>
                            <tr>
                                <th>Réf Facture</th>
                                <th>Date & Heure</th>
                                <th>Client / Facturé à</th>
                                <th>Prestation & Type</th>
                                <th>Mode & Transaction</th>
                                <th style="text-align: right;">Montant TTC</th>
                                <th style="text-align: center;">Statut</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="facturesTableBody">
                            @forelse($factures as $f)
                            @php
                                $statusGroup = $f['est_confirme'] ? 'paye' : (str_contains(strtolower($f['statut']), 'attente') ? 'attente' : 'echec');
                                $catClass = match($f['categorie']) {
                                    'dcg' => 'cat-dcg',
                                    'dscg' => 'cat-dscg',
                                    'formation' => 'cat-formation',
                                    'bon' => 'cat-bon',
                                    'soutien' => 'cat-soutien',
                                    'reservation' => 'cat-reservation',
                                    default => 'cat-formation',
                                };
                            @endphp
                            <tr class="facture-row"
                                data-category="{{ $f['categorie'] }}"
                                data-status-group="{{ $statusGroup }}"
                                data-montant="{{ $f['montant'] }}"
                                data-search="{{ strtolower($f['ref_facture'] . ' ' . $f['client'] . ' ' . $f['email'] . ' ' . $f['telephone'] . ' ' . $f['prestation'] . ' ' . $f['transaction_id'] . ' ' . $f['type']) }}">
                                <td>
                                    <span class="badge-ref-facture">
                                        <i class="fas fa-file-invoice text-primary"></i>
                                        {{ $f['ref_facture'] }}
                                    </span>
                                </td>
                                <td>
                                    <div style="font-weight: 700; color: var(--blue);">{{ $f['date'] ? $f['date']->format('d/m/Y') : '-' }}</div>
                                    <small style="color: var(--gray-400); font-size: 0.76rem;">{{ $f['date'] ? $f['date']->format('H:i') : '' }}</small>
                                </td>
                                <td>
                                    <div class="client-cell">
                                        <strong>{{ $f['client'] }}</strong>
                                        <small><i class="fas fa-envelope me-1" style="font-size: 0.72rem;"></i>{{ $f['email'] }}</small>
                                        @if(!empty($f['telephone']) && $f['telephone'] !== 'N/A')
                                            <small><i class="fas fa-phone me-1" style="font-size: 0.72rem;"></i>{{ $f['telephone'] }}</small>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div style="font-weight: 700; color: var(--gray-800); font-size: 0.88rem;">{{ Str::limit($f['prestation'], 35) }}</div>
                                    <div class="mt-1">
                                        <span class="badge-cat-tag {{ $catClass }}">{{ $f['type'] }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div style="font-weight: 600; font-size: 0.84rem; color: var(--blue);">
                                        <i class="fas fa-credit-card me-1 text-muted"></i>{{ $f['methode_paiement'] }}
                                    </div>
                                    <small style="font-family: monospace; font-size: 0.74rem; color: var(--gray-500);">
                                        {{ Str::limit($f['transaction_id'], 18) }}
                                    </small>
                                </td>
                                <td style="text-align: right; white-space: nowrap;">
                                    <span class="montant-cell" style="font-size: 1.05rem; font-weight: 800;">
                                        {{ number_format($f['montant'], 0, ',', ' ') }} F
                                    </span>
                                    <div style="font-size: 0.72rem; color: var(--gray-400); font-weight: 600;">FCFA TTC</div>
                                </td>
                                <td style="text-align: center; white-space: nowrap;">
                                    @if($f['est_confirme'])
                                        <span class="badge-statut success"><i class="fas fa-check-circle"></i> {{ $f['statut'] }}</span>
                                    @elseif(str_contains(strtolower($f['statut']), 'attente'))
                                        <span class="badge-statut warning"><i class="fas fa-clock"></i> En attente</span>
                                    @else
                                        <span class="badge-statut danger"><i class="fas fa-times-circle"></i> {{ $f['statut'] }}</span>
                                    @endif
                                </td>
                                <td style="text-align: center; white-space: nowrap;">
                                    <button type="button" class="btn-view-invoice" onclick="openInvoiceModal(
                                        '{{ addslashes($f['ref_facture']) }}',
                                        '{{ $f['date'] ? $f['date']->format('d/m/Y H:i') : '' }}',
                                        '{{ addslashes($f['client']) }}',
                                        '{{ addslashes($f['email']) }}',
                                        '{{ addslashes($f['telephone'] ?? 'N/A') }}',
                                        '{{ addslashes($f['prestation']) }}',
                                        '{{ addslashes($f['type']) }}',
                                        '{{ addslashes($f['methode_paiement']) }}',
                                        '{{ addslashes($f['transaction_id']) }}',
                                        '{{ number_format($f['montant'], 0, ',', ' ') }}',
                                        '{{ $f['est_confirme'] ? 'Payé' : ($statusGroup === 'attente' ? 'En attente' : 'Échec') }}'
                                    )">
                                        <i class="fas fa-file-invoice"></i> Voir Facture
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr class="empty-row" id="noFacturesRow">
                                <td colspan="8">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                    Aucune transaction ou facture enregistrée
                                </td>
                            </tr>
                            @endforelse
                            <tr class="empty-row" id="noMatchingFactureRow" style="display: none;">
                                <td colspan="8">
                                    <i class="fas fa-search"></i>
                                    Aucune facture ne correspond à vos critères de recherche
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ============================================
                 CATÉGORIES ACCORDÉON
                 ============================================ -->

            <!-- Autres -->
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
                        <table class="table-moderne">
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
                                <tr class="order-row" data-est-confirme="{{ $p['est_confirme'] ? '1' : '0' }}" data-statut="{{ $p['statut'] }}" style="cursor: pointer;" onclick="showAdminDetails(
                                    '{{ $p['id'] }}',
                                    '{{ addslashes($p['type']) }}',
                                    '{{ addslashes($p['client']) }}',
                                    '{{ addslashes($p['email']) }}',

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
            <!-- ============================================
                 ACTIONS RAPIDES
                 ============================================ -->
            <div class="section-header-dash" style="margin-top: 0;">
                <h2 class="section-title-dash">
                    <i class="fas fa-bolt"></i>
                    Actions Rapides
                </h2>
            </div>

            <div class="actions-grid">
                <a href="{{ route('particuliers.admin.bons.verifier') }}" class="action-card orange">
                    <div class="action-icon"><i class="fas fa-barcode"></i></div>
                    <h5>Vérifier un Bon</h5>
                    <span class="btn-action"><i class="fas fa-search"></i> Vérifier & Lier</span>
                </a>
                <a href="{{ url('/particuliers/bons/create') }}" class="action-card orange">
                    <div class="action-icon"><i class="fas fa-gift"></i></div>
                    <h5>Bons Cadeaux</h5>
                    <span class="btn-action"><i class="fas fa-plus"></i> Créer & Gérer</span>
                </a>
                <a href="https://www.appsheet.com/start/933fa91a-f650-4656-baed-96af45dcc013?platform=desktop#appName=BIBLIFORMATIONPROFESSIONNELLEMPCM-201748984&vss=H4sIAAAAAAAAA6XOsQ7CIBgE4He5mSdgM9qhMa1DjYs4YPmbEFtoClUbwrtL1cZZHTny3X8BV023ysv6An4Mn9eWJnAEgf3UkwAXWFvjB9sKMIFSdq9wsytWeZlVAhHxxBbvyYGH7zj_7zqDVmS8bjQNc9csU8fbpe9ZpWAxiAzd6OW5pefgZGJMWWPr0ZE6pCk_THC5ye69NKqwKlU2snUUHze2GRllAQAA&view=DOMAINES" target="_blank" class="action-card blue">
                    <div class="action-icon"><i class="fas fa-book-open"></i></div>
                    <h5>Bibliothèque Formation</h5>
                    <span class="btn-action"><i class="fas fa-external-link-alt"></i> Accéder</span>
                </a>
                <a href="https://www.appsheet.com/start/510585af-da97-43cb-bbce-5c6727751961?platform=desktop#appName=VENTEETSTATCLIENTSENT-201748984&vss=H4sIAAAAAAAAA63PvwrCMBAG8FcpN-cJspYiIrooLsYhNlcIpknppdUS8u5e_YObix3z5fjddwlGi7d91PUV5Cl9XxucQEJScJg6VCAVlMHHPjgFQsFOt69whRRt8EVROos-UlHxEHa9JSQFGfJZfMyIBDL9T8rlWwqwhnPbWOxnf9bYfVv8PUsc_HIgC2iHqC8On8eykzNnTagHQnPkygtVpbWv7p32ZhsMr2m0I8wPR7EHx8kBAAA=&view=Gestion%20%20Clients%20Entreprises" target="_blank" class="action-card green">
                    <div class="action-icon"><i class="fas fa-chart-line"></i></div>
                    <h5>VentePILOT</h5>
                    <span class="btn-action"><i class="fas fa-external-link-alt"></i> Accéder</span>
                </a>
                <a href="{{ url('/particuliers/formcreate') }}" class="action-card orange">
                    <div class="action-icon"><i class="fas fa-graduation-cap"></i></div>
                    <h5>Créer une Formation</h5>
                    <span class="btn-action"><i class="fas fa-plus"></i> Créer</span>
                </a>
                <a href="{{ url('/particuliers/create') }}" class="action-card blue">
                    <div class="action-icon"><i class="fas fa-book"></i></div>
                    <h5>Créer un Cours</h5>
                    <span class="btn-action"><i class="fas fa-plus"></i> Créer</span>
                </a>
                <a href="{{ url('/particuliers/souscreate') }}" class="action-card green">
                    <div class="action-icon"><i class="fas fa-stream"></i></div>
                    <h5>Sous-Formation</h5>
                    <span class="btn-action"><i class="fas fa-plus"></i> Créer</span>
                </a>
                <a href="{{ url('/particuliers/matieres/create') }}" class="action-card purple">
                    <div class="action-icon"><i class="fas fa-book-open"></i></div>
                    <h5>UE (DCG/DSCG)</h5>
                    <span class="btn-action"><i class="fas fa-plus"></i> Ajouter</span>
                </a>
                <a href="{{ url('/particuliers/lecons/create') }}" class="action-card red">
                    <div class="action-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <h5>Leçon (DCG/DSCG)</h5>
                    <span class="btn-action"><i class="fas fa-plus"></i> Ajouter</span>
                </a>
                <a href="https://tableau-debord-commande.lovable.app" class="action-card yellow">
                    <div class="action-icon"><i class="fas fa-video"></i></div>
                    <h5>Tableau de bord commandes</h5>
                    <span class="btn-action"><i class="fas fa-cog"></i> Gérer</span>
                </a>
                <a href="{{ route('particuliers.admin.videos.index') }}" class="action-card yellow">
                    <div class="action-icon"><i class="fas fa-video"></i></div>
                    <h5>Vidéos DCG/DSCG</h5>
                    <span class="btn-action"><i class="fas fa-cog"></i> Gérer</span>
                </a>
                <a href="{{ route('particuliers.admin.notifications.index') }}" class="action-card teal">
                    <div class="action-icon"><i class="fas fa-bell"></i></div>
                    <h5>Notifications</h5>
                    <span class="btn-action"><i class="fas fa-eye"></i> Voir</span>
                </a>
                <a href="{{ url('/particuliers/voirsoutien') }}" class="action-card cyan">
                    <div class="action-icon"><i class="fas fa-users"></i></div>
                    <h5>Soutien</h5>
                    <span class="btn-action"><i class="fas fa-eye"></i> Voir</span>
                </a>
                <a href="{{ url('/particuliers/voircours') }}" class="action-card pink">
                    <div class="action-icon"><i class="fas fa-eye"></i></div>
                    <h5>Cours</h5>
                    <span class="btn-action"><i class="fas fa-eye"></i> Voir</span>
                </a>
                <a href="{{ url('/particuliers/choisir') }}" class="action-card cyan">
                    <div class="action-icon"><i class="fas fa-mouse-pointer"></i></div>
                    <h5>Choisir</h5>
                    <span class="btn-action"><i class="fas fa-external-link-alt"></i> Ouvrir</span>
                </a>
            </div>

            

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

    const icon = btn.querySelector('i');
    if (icon) {
        icon.style.transform = 'scale(1.2)';
        setTimeout(() => { icon.style.transform = 'scale(1)'; }, 200);
    }

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
            row.offsetHeight;
            row.style.animation = `fadeSlideIn 0.35s ease forwards ${visibleIndex * 0.05}s`;
            visibleIndex++;
        } else {
            row.style.display = 'none';
        }
    });
}
</script>

<!-- Modal Détails Commande Admin -->
<div class="modal fade" id="adminDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: var(--shadow-lg); overflow: hidden;">
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
                        <span id="admin-detail-id" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Type</span>
                        <span id="admin-detail-type" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Client</span>
                        <span id="admin-detail-client" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Email</span>
                        <span id="admin-detail-email" style="font-weight: 700; color: var(--blue);"></span>
                    </div>

                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Détails</span>
                        <span id="admin-detail-details" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Montant</span>
                        <span id="admin-detail-montant" style="font-weight: 800; color: var(--orange); font-size: 1.1rem;"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Statut</span>
                        <span id="admin-detail-statut"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 12px 16px; background: var(--cream); border-radius: 12px;">
                        <span style="font-weight: 600; color: var(--gray-500);">Date</span>
                        <span id="admin-detail-date" style="font-weight: 700; color: var(--blue);"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 1px solid var(--gray-100); padding: 16px 24px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background: var(--cream); color: var(--gray-700); font-weight: 700; border-radius: 12px; padding: 10px 24px; border: 1px solid var(--gray-200);">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Facture Professionnelle Admin -->
<div class="modal fade" id="invoiceDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: var(--shadow-xl); overflow: hidden; background: #F8FAFC;">
            <div class="modal-header d-print-none" style="background: linear-gradient(135deg, var(--blue), var(--blue-light)); color: white; border: none; padding: 18px 26px;">
                <h5 class="modal-title" style="font-weight: 800; font-size: 1.15rem; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-file-invoice-dollar" style="color: var(--orange);"></i> Facture / Reçu Officiel
                </h5>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-sm btn-light" onclick="printCurrentInvoice()" style="font-weight: 700; border-radius: 8px;">
                        <i class="fas fa-print me-1"></i> Imprimer
                    </button>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
            </div>

            <div class="modal-body p-4" id="invoicePrintArea">
                <div class="invoice-paper">
                    <!-- Filigrane statut -->
                    <div id="invoiceStamp" class="invoice-stamp">PAYÉ</div>

                    <!-- En-tête entreprise -->
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 28px; padding-bottom: 20px; border-bottom: 2px solid #E2E8F0;">
                        <div>
                            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 6px;">
                                <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" style="height: 42px;" onerror="this.style.display='none'">
                                <h3 style="font-weight: 900; color: #0A1628; margin: 0; font-size: 1.4rem;">MON PROF CHEZ MOI</h3>
                            </div>
                            <p style="margin: 0; font-size: 0.82rem; color: #64748B; font-weight: 600;">Plateforme éducative, formations professionnelles & soutien scolaire</p>
                            <p style="margin: 0; font-size: 0.8rem; color: #64748B;">Abidjan, Côte d'Ivoire · contact@monprofchezmoi-ci.com</p>
                        </div>
                        <div style="text-align: right;">
                            <span style="font-size: 0.8rem; text-transform: uppercase; font-weight: 800; letter-spacing: 1px; color: #64748B;">Facture N°</span>
                            <h4 id="inv-modal-ref" style="font-weight: 900; color: #FF6B35; margin: 2px 0 6px 0; font-family: monospace; font-size: 1.3rem;">FAC-0000</h4>
                            <div style="font-size: 0.82rem; color: #64748B; font-weight: 600;">Date d'émission : <span id="inv-modal-date" style="color: #0A1628; font-weight: 700;">-</span></div>
                        </div>
                    </div>

                    <!-- Coordonnées Client & Transaction -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 28px;">
                        <div style="background: #F8FAFC; border-radius: 12px; padding: 16px 20px; border: 1px solid #E2E8F0;">
                            <span style="font-size: 0.72rem; text-transform: uppercase; font-weight: 800; letter-spacing: 0.8px; color: #64748B; display: block; margin-bottom: 8px;">Facturé à :</span>
                            <h5 id="inv-modal-client" style="font-weight: 800; color: #0A1628; margin-bottom: 4px;">-</h5>
                            <div style="font-size: 0.84rem; color: #475569;"><i class="fas fa-envelope me-2 text-muted"></i><span id="inv-modal-email">-</span></div>
                            <div style="font-size: 0.84rem; color: #475569; margin-top: 3px;"><i class="fas fa-phone me-2 text-muted"></i><span id="inv-modal-phone">-</span></div>
                        </div>

                        <div style="background: #F8FAFC; border-radius: 12px; padding: 16px 20px; border: 1px solid #E2E8F0;">
                            <span style="font-size: 0.72rem; text-transform: uppercase; font-weight: 800; letter-spacing: 0.8px; color: #64748B; display: block; margin-bottom: 8px;">Règlement & Transaction :</span>
                            <div style="font-size: 0.84rem; color: #475569; margin-bottom: 4px;">
                                <strong>Mode de paiement :</strong> <span id="inv-modal-methode" style="color: #0A1628; font-weight: 700;">-</span>
                            </div>
                            <div style="font-size: 0.84rem; color: #475569; margin-bottom: 4px;">
                                <strong>Réf Transaction :</strong> <span id="inv-modal-tx" style="font-family: monospace; font-weight: 700; color: #0A1628;">-</span>
                            </div>
                            <div style="font-size: 0.84rem; color: #475569;">
                                <strong>Statut :</strong> <span id="inv-modal-statut-badge">-</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tableau Prestation -->
                    <div style="border: 1px solid #E2E8F0; border-radius: 12px; overflow: hidden; margin-bottom: 24px;">
                        <table style="width: 100%; border-collapse: collapse; font-size: 0.9rem;">
                            <thead>
                                <tr style="background: #F1F5F9; color: #475569; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.5px;">
                                    <th style="padding: 12px 18px; text-align: left;">Désignation / Article</th>
                                    <th style="padding: 12px 18px; text-align: center;">Catégorie</th>
                                    <th style="padding: 12px 18px; text-align: center;">Qté</th>
                                    <th style="padding: 12px 18px; text-align: right;">Prix Unitaire</th>
                                    <th style="padding: 12px 18px; text-align: right;">Total TTC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 16px 18px; border-top: 1px solid #E2E8F0; font-weight: 700; color: #0A1628;" id="inv-modal-prestation">-</td>
                                    <td style="padding: 16px 18px; border-top: 1px solid #E2E8F0; text-align: center;" id="inv-modal-type">-</td>
                                    <td style="padding: 16px 18px; border-top: 1px solid #E2E8F0; text-align: center; font-weight: 700;">1</td>
                                    <td style="padding: 16px 18px; border-top: 1px solid #E2E8F0; text-align: right; font-weight: 700;" id="inv-modal-pu">-</td>
                                    <td style="padding: 16px 18px; border-top: 1px solid #E2E8F0; text-align: right; font-weight: 800; color: #FF6B35; font-size: 1.05rem;" id="inv-modal-total">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Totaux & Récap -->
                    <div style="display: flex; justify-content: flex-end; margin-bottom: 24px;">
                        <div style="width: 280px; background: #F8FAFC; border-radius: 12px; padding: 16px 20px; border: 1px solid #E2E8F0;">
                            <div style="display: flex; justify-content: space-between; font-size: 0.85rem; color: #64748B; margin-bottom: 6px;">
                                <span>Sous-total HT :</span>
                                <span id="inv-modal-ht" style="font-weight: 700; color: #0A1628;">-</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; font-size: 0.85rem; color: #64748B; margin-bottom: 8px;">
                                <span>TVA (0% / Exonéré) :</span>
                                <span style="font-weight: 700; color: #0A1628;">0 FCFA</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; font-size: 1.1rem; font-weight: 900; color: #0A1628; padding-top: 8px; border-top: 2px dashed #CBD5E1;">
                                <span>Total Net TTC :</span>
                                <span id="inv-modal-ttc" style="color: #FF6B35;">-</span>
                            </div>
                        </div>
                    </div>

                    <!-- Pied de Facture -->
                    <div style="text-align: center; border-top: 1px solid #E2E8F0; padding-top: 16px; font-size: 0.78rem; color: #94A3B8;">
                        <p style="margin: 0;">Ce document tient lieu de reçu officiel de paiement pour la prestation susmentionnée.</p>
                        <p style="margin: 2px 0 0 0;">MonProfChezMoi CI · Plateforme de Formation & Soutien Scolaire · Tous droits réservés</p>
                    </div>
                </div>
            </div>

            <div class="modal-footer d-print-none" style="background: white; border-top: 1px solid var(--gray-100); padding: 16px 24px;">
                <button type="button" class="btn btn-primary" onclick="printCurrentInvoice()" style="background: var(--blue-accent); font-weight: 700; border-radius: 10px; padding: 10px 20px;">
                    <i class="fas fa-print me-2"></i> Imprimer / Télécharger PDF
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-weight: 700; border-radius: 10px; padding: 10px 20px;">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ============================================
// LOGIQUE FACTURATION
// ============================================
let currentFactureStatus = 'all';

function setFactureStatus(status, btn) {
    currentFactureStatus = status;
    document.querySelectorAll('.btn-facture-status').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    applyFactureFilters();
}

function applyFactureFilters() {
    const searchVal = (document.getElementById('factureSearchInput').value || '').toLowerCase().trim();
    const categoryVal = document.getElementById('factureCategorySelect').value;

    const rows = document.querySelectorAll('.facture-row');
    let visibleCount = 0;
    let visibleTotal = 0;

    rows.forEach(row => {
        const rowCategory = row.dataset.category;
        const rowStatus = row.dataset.statusGroup;
        const rowSearch = row.dataset.search || '';
        const rowMontant = parseFloat(row.dataset.montant) || 0;

        let matchCategory = (categoryVal === 'all' || rowCategory === categoryVal);
        let matchStatus = (currentFactureStatus === 'all' || rowStatus === currentFactureStatus);
        let matchSearch = (!searchVal || rowSearch.includes(searchVal));

        if (matchCategory && matchStatus && matchSearch) {
            row.style.display = '';
            visibleCount++;
            visibleTotal += rowMontant;
        } else {
            row.style.display = 'none';
        }
    });

    const emptyRow = document.getElementById('noMatchingFactureRow');
    if (emptyRow) {
        emptyRow.style.display = (visibleCount === 0 && rows.length > 0) ? '' : 'none';
    }

    const countEl = document.getElementById('factureVisibleCount');
    if (countEl) countEl.textContent = visibleCount;

    const amountEl = document.getElementById('factureVisibleAmount');
    if (amountEl) amountEl.textContent = new Intl.NumberFormat('fr-FR').format(visibleTotal);
}

function openInvoiceModal(ref, date, client, email, phone, prestation, type, methode, txId, montant, statut) {
    document.getElementById('inv-modal-ref').textContent = ref;
    document.getElementById('inv-modal-date').textContent = date || '-';
    document.getElementById('inv-modal-client').textContent = client;
    document.getElementById('inv-modal-email').textContent = email;
    document.getElementById('inv-modal-phone').textContent = phone;
    document.getElementById('inv-modal-methode').textContent = methode;
    document.getElementById('inv-modal-tx').textContent = txId;
    document.getElementById('inv-modal-prestation').textContent = prestation;
    document.getElementById('inv-modal-type').textContent = type;
    document.getElementById('inv-modal-pu').textContent = montant + ' F';
    document.getElementById('inv-modal-total').textContent = montant + ' FCFA';
    document.getElementById('inv-modal-ht').textContent = montant + ' FCFA';
    document.getElementById('inv-modal-ttc').textContent = montant + ' FCFA';

    const stampEl = document.getElementById('invoiceStamp');
    const badgeEl = document.getElementById('inv-modal-statut-badge');
    if (statut === 'Payé') {
        stampEl.textContent = 'ACQUITTÉE';
        stampEl.className = 'invoice-stamp';
        badgeEl.innerHTML = '<span class="badge bg-success" style="font-weight: 700; padding: 6px 12px; border-radius: 8px;"><i class="fas fa-check-circle me-1"></i> Payé / Encaissé</span>';
    } else if (statut === 'En attente') {
        stampEl.textContent = 'EN ATTENTE';
        stampEl.className = 'invoice-stamp stamp-pending';
        badgeEl.innerHTML = '<span class="badge bg-warning text-dark" style="font-weight: 700; padding: 6px 12px; border-radius: 8px;"><i class="fas fa-clock me-1"></i> En attente</span>';
    } else {
        stampEl.textContent = 'ANNULÉE';
        stampEl.className = 'invoice-stamp stamp-failed';
        badgeEl.innerHTML = '<span class="badge bg-danger" style="font-weight: 700; padding: 6px 12px; border-radius: 8px;"><i class="fas fa-times-circle me-1"></i> Échec / Non réglé</span>';
    }

    const modal = new bootstrap.Modal(document.getElementById('invoiceDetailModal'));
    modal.show();
}

function printCurrentInvoice() {
    window.print();
}

function printFacturesRecap() {
    window.print();
}

function exportFacturesCSV() {
    const rows = document.querySelectorAll('.facture-row');
    let csv = [];
    csv.push(['Ref Facture', 'Date', 'Client', 'Email', 'Telephone', 'Prestation', 'Type', 'Mode Paiement', 'ID Transaction', 'Montant (FCFA)', 'Statut'].join(';'));

    rows.forEach(r => {
        if (r.style.display !== 'none') {
            const cols = r.querySelectorAll('td');
            if (cols.length >= 7) {
                const ref = cols[0].innerText.trim();
                const date = cols[1].innerText.replace(/\n/g, ' ').trim();
                const clientLines = cols[2].innerText.split('\n').map(s => s.trim()).filter(Boolean);
                const client = clientLines[0] || '';
                const email = clientLines[1] || '';
                const phone = clientLines[2] || '';
                const prestation = cols[3].innerText.replace(/\n/g, ' ').trim();
                const cat = r.dataset.category || '';
                const modeTx = cols[4].innerText.replace(/\n/g, ' ').trim();
                const txId = (cols[4].querySelector('small')?.innerText || '').trim();
                const montant = r.dataset.montant || '0';
                const statut = cols[6].innerText.trim();

                csv.push([
                    `"${ref.replace(/"/g, '""')}"`,
                    `"${date.replace(/"/g, '""')}"`,
                    `"${client.replace(/"/g, '""')}"`,
                    `"${email.replace(/"/g, '""')}"`,
                    `"${phone.replace(/"/g, '""')}"`,
                    `"${prestation.replace(/"/g, '""')}"`,
                    `"${cat.replace(/"/g, '""')}"`,
                    `"${modeTx.replace(/"/g, '""')}"`,
                    `"${txId.replace(/"/g, '""')}"`,
                    montant,
                    `"${statut.replace(/"/g, '""')}"`
                ].join(';'));
            }
        }
    });

    const csvContent = '\uFEFF' + csv.join('\r\n');
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute('download', 'facturation_monprofchezmoi_' + new Date().toISOString().slice(0, 10) + '.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function showAdminDetails(id, type, client, email,  details, montant, statut, date) {
    document.getElementById('admin-detail-id').textContent = id;
    document.getElementById('admin-detail-type').textContent = type;
    document.getElementById('admin-detail-client').textContent = client;
    document.getElementById('admin-detail-email').textContent = email;

    document.getElementById('admin-detail-details').textContent = details;
    document.getElementById('admin-detail-montant').textContent = montant + ' F';

    const statutEl = document.getElementById('admin-detail-statut');
    if (statut === 'Confirmé') {
        statutEl.innerHTML = '<span class="badge-statut success"><i class="fas fa-check-circle"></i> Confirmé</span>';
    } else if (statut === 'En attente') {
        statutEl.innerHTML = '<span class="badge-statut warning"><i class="fas fa-clock"></i> En attente</span>';
    } else {
        statutEl.innerHTML = '<span class="badge-statut danger"><i class="fas fa-times-circle"></i> Échec</span>';
    }

    document.getElementById('admin-detail-date').textContent = date;

    var modal = new bootstrap.Modal(document.getElementById('adminDetailsModal'));
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
</script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
