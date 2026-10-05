<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/auth.css">
</head>
<body class="auth-body">
    <form action="/login" method="POST" class="auth-form">
        @csrf
        <h1>Login</h1>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        
        <div>
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember Me</label>
        </div>

        <button type="submit">Login</button>
        <p>Forgot your password? <a href="/reset-password">Reset it here</a>.</p>
        <p>Don't have an account? <a href="/register">Register here</a>.</p>
    </form>
</body>
</html>