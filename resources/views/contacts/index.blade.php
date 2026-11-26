<style>
:root {
  --color-primary: #6366f1;
  --color-success: #10b981;
  --color-warning: #f59e0b;
  --color-danger: #ef4444;
  --color-info: #3b82f6;
  
  --color-purple: #8b5cf6;
  --color-orange: #f97316;
  --color-green: #10b981;
  --color-blue: #3b82f6;
  
  --bg-primary: #ffffff;
  --bg-secondary: #f9fafb;
  --bg-tertiary: #f3f4f6;
  
  --text-primary: #111827;
  --text-secondary: #6b7280;
  --text-tertiary: #9ca3af;
  
  --border-color: #e5e7eb;
  --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
  --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
  --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
  
  --radius-sm: 8px;
  --radius-md: 12px;
  --radius-lg: 16px;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
  background: var(--bg-secondary);
  color: var(--text-primary);
  line-height: 1.6;
}

.dashboard-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 24px;
}

/* Header Styles */
.dashboard-main-header {
  background: var(--bg-primary);
  border-radius: var(--radius-lg);
  padding: 24px;
  margin-bottom: 24px;
  box-shadow: var(--shadow-sm);
}

.header-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 24px;
}

.branding {
  flex: 1;
}

.brand-title {
  font-size: 28px;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 4px;
}

.brand-subtitle {
  font-size: 14px;
  color: var(--text-secondary);
  font-weight: 400;
}

.header-right {
  display: flex;
  align-items: center;
  gap: 12px;
}

.search-wrapper {
  position: relative;
  width: 320px;
}

.search-icon {
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--text-tertiary);
}

.search-input {
  width: 100%;
  padding: 10px 12px 10px 40px;
  border: 1px solid var(--border-color);
  border-radius: var(--radius-sm);
  font-size: 14px;
  transition: all 0.2s;
  background: var(--bg-secondary);
}

.search-input:focus {
  outline: none;
  border-color: var(--color-primary);
  box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
}

.notification-btn,
.settings-btn {
  position: relative;
  width: 40px;
  height: 40px;
  border: none;
  background: var(--bg-secondary);
  border-radius: var(--radius-sm);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s;
  color: var(--text-secondary);
}

.notification-btn:hover,
.settings-btn:hover {
  background: var(--bg-tertiary);
  color: var(--text-primary);
}

.notification-badge {
  position: absolute;
  top: -4px;
  right: -4px;
  background: var(--color-danger);
  color: white;
  font-size: 11px;
  font-weight: 600;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Stats Grid */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  margin-bottom: 24px;
}

.stat-card {
  background: var(--bg-primary);
  border-radius: var(--radius-md);
  padding: 24px;
  display: flex;
  gap: 16px;
  box-shadow: var(--shadow-sm);
  transition: all 0.3s;
  border: 1px solid var(--border-color);
}

.stat-card:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
}

.stat-icon-wrapper {
  width: 56px;
  height: 56px;
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.stat-icon-wrapper.purple {
  background: linear-gradient(135deg, #8b5cf6 0%, #6366f1 100%);
  color: white;
}

.stat-icon-wrapper.orange {
  background: linear-gradient(135deg, #f97316 0%, #fb923c 100%);
  color: white;
}

.stat-icon-wrapper.green {
  background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
  color: white;
}

.stat-icon-wrapper.blue {
  background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
  color: white;
}

.stat-content {
  flex: 1;
}

.stat-label {
  font-size: 13px;
  color: var(--text-secondary);
  margin-bottom: 4px;
  font-weight: 500;
}

.stat-value {
  font-size: 32px;
  font-weight: 700;
  color: var(--text-primary);
  line-height: 1.2;
  margin-bottom: 4px;
}

.stat-trend {
  font-size: 12px;
  font-weight: 600;
  padding: 4px 8px;
  border-radius: 4px;
  display: inline-block;
}

.stat-trend.positive {
  color: var(--color-success);
  background: rgba(16, 185, 129, 0.1);
}

/* Filters Section */
.filters-section {
  background: var(--bg-primary);
  border-radius: var(--radius-md);
  padding: 20px 24px;
  margin-bottom: 24px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: var(--shadow-sm);
  flex-wrap: wrap;
  gap: 16px;
}

.filter-tabs-wrapper {
  display: flex;
  align-items: center;
  gap: 16px;
  flex-wrap: wrap;
}

.filter-label {
  font-size: 14px;
  color: var(--text-secondary);
  font-weight: 500;
}

.filter-tabs {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.filter-tab {
  padding: 8px 16px;
  border-radius: var(--radius-sm);
  font-size: 14px;
  font-weight: 500;
  color: var(--text-secondary);
  text-decoration: none;
  transition: all 0.2s;
  border: 1px solid transparent;
}

.filter-tab:hover {
  background: var(--bg-secondary);
  color: var(--text-primary);
}

.filter-tab.active {
  background: var(--color-primary);
  color: white;
  border-color: var(--color-primary);
}

.result-count {
  font-size: 13px;
  color: var(--text-secondary);
  font-weight: 500;
}

/* Alert */
.alert {
  padding: 16px 20px;
  border-radius: var(--radius-md);
  margin-bottom: 24px;
  display: flex;
  align-items: center;
  gap: 12px;
  animation: slideIn 0.3s ease-out;
}

.alert-success {
  background: rgba(16, 185, 129, 0.1);
  color: var(--color-success);
  border: 1px solid rgba(16, 185, 129, 0.2);
}

@keyframes slideIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* ========== LISTE HORIZONTALE (NOUVEAU DESIGN) ========== */
.commands-list {
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
  margin-bottom: 24px;
}

.command-row {
  background: var(--bg-primary);
  border: 1px solid var(--border-color);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-sm);
  transition: all 0.3s;
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  min-height: 160px;
}

.command-row::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 4px;
  transition: all 0.3s;
}

.command-row:hover {
  transform: translateX(4px);
  box-shadow: var(--shadow-lg);
  border-color: var(--color-primary);
}

.command-row[data-status="pending"]::before { background: var(--color-warning); }
.command-row[data-status="confirmed"]::before { background: var(--color-success); }
.command-row[data-status="sold"]::before { background: var(--color-success); }
.command-row[data-status="cancelled"]::before { background: var(--color-danger); }

/* Badge status en haut à droite */
.status-top-right {
  position: absolute;
  top: 1.25rem;
  right: 1.5rem;
  z-index: 10;
}

.status-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 8px 16px;
  font-size: 13px;
  font-weight: 600;
  border-radius: 999px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  white-space: nowrap;
}

.status-badge.status-pending {
  background: rgba(249, 115, 22, 0.15);
  color: var(--color-warning);
}

.status-badge.status-confirmed {
  background: rgba(16, 185, 129, 0.15);
  color: var(--color-success);
}

.status-badge.status-sold {
  background: rgba(16, 185, 129, 0.15);
  color: var(--color-success);
}

.status-badge.status-cancelled {
  background: rgba(239, 68, 68, 0.15);
  color: var(--color-danger);
}

/* Ligne principale */
.row-main {
  display: grid;
  grid-template-columns: auto 1fr auto auto;
  align-items: center;
  gap: 2rem;
  padding: 2rem 1.5rem 1.5rem 1.5rem;
  position: relative;
}

/* Section Client */
.client-section {
  display: flex;
  align-items: center;
  gap: 1rem;
  min-width: 220px;
}

.client-avatar {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-purple) 100%);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  font-weight: 700;
  flex-shrink: 0;
}

.client-info h3 {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 0.25rem;
  white-space: nowrap;
  color: var(--text-primary);
}

.client-meta {
  font-size: 0.875rem;
  color: var(--text-secondary);
}

/* Section Infos Cours */
.course-info {
  display: flex;
  gap: 1.5rem;
  align-items: center;
  flex-wrap: wrap;
}

.info-pill {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.6rem 1rem;
  background: var(--bg-secondary);
  border-radius: 999px;
  font-size: 0.9rem;
}

.info-pill svg {
  width: 1rem;
  height: 1rem;
  color: var(--color-primary);
}

.info-pill .label {
  color: var(--text-secondary);
  font-size: 0.75rem;
}

.info-pill .value {
  font-weight: 600;
  color: var(--text-primary);
}

/* Section Contact */
.contact-section {
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
  font-size: 0.9rem;
  min-width: 200px;
}

.contact-link {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--text-secondary);
  text-decoration: none;
  transition: all 0.2s;
  white-space: nowrap;
}

.contact-link:hover {
  color: var(--color-primary);
}

.contact-link svg {
  width: 1rem;
  height: 1rem;
  color: var(--text-tertiary);
}

/* Section Actions */
.actions-section {
  display: flex;
  gap: 0.5rem;
  flex-wrap: nowrap;
  margin-left: 1rem;
}

.action-btn {
  width: 44px;
  height: 44px;
  border: none;
  border-radius: var(--radius-sm);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s;
  background: transparent;
  flex-shrink: 0;
}

.action-btn:hover {
  transform: scale(1.1);
}

.action-btn svg {
  width: 1.25rem;
  height: 1.25rem;
}

.btn-sell {
  color: var(--color-success);
  background: rgba(16, 185, 129, 0.1);
}

.btn-sell:hover {
  background: var(--color-success);
  color: white;
}

.btn-cancel {
  color: var(--color-warning);
  background: rgba(245, 158, 11, 0.1);
}

.btn-cancel:hover {
  background: var(--color-warning);
  color: white;
}

.btn-delete {
  color: var(--text-secondary);
  background: var(--bg-secondary);
}

.btn-delete:hover {
  background: var(--color-danger);
  color: white;
}

.btn-comment {
  color: var(--color-primary);
  background: rgba(99, 102, 241, 0.1);
}

.btn-comment:hover {
  background: var(--color-primary);
  color: white;
}

/* Détails expansibles */
.row-details {
  padding: 0 1.5rem 1.5rem 1.5rem;
  display: none;
  border-top: 1px solid var(--border-color);
}

.row-details.expanded {
  display: block;
  animation: slideDown 0.3s ease;
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.details-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1rem;
  padding-top: 1.25rem;
}

.detail-box {
  background: var(--bg-secondary);
  padding: 1.25rem;
  border-radius: var(--radius-md);
}

.detail-box h4 {
  font-size: 0.75rem;
  color: var(--text-secondary);
  margin-bottom: 0.75rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.comment-text {
  font-size: 0.95rem;
  color: var(--text-primary);
  line-height: 1.5;
}

/* Comment Form */
.comment-form-row {
  display: flex;
  gap: 0.75rem;
  margin-top: 0.5rem;
}

.comment-input-row {
  flex: 1;
  padding: 0.75rem 1rem;
  border: 1px solid var(--border-color);
  border-radius: var(--radius-sm);
  font-size: 0.9rem;
  background: var(--bg-primary);
  transition: all 0.2s;
}

.comment-input-row:focus {
  outline: none;
  border-color: var(--color-primary);
  box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
}

.btn-send-small {
  padding: 0.75rem 1.25rem;
  background: var(--color-primary);
  color: white;
  border: none;
  border-radius: var(--radius-sm);
  cursor: pointer;
  font-size: 0.9rem;
  font-weight: 600;
  transition: all 0.2s;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.btn-send-small:hover {
  background: var(--color-primary-dark);
}

/* Empty State */
.empty-state {
  text-align: center;
  padding: 60px 20px;
  background: var(--bg-primary);
  border-radius: var(--radius-lg);
  border: 2px dashed var(--border-color);
  grid-column: 1 / -1;
}

.empty-state svg {
  margin-bottom: 16px;
  color: var(--text-tertiary);
}

.empty-state h3 {
  font-size: 18px;
  color: var(--text-primary);
  margin-bottom: 8px;
}

.empty-state p {
  font-size: 14px;
  color: var(--text-secondary);
}

/* Back Link */
.back-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 20px;
  background: var(--bg-primary);
  color: var(--text-primary);
  text-decoration: none;
  border-radius: var(--radius-sm);
  font-size: 14px;
  font-weight: 600;
  transition: all 0.2s;
  border: 1px solid var(--border-color);
}

.back-link:hover {
  background: var(--bg-secondary);
  transform: translateX(-4px);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1200px) {
  .row-main {
    grid-template-columns: auto 1fr auto;
    gap: 1.5rem;
  }
  
  .client-section { grid-column: 1; }
  .course-info { grid-column: 2; }
  .contact-section { 
    grid-column: 1; 
    grid-row: 2;
    flex-direction: row;
    gap: 1.5rem;
  }
  .actions-section {
    grid-column: 3;
    grid-row: 1 / 3;
    flex-direction: column;
    margin-left: 0;
  }
}

@media (max-width: 768px) {
  .dashboard-container {
    padding: 16px;
  }
  
  .header-top {
    flex-direction: column;
    align-items: stretch;
  }
  
  .search-wrapper {
    width: 100%;
  }
  
  .stats-grid {
    grid-template-columns: 1fr;
  }
  
  .filters-section {
    flex-direction: column;
    align-items: stretch;
  }
  
  .command-row {
    min-height: auto;
  }
  
  .row-main {
    grid-template-columns: 1fr;
    gap: 1.25rem;
    padding: 3.5rem 1.25rem 1.25rem 1.25rem;
  }

  .course-info {
    flex-direction: column;
    gap: 0.75rem;
    align-items: flex-start;
  }

  .actions-section {
    flex-direction: row;
    justify-content: flex-start;
    width: 100%;
    border-top: 1px solid var(--border-color);
    padding-top: 1rem;
    margin-left: 0;
  }
  
  .contact-section {
    flex-direction: row;
    gap: 1.5rem;
    flex-wrap: wrap;
  }

  .status-top-right {
    top: 1rem;
    right: 1rem;
  }

  .status-badge {
    font-size: 0.8rem;
    padding: 0.5rem 1rem;
  }
}

@media (max-width: 480px) {
  .brand-title {
    font-size: 22px;
  }
  
  .stat-value {
    font-size: 28px;
  }
  
  .filter-tabs {
    width: 100%;
    flex-direction: column;
  }
  
  .filter-tab {
    width: 100%;
    text-align: center;
  }
}
</style>

<div class="dashboard-container">
  <!-- Header Section -->
  <header class="dashboard-main-header">
    <div class="header-top">
      <div class="branding">
        <h1 class="brand-title">MonProf Chez Moi</h1>
        <p class="brand-subtitle">Dashboard commandes formation Particuliers</p>
      </div>
      <div class="header-right">
        <div class="search-wrapper">
          <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
          </svg>
          <input type="text" class="search-input" placeholder="Rechercher une commande...">
        </div>
        <button class="notification-btn">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
          <span class="notification-badge">1</span>
        </button>
        <button class="settings-btn">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="3"></circle>
            <path d="M12 1v6m0 6v6"></path>
            <path d="m4.93 4.93 4.24 4.24m5.66 5.66 4.24 4.24"></path>
            <path d="M1 12h6m6 0h6"></path>
            <path d="m4.93 19.07 4.24-4.24m5.66-5.66 4.24-4.24"></path>
          </svg>
        </button>
      </div>
    </div>
  </header>

  <!-- Stats Cards -->
  <div class="stats-grid">
    <div class="stat-card stat-total">
      <div class="stat-icon-wrapper purple">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="9" cy="21" r="1"></circle>
          <circle cx="20" cy="21" r="1"></circle>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
      </div>
      <div class="stat-content">
        <p class="stat-label">Total des commandes</p>
        <h2 class="stat-value">{{ $countEnCours + $countTerminees + $countVendues + $countAnnulees }}</h2>
        <span class="stat-trend positive">+12% ce mois</span>
      </div>
    </div>

    <div class="stat-card stat-pending">
      <div class="stat-icon-wrapper orange">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="10"></circle>
          <polyline points="12 6 12 12 16 14"></polyline>
        </svg>
      </div>
      <div class="stat-content">
        <p class="stat-label">En attente</p>
        <h2 class="stat-value">{{ $countEnCours }}</h2>
      </div>
    </div>

    <div class="stat-card stat-confirmed">
      <div class="stat-icon-wrapper green">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
      </div>
      <div class="stat-content">
        <p class="stat-label">Vendues</p>
        <h2 class="stat-value">{{ $countVendues }}</h2>
        <span class="stat-trend positive">+6% ce mois</span>
      </div>
    </div>

    <div class="stat-card stat-cancelled">
      <div class="stat-icon-wrapper blue">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="10"></circle>
          <line x1="15" y1="9" x2="9" y2="15"></line>
          <line x1="9" y1="9" x2="15" y2="15"></line>
        </svg>
      </div>
      <div class="stat-content">
        <p class="stat-label">Annulées</p>
        <h2 class="stat-value">{{ $countAnnulees }}</h2>
      </div>
    </div>
  </div>

  <!-- Filters Section -->
  <div class="filters-section">
    <div class="filter-tabs-wrapper">
      <div class="filter-label">Filtres :</div>
      <div class="filter-tabs">
        <a href="{{ route('particuliers.voircontact.consulter', ['filter' => 'all']) }}" 
           class="filter-tab {{ !isset($filter) || $filter === 'all' ? 'active' : '' }}">
          Tous les statuts
        </a>
        <a href="{{ route('particuliers.voircontact.consulter', ['filter' => 'en_cours']) }}" 
           class="filter-tab {{ $filter === 'en_cours' ? 'active' : '' }}">
          En cours ({{ $countEnCours }})
        </a>
        <a href="{{ route('particuliers.voircontact.consulter', ['filter' => 'vendue']) }}" 
           class="filter-tab {{ $filter === 'vendue' ? 'active' : '' }}">
          Vendues ({{ $countVendues }})
        </a>
        <a href="{{ route('particuliers.voircontact.consulter', ['filter' => 'annulée']) }}" 
           class="filter-tab {{ $filter === 'annulée' ? 'active' : '' }}">
          Annulées ({{ $countAnnulees }})
        </a>
      </div>
    </div>
    
    <div class="view-actions">
      <span class="result-count">{{ $commandes->count() }} commande(s) au total</span>
    </div>
  </div>

  <!-- Success Message -->
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <polyline points="20 6 9 17 4 12"></polyline>
    </svg>
    {{ $message }}
  </div>
  @endif

  <!-- Commands List (Horizontal Layout) -->
  <div class="commands-list" id="commandsList">
    @forelse($commandes as $contacts)
      @php
        $status = 'pending';
        if ($contacts->etat === 'terminée') {
          $status = 'confirmed';
        } elseif ($contacts->etat === 'vendue') {
          $status = 'sold';
        } elseif ($contacts->etat === 'annulée') {
          $status = 'cancelled';
        }
      @endphp
      
      <div class="command-row" data-status="{{ $status }}">
        
        <!-- BADGE STATUS EN HAUT À DROITE -->
        <div class="status-top-right">
          @if($contacts->etat === 'terminée')
            <span class="status-badge status-confirmed">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
              Confirmée
            </span>
          @elseif($contacts->etat === 'vendue')
            <span class="status-badge status-sold">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="1" x2="12" y2="23"></line>
                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
              </svg>
              Vendue
            </span>
          @elseif($contacts->etat === 'annulée')
            <span class="status-badge status-cancelled">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
              </svg>
              Annulée
            </span>
          @else
            <span class="status-badge status-pending">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
              </svg>
              En attente
            </span>
          @endif
        </div>

        <!-- LIGNE PRINCIPALE -->
        <div class="row-main">
          <!-- SECTION CLIENT -->
          <div class="client-section">
            <div class="client-avatar">{{ strtoupper(substr($contacts->nom, 0, 1)) }}</div>
            <div class="client-info">
              <h3>{{ $contacts->nom }}</h3>
              <div class="client-meta">{{ $contacts->ville }} • {{ $contacts->created_at->format('d M Y') }}</div>
               <a href="tel:{{ $contacts->numero }}" class="contact-link">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
              </svg>
              {{ $contacts->numero }}
            </a>
            </div>
          </div>

          <!-- SECTION INFOS COURS -->
          <div class="course-info">
            <div class="info-pill">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
              </svg>
              <span class="label">Formation</span>
              <span class="value">{{ Str::limit($contacts->part, 25) }}</span>
            </div>
          </div>
           
              <span class="value">{{ Str::limit($contacts->prix) }}</span>
            

          <!-- SECTION CONTACT -->
          <div class="contact-section">
           
            <a href="mailto:{{ $contacts->email }}" class="contact-link">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
              {{ Str::limit($contacts->email, 22) }}
            </a>
          </div>

          <!-- SECTION ACTIONS -->
          <div class="actions-section">
            @if($contacts->etat !== 'vendue' && $contacts->etat !== 'annulée')
              <form action="{{ route('particuliers.vendreCommande', $contacts->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="action-btn btn-sell" title="Marquer comme vendu">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                  </svg>
                </button>
              </form>
              
              <form action="{{ route('particuliers.annulerCommande', $contacts->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="action-btn btn-cancel" title="Annuler">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                  </svg>
                </button>
              </form>
            @endif
            <button type="button" class="action-btn btn-comment" onclick="toggleDetails(this)" title="Voir détails / Commentaire">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
              </svg>
            </button>
            <form action="{{ route('particuliers.contacts.destroy', $contacts->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Confirmer la suppression ?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="action-btn btn-delete" title="Supprimer">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="3 6 5 6 21 6"></polyline>
                  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg>
              </button>
            </form>

            
          </div>
        </div>

        <!-- DÉTAILS EXPANSIBLES -->
        <div class="row-details">
          <div class="details-grid">
            @if($contacts->commentaire)
            <div class="detail-box">
              <h4>Commentaire existant</h4>
              <p class="comment-text">{{ $contacts->commentaire }}</p>
            </div>
            @endif
            
            <div class="detail-box" style="grid-column: 1 / -1;">
              <h4>Ajouter un commentaire</h4>
              <form action="{{ route('particuliers.ajouterCommentaire', $contacts->id) }}" method="POST" class="comment-form-row">
                @csrf
                <input type="text" name="commentaire" placeholder="Écrire un commentaire..." class="comment-input-row" required>
                <button type="submit" class="btn-send-small">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                  </svg>
                  Envoyer
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="empty-state">
        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <circle cx="12" cy="12" r="10"></circle>
          <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
          <line x1="9" y1="9" x2="9.01" y2="9"></line>
          <line x1="15" y1="9" x2="15.01" y2="9"></line>
        </svg>
        <h3>Aucune commande trouvée</h3>
        <p>Il n'y a aucune commande correspondant à vos critères</p>
      </div>
    @endforelse
  </div>

  <a href="{{ url('/particuliers/voircontact') }}" class="back-link">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <line x1="19" y1="12" x2="5" y2="12"></line>
      <polyline points="12 19 5 12 12 5"></polyline>
    </svg>
    Retour
  </a>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
      searchInput.addEventListener('input', debounce(function(e) {
        const searchTerm = e.target.value.toLowerCase();
        filterRows(searchTerm);
      }, 300));
    }

    // Filter rows based on search
    function filterRows(searchTerm) {
      const rows = document.querySelectorAll('.command-row');
      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
          row.style.display = 'flex';
          row.style.animation = 'fadeIn 0.3s ease-out';
        } else {
          row.style.display = 'none';
        }
      });
    }

    // Debounce function
    function debounce(func, wait) {
      let timeout;
      return function executedFunction(...args) {
        const later = () => {
          clearTimeout(timeout);
          func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
      };
    }

    // Toggle details
    window.toggleDetails = function(btn) {
      const row = btn.closest('.command-row');
      const details = row.querySelector('.row-details');
      details.classList.toggle('expanded');
      
      if (details.classList.contains('expanded')) {
        btn.style.background = 'var(--color-primary)';
        btn.style.color = 'white';
      } else {
        btn.style.background = 'rgba(99, 102, 241, 0.1)';
        btn.style.color = 'var(--color-primary)';
      }
    };

    // Animate stats
    animateStats();

    function animateStats() {
      const statValues = document.querySelectorAll('.stat-value');
      statValues.forEach(stat => {
        const target = parseInt(stat.textContent);
        if (!isNaN(target)) {
          animateValue(stat, 0, target, 1000);
        }
      });
    }

    function animateValue(element, start, end, duration) {
      const range = end - start;
      const increment = range / (duration / 16);
      let current = start;
      
      const timer = setInterval(() => {
        current += increment;
        if (current >= end) {
          element.textContent = end;
          clearInterval(timer);
        } else {
          element.textContent = Math.floor(current);
        }
      }, 16);
    }

    // Auto-hide alerts
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
      setTimeout(() => {
        alert.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => {
          alert.remove();
        }, 300);
      }, 5000);
    });
  });

  // Add CSS animations
  const style = document.createElement('style');
  style.textContent = `
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }
    @keyframes slideOut {
      from { opacity: 1; transform: translateY(0); }
      to { opacity: 0; transform: translateY(-10px); }
    }
  `;
  document.head.appendChild(style);
</script>