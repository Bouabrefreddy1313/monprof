<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat du bon - {{ $voucher->title }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.03)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.03)"/><circle cx="90" cy="40" r="0.5" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
            z-index: 1;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
            animation: fadeInDown 0.8s ease-out;
        }

        .page-title {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .page-subtitle {
            color: rgba(255,255,255,0.8);
            font-size: 1.1rem;
            font-weight: 300;
        }

        .success-alert {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 20px 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            border: none;
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.3);
            animation: slideInRight 0.6s ease-out;
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 500;
        }

        .success-alert i {
            font-size: 1.5rem;
            animation: bounce 2s infinite;
        }

        .main-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out;
            border: 1px solid rgba(255,255,255,0.2);
        }

        .card-header {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
            animation: shimmer 3s infinite;
        }

        .voucher-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .voucher-amount {
            font-size: 2.2rem;
            font-weight: 800;
            color: #f39c12;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            animation: pulse 2s infinite;
        }

        .card-body {
            padding: 40px;
        }

        .payment-info {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
            animation: slideInLeft 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .payment-info::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 10s linear infinite;
        }

        .payment-info h4 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .payment-methods {
            list-style: none;
            margin: 20px 0;
        }

        .payment-methods li {
            padding: 12px 0;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .payment-methods li:hover {
            transform: translateX(10px);
            background: rgba(255,255,255,0.1);
            padding-left: 15px;
            border-radius: 8px;
        }

        .payment-methods li:last-child {
            border-bottom: none;
        }

        .payment-icon {
            width: 30px;
            height: 30px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .form-container {
            animation: fadeInUp 1s ease-out;
        }

        .form-group {
            margin-bottom: 25px;
            animation: slideInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e0e6ed;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            background: #f8f9fa;
            color: #2c3e50;
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
            background: white;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            transform: translateY(-2px);
        }

        .form-control:hover {
            border-color: #bdc3c7;
            background: white;
        }

        .submit-btn {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
            border: none;
            padding: 18px 40px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(39, 174, 96, 0.3);
            position: relative;
            overflow: hidden;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(39, 174, 96, 0.4);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .floating-element {
            position: absolute;
            color: rgba(255,255,255,0.1);
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            33% {
                transform: translateY(-20px) rotate(120deg);
            }
            66% {
                transform: translateY(10px) rotate(240deg);
            }
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
                flex-direction: column;
                gap: 10px;
            }
            
            .main-card {
                border-radius: 20px;
                margin: 0 10px;
            }
            
            .card-header,
            .card-body {
                padding: 25px 20px;
            }
            
            .voucher-title {
                font-size: 1.5rem;
            }
            
            .voucher-amount {
                font-size: 1.8rem;
            }
            
            .payment-info {
                padding: 20px;
            }
            
            .form-control {
                padding: 12px 15px;
            }
            
            .submit-btn {
                padding: 15px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <div class="floating-element">
            <i class="fas fa-coins" style="font-size: 3rem;"></i>
        </div>
        <div class="floating-element">
            <i class="fas fa-credit-card" style="font-size: 2.5rem;"></i>
        </div>
        <div class="floating-element">
            <i class="fas fa-mobile-alt" style="font-size: 2rem;"></i>
        </div>
    </div>

    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-ticket-alt"></i>
                Achat de Bon
            </h1>
            <p class="page-subtitle">Processus d'achat sécurisé et rapide</p>
        </div>

        @if(session('success'))
            <div class="success-alert" style="flex-direction: column; align-items: stretch; text-align: center; background: linear-gradient(135deg, #10B981, #059669); border-radius: 20px; padding: 25px; box-shadow: 0 12px 30px rgba(16,185,129,0.35);">
                <div style="display: flex; align-items: center; justify-content: center; gap: 12px; font-size: 1.25rem; font-weight: 800; margin-bottom: 15px;">
                    <i class="fas fa-gift" style="font-size: 1.8rem; color: #FCD34D;"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @if(session('voucher_code'))
                    <div style="background: rgba(255,255,255,0.95); color: #0A1628; border-radius: 16px; padding: 20px; margin: 10px 0; box-shadow: 0 8px 20px rgba(0,0,0,0.15);">
                        <p style="font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; color: #EA580C; margin-bottom: 6px;">
                            Votre Code Unique de Bon Cadeau
                        </p>
                        <div style="display: flex; align-items: center; justify-content: center; gap: 12px; flex-wrap: wrap;">
                            <span id="voucherCodeDisplay" style="font-family: 'Courier New', monospace; font-size: 1.9rem; font-weight: 900; letter-spacing: 3px; color: #0A1628; background: #FFF7ED; padding: 8px 20px; border-radius: 10px; border: 2px dashed #F97316;">
                                {{ session('voucher_code') }}
                            </span>
                            <button type="button" onclick="navigator.clipboard.writeText('{{ session('voucher_code') }}'); this.innerHTML='<i class=\'fas fa-check\'></i> Copié !'; setTimeout(() => this.innerHTML='<i class=\'fas fa-copy\'></i> Copier', 2500);" style="background: #0A1628; color: white; border: none; padding: 12px 20px; border-radius: 10px; font-weight: 700; font-size: 0.95rem; cursor: pointer; transition: all 0.3s; display: inline-flex; align-items: center; gap: 8px;">
                                <i class="fas fa-copy"></i> Copier
                            </button>
                        </div>
                        <p style="font-size: 0.9rem; color: #4B5563; margin-top: 14px; margin-bottom: 0;">
                            ✉️ Un e-mail de confirmation a été envoyé à <strong>{{ session('voucher_email') }}</strong>.<br>
                            👉 <strong>Communiquez ce code à notre conseillère</strong> lors de votre contact : elle vérifiera le bon et l'associera directement à la formation de votre choix !
                        </p>
                    </div>
                @endif
            </div>
        @endif

        <div class="main-card">
            <div class="card-header">
                <h2 class="voucher-title">{{ $voucher->title }}</h2>
                <div class="voucher-amount">{{ number_format($voucher->amount) }} FCFA</div>
            </div>

            <div class="card-body">
                <div class="payment-info">
                    <h4>
                        <i class="fas fa-mobile-alt"></i>
                        Instructions de paiement Mobile Money
                    </h4>
                    <p>Veuillez faire un dépôt du montant ci-dessus sur l'un des numéros suivants :</p>
                    <ul class="payment-methods">
                        <li>
                            <div class="payment-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <strong>Orange Money :</strong> 07 00 00 00 00
                            </div>
                        </li>
                        <li>
                            <div class="payment-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <strong>MTN Money :</strong> 05 00 00 00 00
                            </div>
                        </li>
                        <li>
                            <div class="payment-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <strong>Wave :</strong> 01 00 00 00 00
                            </div>
                        </li>
                    </ul>
                    <p><strong>Ensuite, remplissez le formulaire ci-dessous avec vos informations pour recevoir le code du bon.</strong></p>
                </div>

                <form method="POST" action="{{ route('voucher-orders.store', $voucher) }}" class="form-container" id="purchaseForm">
                    @csrf

                    <div class="form-group">
                        <label for="phone" class="form-label">
                            <i class="fas fa-phone-alt"></i>
                            Numéro utilisé pour payer
                        </label>
                        <input type="text" class="form-control" id="phone" name="phone" required placeholder="Ex: 07 00 00 00 00">
                    </div>

                    <div class="form-group">
                        <label for="amount_paid" class="form-label">
                            <i class="fas fa-money-bill-wave"></i>
                            Montant payé (FCFA)
                        </label>
                        <input type="number" class="form-control" id="amount_paid" name="amount_paid" required placeholder="Montant en FCFA" value="{{ $voucher->amount }}">
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i>
                            Email pour recevoir le code du bon
                        </label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="votre@email.com">
                    </div>

                    <button type="submit" class="submit-btn" id="submitBtn">
                        <i class="fas fa-check-circle"></i>
                        <span class="btn-text">Valider ma commande</span>
                        <div class="loading-spinner"></div>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des éléments du formulaire
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach((group, index) => {
                setTimeout(() => {
                    group.style.opacity = '1';
                    group.style.transform = 'translateY(0)';
                }, index * 200);
            });

            // Gestion du formulaire avec animation de chargement
            const form = document.getElementById('purchaseForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = submitBtn.querySelector('.btn-text');
            const spinner = submitBtn.querySelector('.loading-spinner');

            form.addEventListener('submit', function(e) {
                // Animation de chargement
                btnText.style.display = 'none';
                spinner.style.display = 'block';
                submitBtn.disabled = true;
                submitBtn.style.background = 'linear-gradient(135deg, #95a5a6, #7f8c8d)';
                
                // Effet de pulsation pendant le chargement
                submitBtn.style.animation = 'pulse 1s infinite';
            });

            // Animation des champs de formulaire
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                    this.parentElement.style.transition = 'transform 0.3s ease';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });

                // Validation en temps réel
                input.addEventListener('input', function() {
                    if (this.checkValidity()) {
                        this.style.borderColor = '#27ae60';
                        this.style.background = '#f0fff4';
                    } else {
                        this.style.borderColor = '#e74c3c';
                        this.style.background = '#fff5f5';
                    }
                });
            });

            // Animation de l'alerte de succès
            const successAlert = document.querySelector('.success-alert');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.opacity = '0';
                    successAlert.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        successAlert.remove();
                    }, 500);
                }, 6000);
            }

            // Effet de parallaxe sur les éléments flottants
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const floatingElements = document.querySelectorAll('.floating-element');
                
                floatingElements.forEach((element, index) => {
                    const speed = (index + 1) * 0.5;
                    element.style.transform = `translateY(${scrolled * speed}px) rotate(${scrolled * 0.1}deg)`;
                });
            });

            // Animation au survol des méthodes de paiement
            const paymentMethods = document.querySelectorAll('.payment-methods li');
            paymentMethods.forEach(method => {
                method.addEventListener('mouseenter', function() {
                    this.style.background = 'rgba(255,255,255,0.2)';
                    this.style.transform = 'translateX(15px) scale(1.02)';
                });
                
                method.addEventListener('mouseleave', function() {
                    this.style.background = 'transparent';
                    this.style.transform = 'translateX(0) scale(1)';
                });
            });

            // Pré-remplissage intelligent du montant
            const amountInput = document.getElementById('amount_paid');
            const voucherAmount = {{ $voucher->amount }};
            
            amountInput.addEventListener('focus', function() {
                if (this.value == voucherAmount) {
                    this.select();
                }
            });

            // Formatage du numéro de téléphone
            const phoneInput = document.getElementById('phone');
            phoneInput.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');
                if (value.length > 0) {
                    value = value.replace(/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/, '$1 $2 $3 $4 $5');
                }
                this.value = value;
            });
        });
    </script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>