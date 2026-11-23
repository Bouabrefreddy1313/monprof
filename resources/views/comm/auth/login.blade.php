<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}

body {
    min-height: 100vh;
    background: linear-gradient(135deg, #4f46e5, #7c3aed);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}

.container {
    width: 100%;
    max-width: 400px;
}

.form-card {
    background: white;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #1f2937;
    text-align: center;
    font-size: 1.875rem;
    font-weight: bold;
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 1rem;
}

input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 0.5rem;
    outline: none;
    transition: all 0.3s ease;
}

input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.submit-btn {
    width: 100%;
    padding: 0.75rem;
    background: #3b82f6;
    color: white;
    border: none;
    border-radius: 0.5rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.submit-btn:hover {
    background: #2563eb;
}

.login-link {
    margin-top: 2rem;
    text-align: center;
}

.login-link p {
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.login-btn {
    color: #3b82f6;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.login-btn:hover {
    color: #2563eb;
}

/* Responsive adjustments */
@media (max-width: 480px) {
    .form-card {
        padding: 1.5rem;
    }
    
    h2 {
        font-size: 1.5rem;
    }
}

/* Style pour la case Remember Me */
.form-check {
    display: flex;
    align-items: center;
    margin-top: 1rem;
}

.form-check-input {
    width: 18px;
    height: 18px;
    margin-right: 0.5rem;
    cursor: pointer;
    accent-color: #3b82f6; /* couleur de la coche */
    transition: transform 0.2s ease;
}

.form-check-input:hover {
    transform: scale(1.1);
}

.form-check-label {
    font-size: 0.9rem;
    color: #4b5563; /* gris foncé */
    cursor: pointer;
    user-select: none;
}

.form-check-label:hover {
    color: #3b82f6; /* change couleur au survol */
}


</style>
<body>
    <div class="container">
        <div class="form-card">
            <h2>Login</h2>
            
            <form action="{{ route('comm.login') }}" method="POST">
            @csrf   
                

                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

               
                <button type="submit" class="submit-btn">Login</button>
            </form>

            <div class="login-link">
                <p>Vous N'avez pas un compte?</p>
                <a href="/comm/register" class="login-btn">register here</a>
            </div>
            <div class="form-check">
    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label class="form-check-label" for="remember">
        Se souvenir de moi
    </label>
</div>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>