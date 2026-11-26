{{-- Styles et scripts responsive communs (une seule fois par page) --}}
@include('partials.responsive-assets')

<!-- Scroll Progress -->
<div class="scroll-progress" id="scrollProgress"></div>



<!-- ============================================
     TOPBAR
     ============================================ -->
<div class="topbar-minimal">
    <div class="container">
        <div class="topbar-info-minimal">
            <span class="topbar-addr"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Riviera 4 Synacassi 1, Abidjan</span>
            <span class="topbar-phone"><i class="fas fa-phone-alt" aria-hidden="true"></i> <a href="tel:+2250153751544">+225 01 53 75 15 44</a></span>
            <span class="topbar-mail"><i class="fas fa-envelope" aria-hidden="true"></i> <a href="mailto:info@monprofchezmoi-ci.com">info@monprofchezmoi-ci.com</a></span>
        </div>
        <div class="topbar-social-minimal">
            <a href="https://lc.cx/bI7TWa" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
            <a href="https://lc.cx/bRCp37" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
            <a href="https://lc.cx/apXwPN" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
            <a href="https://youtube.com/@Monprofchezmoi" target="_blank" rel="noopener" aria-label="YouTube"><i class="fab fa-youtube" aria-hidden="true"></i></a>
        </div>
    </div>
</div>

<!-- ============================================
     NAVBAR
     ============================================ -->
<nav class="navbar navbar-expand-lg navbar-moderne" aria-label="Navigation principale">
    <div class="container">
        <a href="{{ url('/particuliers') }}" class="navbar-brand">
            <img src="{{ asset('asset/img/logo.png') }}" alt="Monprofchezmoi - Accueil" width="45" height="45">
        </a>

        <button class="navbar-toggler navbar-toggler-premium" type="button" data-bs-toggle="collapse" data-bs-target="#navbarModerne" aria-controls="navbarModerne" aria-expanded="false" aria-label="Ouvrir le menu">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarModerne">
            <ul class="nav-menu-moderne ms-auto">
                <li class="nav-item-moderne"><a href="{{ url('/particuliers') }}" class="nav-link-moderne">Accueil</a></li>

                <li class="nav-item-moderne">
                    <a href="#" class="nav-link-moderne">Primaire <i class="fas fa-chevron-down chevron"></i></a>
                    <div class="mega-menu-moderne">
                        <div class="mega-header-moderne">
                            <h4><i class="fas fa-child"></i> Primaire</h4>
                            <p>De la maternelle au CM2</p>
                        </div>
                        <div class="mega-body-moderne">
                            <div>
                                <div class="mega-col-title">Nos cours</div>
                                <a href="{{ url('/particuliers/primaire') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book"></i></div><span>Soutien scolaire toutes matières</span></a>
                                <a href="{{ url('/particuliers/accompagnement') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-puzzle-piece"></i></div><span>Accompagnement DYS</span></a>
                                <a href="{{ url('/particuliers/methode') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-tasks"></i></div><span>Méthodologie et organisation</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/particuliers/minimetier') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-briefcase"></i></div><span>Mini métiers</span></a>
                                <a href="{{ url('/particuliers/codage') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-robot"></i></div><span>Robotique et ateliers créatifs</span></a>
                                <a href="{{ url('/particuliers/petit') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-language"></i></div><span>Les petits bilingues</span></a>
                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                                <a href="{{ url('/particuliers/bouge') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-spell-check"></i></div><span>Bouge ta grammaire</span></a>
                                <a href="{{ url('/particuliers/cabine') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book-reader"></i></div><span>Ma cabine à livres</span></a>
                                <a href="{{ url('/particuliers/sportenf') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-running"></i></div><span>Sport enfant</span></a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item-moderne">
                    <a href="#" class="nav-link-moderne">Collège <i class="fas fa-chevron-down chevron"></i></a>
                    <div class="mega-menu-moderne">
                        <div class="mega-header-moderne">
                            <h4><i class="fas fa-school"></i> Collège</h4>
                            <p>De la 6ème à la 3ème</p>
                        </div>
                        <div class="mega-body-moderne">
                            <div>
                                <div class="mega-col-title">Nos cours</div>
                                <a href="{{ url('/particuliers/soutien-collège') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book"></i></div><span>Soutien scolaire toutes matières</span></a>
                                <a href="{{ url('/particuliers/coaching') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-graduation-cap"></i></div><span>Coaching scolaire</span></a>
                                <a href="{{ url('/particuliers/college-methode') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-user-graduate"></i></div><span>Méthodologie et autonomie</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                
                                <a href="{{ url('/particuliers/minimetier') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-briefcase"></i></div><span>Mini métiers</span></a>
                                <a href="{{ url('/particuliers/college-competence') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-robot"></i></div><span>Robotique et ateliers créatifs</span></a>
                                <a href="{{ url('/particuliers/petit') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-language"></i></div><span>Les petits bilingues</span></a>
                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                                <a href="{{ url('/particuliers/bouge') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-spell-check"></i></div><span>Bouge ta grammaire</span></a>
                                <a href="{{ url('/particuliers/cabine') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book-reader"></i></div><span>Ma cabine à livres</span></a>
                                <a href="{{ url('/particuliers/sportenf') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-running"></i></div><span>Sport enfant</span></a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item-moderne">
                    <a href="#" class="nav-link-moderne">Lycée <i class="fas fa-chevron-down chevron"></i></a>
                    <div class="mega-menu-moderne">
                        <div class="mega-header-moderne">
                            <h4><i class="fas fa-university"></i> Lycée</h4>
                            <p>De la Seconde à la Terminale</p>
                        </div>
                        <div class="mega-body-moderne">
                            <div>
                                <div class="mega-col-title">Nos cours</div>
                                <a href="{{ url('/particuliers/lycee-sous') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book"></i></div><span>Soutien scolaire toutes matières</span></a>
                                <a href="{{ url('/particuliers/lycee-coaching') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-star"></i></div><span>Coaching méthodologique</span></a>
                                <a href="{{ url('/particuliers/orientation-superieur') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation aux études supérieures</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item-moderne">
                    <a href="#" class="nav-link-moderne">Supérieur <i class="fas fa-chevron-down chevron"></i></a>
                    <div class="mega-menu-moderne">
                        <div class="mega-header-moderne">
                            <h4><i class="fas fa-user-graduate"></i> Supérieur</h4>
                            <p>De la licence au master</p>
                        </div>
                        <div class="mega-body-moderne">
                            <div>
                                <div class="mega-col-title">Nos cours</div>
                                <a href="{{ url('/particuliers/soutien-superieur') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Soutien aux études supérieures</span></a>
                                <a href="{{ url('/particuliers/orientation-superieur') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation aux études supérieures</span></a>
                                <a href="{{ url('/particuliers/groupe') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-calculator"></i></div><span>Préparation DCG / DSCG</span></a>
                                <a href="{{ url('/particuliers/methode-superieur') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-tasks"></i></div><span>Méthodologie et organisation</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/particuliers/reussir') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Préparation aux oraux</span></a>
                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item-moderne">
                    <a href="#" class="nav-link-moderne">Adultes <i class="fas fa-chevron-down chevron"></i></a>
                    <div class="mega-menu-moderne">
                        <div class="mega-header-moderne">
                            <h4><i class="fas fa-user-graduate"></i> Adultes</h4>
                            <p>Formations et activités</p>
                        </div>
                        <div class="mega-body-moderne">
                            <div>
                                <div class="mega-col-title">Nos formations</div>
                                <a href="{{ route('particuliers.gift-vouchers.index') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-calculator"></i></div><span>Nos bons cadeaux</span></a>
                                <a href="{{ url('/particuliers/formations') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-chalkboard-teacher"></i></div><span>Toutes les formations professionnelles</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/particuliers/sport-adulte') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Sports à domicile pour adultes</span></a>
                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item-moderne"><a href="{{ route('profil.choisir', ['profil' => 'entreprise']) }}" class="nav-link-moderne" title="Changer d'espace"><i class="fas fa-exchange-alt" aria-hidden="true"></i> Espace entreprises</a></li>


                <li class="nav-item-moderne"><a href="/particuliers/contact" class="nav-link-moderne">Contact</a></li>
            </ul>

            <div class="ms-lg-3 mt-3 mt-lg-0">
                @auth
                    <div class="user-connected">
                        <a href="{{ route('particuliers.video.dashboard') }}" class="d-flex align-items-center text-decoration-none">
                            <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                            <span class="user-name d-none d-lg-block">{{ Auth::user()->name }}</span>
                        </a>
                        <a href="{{ route('particuliers.logout') }}" class="btn-connect-outline btn-sm"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        <form id="logout-form" action="{{ route('particuliers.logout') }}" method="POST" style="display: none;">@csrf</form>
                    </div>
                @else
                    <a href="{{ url('/particuliers/login') }}" class="btn-nav-cta"><i class="fas fa-user"></i> Connexion</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

{{-- Si la page n'a pas ses propres styles de header, on active ceux de responsive.css
     (classe « mpcm-hf »). S'exécute avant l'affichage : pas de clignotement. --}}
<script>
(function () {
    var h = document.querySelector('.mega-header-moderne');
    if (h && getComputedStyle(h).backgroundImage === 'none') {
        document.documentElement.classList.add('mpcm-hf');
    }
})();
</script>

