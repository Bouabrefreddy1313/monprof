<!-- Login Popup Modal -->
<div id="loginPopup" class="login-overlay login-hidden">
    <div class="login-modal">
        <button class="login-close" onclick="closeLoginPopup()">&times;</button>
        <div class="login-content">
            <!-- Logo -->
            <div class="login-logo">
                <img src="/asset/img/favicon.png" alt="Monprofchezmoi" onerror="this.style.display='none'">
                <h2>Connexion</h2>
                <p>Accédez à votre espace personnel</p>
            </div>

            <form method="POST" action="{{ route('particuliers.login') }}" id="loginPopupForm">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="login_email" class="form-label">Adresse email</label>
                    <div class="form-input-wrapper">
                        <input
                            type="email"
                            id="login_email"
                            name="email"
                            class="form-control-custom @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            placeholder="votre@email.com"
                            required
                            autofocus
                            autocomplete="username"
                        >
                        <i class="fas fa-envelope"></i>
                    </div>
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="login_password" class="form-label">Mot de passe</label>
                    <div class="form-input-wrapper">
                        <input
                            type="password"
                            id="login_password"
                            name="password"
                            class="form-control-custom @error('password') is-invalid @enderror"
                            placeholder="••••••••"
                            required
                            autocomplete="current-password"
                        >
                        <i class="fas fa-lock"></i>
                        <button type="button" class="password-toggle" onclick="toggleLoginPassword()" aria-label="Afficher/Masquer le mot de passe">
                            <i class="fas fa-eye" id="loginToggleIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember & Forgot -->
                <div class="remember-wrap">
                    <div class="form-check-custom">
                        <input type="checkbox" id="login_remember" name="remember">
                        <label for="login_remember">Se souvenir de moi</label>
                    </div>

                    @if (Route::has('particuliers.password.request'))
                        <a href="{{ route('particuliers.password.request') }}" class="forgot-link">
                            Mot de passe oublié ?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-login" id="loginSubmitBtn">
                    <i class="fas fa-sign-in-alt"></i>
                    Se connecter
                </button>

                <!-- Divider -->
                <div class="divider">
                    <span>ou</span>
                </div>

                <!-- Register -->
                <div class="register-wrap">
                    <p>Pas encore de compte ? <a href="{{ route('particuliers.register') }}">Créer un compte</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.login-hidden {
    display: none !important;
}

.login-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(10, 22, 40, 0.75);
    z-index: 99998;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: loginFadeIn 0.3s ease;
    backdrop-filter: blur(4px);
}

.login-modal {
    background: white;
    border-radius: 24px;
    max-width: 440px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    padding: 48px 40px;
    position: relative;
    box-shadow: 0 25px 80px rgba(0,0,0,0.3);
    animation: loginSlideUp 0.4s ease;
}

.login-close {
    position: absolute;
    top: 16px;
    right: 20px;
    font-size: 32px;
    background: rgba(0,0,0,0.05);
    border: none;
    cursor: pointer;
    color: #9AA0A6;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.login-close:hover {
    background: #FF6B35;
    color: white;
    transform: rotate(90deg);
}

.login-content {
    text-align: center;
}

.login-logo {
    text-align: center;
    margin-bottom: 32px;
}

.login-logo img {
    height: 60px;
    width: auto;
    margin-bottom: 12px;
}

.login-logo h2 {
    font-size: 1.5rem;
    font-weight: 800;
    color: #0A1628;
    margin: 0;
    font-family: 'Nunito', sans-serif;
}

.login-logo p {
    font-size: 0.9rem;
    color: #5F6368;
    margin: 4px 0 0;
    font-family: 'Nunito', sans-serif;
}

.login-content .form-group {
    text-align: left;
    margin-bottom: 20px;
    position: relative;
}

.login-content .form-label {
    display: block;
    font-size: 0.85rem;
    font-weight: 700;
    color: #0A1628;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-family: 'Nunito', sans-serif;
}

.login-content .form-input-wrapper {
    position: relative;
}

.login-content .form-input-wrapper i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #9AA0A6;
    font-size: 1rem;
    transition: color 0.3s ease;
}

.login-content .form-control-custom {
    width: 100%;
    height: 54px;
    border: 2px solid #E8EAED;
    border-radius: 14px;
    padding: 0 16px 0 48px;
    font-size: 1rem;
    font-family: 'Nunito', sans-serif;
    color: #3C4043;
    transition: all 0.3s ease;
    background: #F8F9FA;
}

.login-content .form-control-custom:focus {
    outline: none;
    border-color: #FF6B35;
    background: white;
    box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.1);
}

.login-content .form-control-custom:focus + i,
.login-content .form-input-wrapper:focus-within i {
    color: #FF6B35;
}

.login-content .password-toggle {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #9AA0A6;
    cursor: pointer;
    font-size: 0.95rem;
    transition: color 0.3s ease;
    background: none;
    border: none;
    padding: 0;
}

.login-content .password-toggle:hover {
    color: #FF6B35;
}

.login-content .remember-wrap {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
}

.login-content .form-check-custom {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
}

.login-content .form-check-custom input[type="checkbox"] {
    width: 20px;
    height: 20px;
    border: 2px solid #E8EAED;
    border-radius: 6px;
    appearance: none;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.login-content .form-check-custom input[type="checkbox"]:checked {
    background: #FF6B35;
    border-color: #FF6B35;
}

.login-content .form-check-custom input[type="checkbox"]:checked::after {
    content: '\f00c';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    color: white;
    font-size: 0.7rem;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.login-content .form-check-custom label {
    font-size: 0.9rem;
    color: #5F6368;
    font-weight: 600;
    cursor: pointer;
    margin: 0;
    font-family: 'Nunito', sans-serif;
}

.login-content .forgot-link {
    font-size: 0.85rem;
    color: #FF6B35;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.3s ease;
}

.login-content .forgot-link:hover {
    color: #E85A2B;
    text-decoration: underline;
}

.login-content .btn-login {
    width: 100%;
    height: 56px;
    background: linear-gradient(135deg, #FF6B35, #E85A2B);
    color: white;
    border: none;
    border-radius: 14px;
    font-size: 1rem;
    font-weight: 700;
    font-family: 'Nunito', sans-serif;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 24px rgba(255, 107, 53, 0.35);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 20px;
}

.login-content .btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(255, 107, 53, 0.45);
}

.login-content .btn-login:active {
    transform: translateY(0);
}

.login-content .btn-login.loading {
    opacity: 0.8;
    pointer-events: none;
}

.login-content .btn-login.loading::after {
    content: '';
    width: 18px;
    height: 18px;
    border: 2px solid rgba(255,255,255,0.3);
    border-top-color: white;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}

.login-content .divider {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 20px;
}

.login-content .divider::before,
.login-content .divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: #E8EAED;
}

.login-content .divider span {
    font-size: 0.8rem;
    color: #9AA0A6;
    font-weight: 600;
    text-transform: uppercase;
}

.login-content .register-wrap {
    text-align: center;
}

.login-content .register-wrap p {
    font-size: 0.9rem;
    color: #5F6368;
    margin: 0;
    font-family: 'Nunito', sans-serif;
}

.login-content .register-wrap a {
    color: #FF6B35;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.3s ease;
}

.login-content .register-wrap a:hover {
    color: #E85A2B;
    text-decoration: underline;
}

.login-content .error-text {
    display: block;
    color: #EF4444;
    font-size: 0.82rem;
    margin-top: 6px;
    font-weight: 600;
}

@keyframes loginFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes loginSlideUp {
    from { opacity: 0; transform: translateY(30px) scale(0.95); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

@media (max-width: 480px) {
    .login-modal {
        padding: 32px 24px;
    }

    .login-logo img {
        height: 50px;
    }

    .login-logo h2 {
        font-size: 1.3rem;
    }
}
</style>

<script>
function closeLoginPopup() {
    var loginPopup = document.getElementById('loginPopup');
    if (loginPopup) {
        loginPopup.classList.add('login-hidden');
    }
    // Hide for 10 minutes before showing again
    setCookie('login_popup_closed', '1', 0.007);
}

function toggleLoginPassword() {
    const passwordInput = document.getElementById('login_password');
    const toggleIcon = document.getElementById('loginToggleIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

// Loading state on submit
document.getElementById('loginPopupForm').addEventListener('submit', function() {
    const btn = document.getElementById('loginSubmitBtn');
    btn.classList.add('loading');
    btn.innerHTML = 'Connexion en cours...';
});
</script>
