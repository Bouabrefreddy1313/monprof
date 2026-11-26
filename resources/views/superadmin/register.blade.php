<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Inscription</title>
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
        }
        .login-card {
            background: white;
            border-radius: 24px;
            padding: 48px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 24px 64px rgba(0,0,0,0.3);
        }
        .login-card .logo-text {
            font-weight: 800;
            font-size: 1.6rem;
            color: #0A1628;
            text-align: center;
            margin-bottom: 8px;
        }
        .login-card .logo-sub {
            text-align: center;
            color: #9AA0A6;
            font-weight: 600;
            margin-bottom: 32px;
        }
        .login-card .form-group label {
            font-weight: 700;
            color: #3C4043;
            font-size: 0.9rem;
        }
        .login-card input {
            border-radius: 12px;
            border: 1.5px solid #E8EAED;
            padding: 14px 16px;
            font-weight: 600;
        }
        .login-card input:focus {
            border-color: #FF6B35;
            box-shadow: 0 0 0 3px rgba(255,107,53,0.15);
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
            margin-top: 16px;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #E85A2B, #D04F20);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255,107,53,0.35);
            color: white;
        }
        .link-login {
            text-align: center;
            margin-top: 24px;
            font-weight: 600;
            color: #5F6368;
        }
        .link-login a {
            color: #FF6B35;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo-text">SUPER ADMIN</div>
        <div class="logo-sub">Créer un compte Super Admin</div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('particuliers.superadmin.register.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Nom complet</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation"><i class="fas fa-lock"></i> Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-login">S'inscrire</button>
        </form>

        <div class="link-login">
            Déjà un compte ? <a href="{{ route('particuliers.superadmin.login.form') }}">Se connecter</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
