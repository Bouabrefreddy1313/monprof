<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0A1628 0%, #1E3A5F 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Nunito', sans-serif;
            padding: 20px;
        }
        .login-card {
            background: white;
            border-radius: 24px;
            padding: 45px;
            width: 100%;
            max-width: 460px;
            box-shadow: 0 24px 64px rgba(0,0,0,0.3);
        }
        .login-card .logo-text {
            font-weight: 800;
            font-size: 1.6rem;
            color: #0A1628;
            text-align: center;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .login-card .logo-text i {
            color: #FF6B35;
        }
        .login-card .logo-sub {
            text-align: center;
            color: #9AA0A6;
            font-weight: 600;
            margin-bottom: 28px;
            font-size: 0.95rem;
        }
        .login-card .form-group label {
            font-weight: 700;
            color: #3C4043;
            font-size: 0.9rem;
        }
        .login-card input.form-control {
            border-radius: 12px;
            border: 1.5px solid #E8EAED;
            padding: 12px 16px;
            font-weight: 600;
            height: auto;
        }
        .login-card input.form-control:focus {
            border-color: #FF6B35;
            box-shadow: 0 0 0 3px rgba(255,107,53,0.15);
        }
        .remember-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
            margin-bottom: 20px;
        }
        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            color: #4A5568;
            cursor: pointer;
            user-select: none;
            margin: 0;
        }
        .remember-checkbox {
            width: 18px;
            height: 18px;
            accent-color: #FF6B35;
            cursor: pointer;
        }
        .btn-login {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            background: linear-gradient(135deg, #FF6B35, #E85A2B);
            color: white;
            font-weight: 700;
            font-size: 1.05rem;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #E85A2B, #D04F20);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255,107,53,0.35);
            color: white;
        }
        .link-register {
            text-align: center;
            margin-top: 24px;
            font-weight: 600;
            color: #5F6368;
            font-size: 0.9rem;
        }
        .link-register a {
            color: #FF6B35;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo-text">
            <i class="fas fa-shield-alt"></i> ADMINISTRATION
        </div>
        <div class="logo-sub">Connexion à votre espace d'administration</div>

        <!-- Affichage des messages d'erreur -->
        @if ($errors->any())
            <div class="alert alert-danger" style="border-radius: 12px; font-size: 0.9rem;">
                <ul class="mb-0 pl-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Affichage des messages de statut -->
        @if (session('status'))
            <div class="alert alert-info" style="border-radius: 12px; font-size: 0.9rem;">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope text-muted me-1"></i> Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="votre@email.com">
            </div>
            <div class="form-group mb-2">
                <label for="password"><i class="fas fa-lock text-muted me-1"></i> Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="••••••••">
            </div>

            <!-- Se souvenir de moi -->
            <div class="remember-wrap">
                <label class="remember-label" for="remember">
                    <input type="checkbox" name="remember" id="remember" value="1" class="remember-checkbox" checked>
                    <span>Se souvenir de moi</span>
                </label>
            </div>

            <button type="submit" class="btn btn-login">
                <i class="fas fa-sign-in-alt mr-2"></i> Se connecter
            </button>
        </form>

        <div class="link-register">
            Pas encore de compte ? <a href="{{ route('admin.register.form') }}">S'inscrire ici</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
