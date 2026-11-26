<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="/styles.css">
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

</style>
<body>
    <div class="container">
        <div class="form-card">
            <h2>Create Account</h2>
            
            <form action="{{ route('particuliers.comm.register') }}" method="POST">
            @csrf   
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                </div>

                <button type="submit" class="submit-btn">Register</button>
            </form>

            <div class="login-link">
                <p>Vous Avez déja un compte?</p>
                <a href="/particuliers/comm/login" class="login-btn">Login here</a>
            </div>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>