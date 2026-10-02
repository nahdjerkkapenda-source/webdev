<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <h1>Register</h1>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <p id="passwordMessage"></p>
        <!--@if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif-->

        <button type="submit" id="registerButton">Register</button>

        <p>Already have an account? <a href="/login">Login here</a>.</p>
        
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