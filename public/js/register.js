const name = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirm-password');
const message = document.getElementById('passwordMessage');
const registerButton = document.getElementById('register-button');

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