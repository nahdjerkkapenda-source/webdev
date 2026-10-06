
const name = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirm-password');
const message = document.getElementById('passwordMessage');
const registerButton = document.getElementById('register-button');

const passwordMeter = document.getElementById('password-strength-meter');
const passwordStrengthText = document.getElementById('password-strength-text');

const lengthRequirement = document.getElementById('length');
const uppercaseRequirement = document.getElementById('uppercase');
const lowercaseRequirement = document.getElementById('lowercase');
const numberRequirement = document.getElementById('number');
const specialRequirement = document.getElementById('special');

registerButton.disabled = true;

function checkForm() {

    // Check password requirements
    const hasLength = password.value.length >= 8;
    const hasUppercase = /[A-Z]/.test(password.value);
    const hasLowercase = /[a-z]/.test(password.value);
    const hasNumber = /[0-9]/.test(password.value);
    const hasSpecial = /[!@#$%^&*]/.test(password.value);


    // Change requirement colors
    lengthRequirement.className = hasLength ? 'valid' : 'invalid';
    uppercaseRequirement.className = hasUppercase ? 'valid' : 'invalid';
    lowercaseRequirement.className = hasLowercase ? 'valid' : 'invalid';
    numberRequirement.className = hasNumber ? 'valid' : 'invalid';
    specialRequirement.className = hasSpecial ? 'valid' : 'invalid';


    // Calculate password strength
    let strength = 0;

    if (hasLength) strength++;
    if (hasUppercase) strength++;
    if (hasLowercase) strength++;
    if (hasNumber) strength++;
    if (hasSpecial) strength++;


    // Update meter
    passwordMeter.value = strength;


    // Update password strength text
    if (password.value === '') {
        passwordStrengthText.textContent = '';
    } else if (strength <= 2) {
        passwordStrengthText.textContent = 'Weak';
    } else if (strength <= 4) {
        passwordStrengthText.textContent = 'Medium';
    } else {
        passwordStrengthText.textContent = 'Strong';
    }


    // Check if all fields are filled
    const allFieldsFilled =
        name.value !== '' &&
        email.value !== '' &&
        password.value !== '' &&
        confirmPassword.value !== '';


    // Check if password meets all requirements
    const passwordIsValid =
        hasLength &&
        hasUppercase &&
        hasLowercase &&
        hasNumber &&
        hasSpecial;


    // Check if passwords match
    const passwordsMatch =
        password.value === confirmPassword.value;


    // Password confirmation message
    if (password.value === '' || confirmPassword.value === '') {

        message.textContent = '';

    } else if (passwordsMatch) {

        message.textContent = 'Passwords match.';
        message.className = 'success';

    } else {

        message.textContent = 'Passwords do not match.';
        message.className = 'error';
    }


    // Enable button only when everything is valid
    registerButton.disabled = !(
        allFieldsFilled &&
        passwordIsValid &&
        passwordsMatch
    );
}

name.addEventListener('input', checkForm);
email.addEventListener('input', checkForm);
password.addEventListener('input', checkForm);
confirmPassword.addEventListener('input', checkForm);