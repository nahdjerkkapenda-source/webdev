<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <h1>Create an Account</h1>
        <p class="description">Create an authorized account to access our services.</p>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <meter max="8" id="password-strength-meter"></meter>
        <label>Password Strength:</label>
        <ul id="password-requirements">
            <li id="length" class="invalid">At least 8 characters</li>
            <li id="uppercase" class="invalid">At least one uppercase letter</li>
            <li id="lowercase" class="invalid">At least one lowercase letter</li>
            <li id="number" class="invalid">At least one number</li>
            <li id="special" class="invalid">At least one special character (!@#$%^&*)</li>
        </ul>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <p id="passwordMessage"></p>
        <!--@if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif-->


        <button type="submit" id="registerButton">Register</button>
        
        <p style="text-align: center;">Already have an account? <a href="/login">Login here</a>.</p>
        
        <script>
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm_password');
            const message = document.getElementById('passwordMessage');
            const registerButton = document.getElementById('registerButton');

            registerButton.disabled = true;
            function checkForm() {

                const allFieldsFilled = name.value !== '' && email.value !== '' && password.value !== '' && confirmPassword.value !== '';
                const passwordsMatch = password.value === confirmPassword.value;

                if (password.value === '' || confirmPassword.value === '') {
                    message.textContent = '';
                } else if (confirmPassword.value === password.value) {
                    message.textContent = 'Passwords match.';
                    message.className = 'success';
                } else {
                    message.textContent = 'Passwords do not match.';
                    message.className = 'error';
                }

                registerButton.disabled = !(allFieldsFilled && passwordsMatch);
            }
            name.addEventListener('input', checkForm);
            email.addEventListener('input', checkForm);
            password.addEventListener('input', checkForm);
            confirmPassword.addEventListener('input', checkForm);
        </script>

    
        
    </form>
</body>
</html>