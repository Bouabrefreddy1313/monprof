<!-- resources/views/dashboardadmin.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
       :root {
    --primary-color: #2563eb;
    --secondary-color: #3b82f6;
    --background-color: #f3f4f6;
    --sidebar-color: #ffffff;
    --text-primary: #1f2937;
    --text-secondary: #6b7280;
    --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

body {
    background-color: var(--background-color);
    color: var(--text-primary);
}

.dashboard {
    display: flex;
    min-height: 100vh;
}

/* Sidebar Styles */
.sidebar {
    width: 280px;
    background-color: var(--sidebar-color);
    padding: 2rem;
    box-shadow: var(--card-shadow);
}

.user-profile {
    text-align: center;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 2rem;
}

.profile-image {
    font-size: 4rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.user-info h3 {
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.user-info p {
    color: var(--text-secondary);
    font-size: 0.875rem;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.sidebar-nav a {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    color: var(--text-primary);
    text-decoration: none;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.sidebar-nav a i {
    margin-right: 0.75rem;
}

.sidebar-nav a:hover,
.sidebar-nav a.active {
    background-color: var(--primary-color);
    color: white;
}

/* Main Content Styles */
.main-content {
    flex: 1;
    padding: 2rem;
}

.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.dashboard-header h1 {
    font-size: 1.875rem;
    font-weight: bold;
    color: var(--text-primary);
}

.header-actions {
    color: var(--text-secondary);
    font-size: 0.875rem;
}

/* Cards Grid */
.cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.dashboard-card {
    background-color: white;
    border-radius: 1rem;
    padding: 1.5rem;
    box-shadow: var(--card-shadow);
    transition: transform 0.3s ease;
}

.dashboard-card:hover {
    transform: translateY(-5px);
}

.card-content {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
}

.card-icon {
    width: 48px;
    height: 48px;
    background-color: var(--primary-color);
    color: white;
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-right: 1rem;
}

.card-info h3 {
    color: var(--text-primary);
    margin-bottom: 0.25rem;
}

.card-info p {
    color: var(--text-secondary);
    font-size: 0.875rem;
}

.card-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    padding: 0.75rem;
    background-color: var(--primary-color);
    color: white;
    text-decoration: none;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: background-color 0.3s ease;
}

.card-button:hover {
    background-color: var(--secondary-color);
}

/* Responsive Design */
@media (max-width: 768px) {
    .dashboard {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        padding: 1rem;
    }

    .main-content {
        padding: 1rem;
    }

    .cards-grid {
        grid-template-columns: 1fr;
    }
}
    </style>
</head>
<div class="dashboard">
        <!-- Sidebar with user profile -->
        <aside class="sidebar">
            <div class="user-profile">
                <div class="profile-image">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="user-info">
                    <h3></h3>
                    <p>Administrateur</p>
                </div>
            </div>
            <nav class="sidebar-nav">
                <a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a>
                <a href="#"><i class="fas fa-cog"></i> Paramètres</a>
                <form id="logout-form" action="{{ route('particuliers.comm.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Déconnexion
</a>            </nav>
        </aside>

        <!-- Main content -->
        <main class="main-content">
            <header class="dashboard-header">
                <h1>Tableau de Bord Administrateur</h1>
                <div class="header-actions">
                    <span class="date">{{ date('d M Y') }}</span>
                </div>
            </header>

            <div class="cards-grid">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-info">
                            <h3>Soutien Scolaire</h3>
                            <p>Gérer les soutiens scolaires</p>
                        </div>
                    </div>
                    <a href="{{ url('/particuliers/voirsoutien') }}" class="card-button">
                        Voir <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                 <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-info">
                            <h3>DCG & DSCG</h3>
                            <p>Gérer les cours dcg & dscg</p>
                        </div>
                    </div>
                    <a href="{{ url('/particuliers/payments/index') }}" class="card-button">
                        Voir <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="card-info">
                            <h3>Extrascolaire</h3>
                            <p>Gérer les activités extrascolaires</p>
                        </div>
                    </div>
                    <a href="{{ url('/particuliers/voircontact') }}" class="card-button">
                        Voir <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-info">
                                <h3>Formations Particuliers</h3>
                            <p>Gérer les formations individuelles</p>
                        </div>
                    </div>
                    <a href="{{ url('/particuliers/voircours') }}" class="card-button">
                        Voir <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-info">
                                <h3>Formations en groupe</h3>
                            <p>Gérer les formations en groupen</p>
                        </div>
                    </div>
                    <a href="https://tableau-debord-commande.lovable.app" class="card-button">
                        Voir <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-info">
                                <h3>Bons Cadeaux</h3>
                            <p>Gérer les bons cadeaux</p>
                        </div>
                    </div>
                    <a href="{{ url('/particuliers/admin/orders') }}" class="card-button">
                        Voir <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fas fa-mouse-pointer"></i>
                        </div>
                        <div class="card-info">
                            <h3>Choisir</h3>
                            <p>Accéder à la page de sélection</p>
                        </div>
                    </div>
                    <a href="{{ url('/particuliers/choisir') }}" class="card-button">
                        Ouvrir <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>




            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
