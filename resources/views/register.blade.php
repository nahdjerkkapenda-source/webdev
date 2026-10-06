<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>

<body class="auth-body">
    <form action="/register" method="POST" class="auth-form">
        @csrf
        <h1>Sign Up</h1>
        <p class="auth-description">Create an authorized account.</p>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <meter max="8" id="password-strength-meter"></meter>
        <label>Password Strength:</label>
        <ul id="password-requirements-description">
            <li id="length" class="invalid">At least 8 characters</li>
            <li id="uppercase" class="invalid">At least one uppercase letter</li>
            <li id="lowercase" class="invalid">At least one lowercase letter</li>
            <li id="number" class="invalid">At least one number</li>
            <li id="special" class="invalid">At least one special character (!@#$%^&*)</li>
        </ul>
        
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm_password" required>
        <p id="passwordMessage"></p>                                        <!--@if (session('error'))<p class="error">{{ session('error') }}</p>@endif-->
        
        <button type="submit" id="register-button">Create Account</button>
        
        <p style="text-align: center; margin-top: 1rem;">Already have an account? <a href="/login">Login here</a>.</p>
    </form>
    <script src="/js/register.js"></script>
</body>
</html>