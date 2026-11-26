<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inscription - {{ config('app.name', 'Monprofchezmoi') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="/asset/img/favicon.png" type="image/png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --orange: #FF6B35;
            --orange-dark: #E85A2B;
            --orange-light: #FF8C5A;
            --blue: #0A1628;
            --blue-light: #1E3A5F;
            --blue-accent: #3B82F6;
            --white: #FFFFFF;
            --gray-50: #F8F9FA;
            --gray-100: #F1F3F4;
            --gray-200: #E8EAED;
            --gray-400: #9AA0A6;
            --gray-600: #5F6368;
            --gray-800: #3C4043;
            --shadow-sm: 0 2px 8px rgba(10,22,40,0.06);
            --shadow-md: 0 8px 24px rgba(10,22,40,0.1);
            --shadow-lg: 0 16px 48px rgba(10,22,40,0.12);
            --shadow-xl: 0 24px 64px rgba(10,22,40,0.16);
            --shadow-orange: 0 8px 32px rgba(255,107,53,0.25);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Nunito', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
            position: relative;
            overflow: hidden;
            padding: 40px 20px;
        }

        /* Background decorative elements */
        body::before {
            content: '';
            position: absolute;
            top: -10%; right: -10%;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(255,107,53,0.12), transparent 70%);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -15%; left: -10%;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(59,130,246,0.08), transparent 70%);
            border-radius: 50%;
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(-30px, -20px); }
        }

        /* Register Card */
        .register-card {
            background: var(--white);
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            width: 100%;
            max-width: 480px;
            padding: 48px 40px;
            position: relative;
            z-index: 2;
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Logo */
        .register-logo {
            text-align: center;
            margin-bottom: 32px;
        }

        .register-logo img {
            height: 60px;
            width: auto;
            margin-bottom: 12px;
        }

        .register-logo h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--blue);
            margin: 0;
        }

        .register-logo p {
            font-size: 0.9rem;
            color: var(--gray-600);
            margin: 4px 0 0;
        }

        /* Form Fields */
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--blue);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input-wrapper {
            position: relative;
        }

        .form-input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .form-control-custom {
            width: 100%;
            height: 54px;
            border: 2px solid var(--gray-200);
            border-radius: 14px;
            padding: 0 16px 0 48px;
            font-size: 1rem;
            font-family: 'Nunito', sans-serif;
            color: var(--gray-800);
            transition: all 0.3s ease;
            background: var(--gray-50);
        }

        .form-control-custom:focus {
            outline: none;
            border-color: var(--orange);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.1);
        }

        .form-control-custom:focus + i,
        .form-input-wrapper:focus-within i {
            color: var(--orange);
        }

        /* Password toggle */
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            cursor: pointer;
            font-size: 0.95rem;
            transition: color 0.3s ease;
            background: none;
            border: none;
            padding: 0;
        }

        .password-toggle:hover {
            color: var(--orange);
        }

        /* Password strength indicator */
        .password-strength {
            margin-top: 8px;
            height: 4px;
            border-radius: 2px;
            background: var(--gray-200);
            overflow: hidden;
            display: none;
        }

        .password-strength.visible {
            display: block;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .password-strength-bar.weak { width: 33%; background: #EF4444; }
        .password-strength-bar.medium { width: 66%; background: #F59E0B; }
        .password-strength-bar.strong { width: 100%; background: #10B981; }

        .password-strength-text {
            font-size: 0.78rem;
            margin-top: 4px;
            font-weight: 600;
        }

        /* Submit Button */
        .btn-register {
            width: 100%;
            height: 56px;
            background: linear-gradient(135deg, var(--orange), var(--orange-dark));
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(255, 107, 53, 0.4);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--gray-200);
        }

        .divider span {
            font-size: 0.8rem;
            color: var(--gray-400);
            font-weight: 600;
            text-transform: uppercase;
        }

        /* Login Link */
        .login-wrap {
            text-align: center;
        }

        .login-wrap p {
            font-size: 0.9rem;
            color: var(--gray-600);
            margin: 0;
        }

        .login-wrap a {
            color: var(--orange);
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .login-wrap a:hover {
            color: var(--orange-dark);
            text-decoration: underline;
        }

        /* Back to home */
        .back-home {
            text-align: center;
            margin-top: 24px;
        }

        .back-home a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-home a:hover {
            color: var(--orange);
        }

        /* Error messages */
        .error-text {
            display: block;
            color: #EF4444;
            font-size: 0.82rem;
            margin-top: 6px;
            font-weight: 600;
        }

        /* Terms checkbox */
        .terms-wrap {
            margin-bottom: 20px;
        }

        .form-check-custom {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            cursor: pointer;
        }

        .form-check-custom input[type="checkbox"] {
            width: 20px;
            height: 20px;
            min-width: 20px;
            border: 2px solid var(--gray-200);
            border-radius: 6px;
            appearance: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            margin-top: 2px;
        }

        .form-check-custom input[type="checkbox"]:checked {
            background: var(--orange);
            border-color: var(--orange);
        }

        .form-check-custom input[type="checkbox"]:checked::after {
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

        .form-check-custom label {
            font-size: 0.85rem;
            color: var(--gray-600);
            font-weight: 600;
            cursor: pointer;
            margin: 0;
            line-height: 1.5;
        }

        .form-check-custom label a {
            color: var(--orange);
            text-decoration: none;
            font-weight: 700;
        }

        .form-check-custom label a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .register-card {
                padding: 32px 24px;
                border-radius: 20px;
            }

            .register-logo img {
                height: 50px;
            }

            .register-logo h2 {
                font-size: 1.3rem;
            }

            body {
                padding: 20px 16px;
            }
        }

        /* Loading state */
        .btn-register.loading {
            opacity: 0.8;
            pointer-events: none;
        }

        .btn-register.loading::after {
            content: '';
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin-left: 8px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Input group for name (first/last) */
        .name-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        @media (max-width: 480px) {
            .name-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <div class="register-card">
        <!-- Logo -->
        <div class="register-logo">
            <img src="/asset/img/favicon.png" alt="{{ config('app.name') }}">
            <h2>Créer un compte</h2>
            <p>Rejoignez la communauté Monprofchezmoi</p>
        </div>

        <form method="POST" action="{{ route('particuliers.register') }}" id="registerForm">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name" class="form-label">Nom complet</label>
                <div class="form-input-wrapper">
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control-custom @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Votre nom et prénom"
                        required
                        autofocus
                        autocomplete="name"
                    >
                    <i class="fas fa-user"></i>
                </div>
                @error('name')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">Adresse email</label>
                <div class="form-input-wrapper">
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control-custom @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="votre@email.com"
                        required
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
                <label for="password" class="form-label">Mot de passe</label>
                <div class="form-input-wrapper">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control-custom @error('password') is-invalid @enderror"
                        placeholder="••••••••"
                        required
                        autocomplete="new-password"
                        oninput="checkPasswordStrength(this.value)"
                    >
                    <i class="fas fa-lock"></i>
                    <button type="button" class="password-toggle" onclick="togglePassword('password', 'toggleIcon1')" aria-label="Afficher/Masquer le mot de passe">
                        <i class="fas fa-eye" id="toggleIcon1"></i>
                    </button>
                </div>
                <div class="password-strength" id="passwordStrength">
                    <div class="password-strength-bar" id="strengthBar"></div>
                </div>
                <div class="password-strength-text" id="strengthText"></div>
                @error('password')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <div class="form-input-wrapper">
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control-custom @error('password_confirmation') is-invalid @enderror"
                        placeholder="••••••••"
                        required
                        autocomplete="new-password"
                    >
                    <i class="fas fa-lock"></i>
                    <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', 'toggleIcon2')" aria-label="Afficher/Masquer le mot de passe">
                        <i class="fas fa-eye" id="toggleIcon2"></i>
                    </button>
                </div>
                @error('password_confirmation')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Terms -->
            <div class="terms-wrap">
                <div class="form-check-custom">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">
                        J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a> de Monprofchezmoi
                    </label>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-register" id="submitBtn">
                <i class="fas fa-user-plus"></i>
                Créer mon compte
            </button>

            <!-- Divider -->
            <div class="divider">
                <span>ou</span>
            </div>

            <!-- Login Link -->
            <div class="login-wrap">
                <p>Déjà un compte ? <a href="{{ route('particuliers.login') }}">Se connecter</a></p>
            </div>
        </form>
    </div>

    <!-- Back to home -->
    <div class="back-home">
        <a href="{{ url('/particuliers') }}">
            <i class="fas fa-arrow-left"></i>
            Retour à l'accueil
        </a>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);

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

        // Password strength checker
        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            const strengthContainer = document.getElementById('passwordStrength');

            if (password.length === 0) {
                strengthContainer.classList.remove('visible');
                return;
            }

            strengthContainer.classList.add('visible');

            let strength = 0;
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;

            strengthBar.className = 'password-strength-bar';

            if (strength <= 1) {
                strengthBar.classList.add('weak');
                strengthText.textContent = 'Faible';
                strengthText.style.color = '#EF4444';
            } else if (strength === 2) {
                strengthBar.classList.add('medium');
                strengthText.textContent = 'Moyen';
                strengthText.style.color = '#F59E0B';
            } else {
                strengthBar.classList.add('strong');
                strengthText.textContent = 'Fort';
                strengthText.style.color = '#10B981';
            }
        }

        // Loading state on submit
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const terms = document.getElementById('terms');
            if (!terms.checked) {
                e.preventDefault();
                alert('Veuillez accepter les conditions d\'utilisation.');
                return;
            }

            const btn = document.getElementById('submitBtn');
            btn.classList.add('loading');
            btn.innerHTML = 'Création en cours...';
        });
    </script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
