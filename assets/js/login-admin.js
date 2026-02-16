document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const nameInput = document.getElementById('nameInput');
    const passwordInput = document.getElementById('passwordInput');
    const showPasswordButton = document.getElementById('showPasswordButton');

    let passwordShown = false;
    showPasswordButton.addEventListener('click', () => {
        passwordShown = !passwordShown;
        if (passwordShown) {
            passwordInput.setAttribute('type', 'text');
            showPasswordButton.classList.remove('ri-eye-line');
            showPasswordButton.classList.add('ri-eye-off-line');
        }
        else {
            passwordInput.setAttribute('type', 'password');
            showPasswordButton.classList.remove('ri-eye-off-line');
            showPasswordButton.classList.add('ri-eye-line');
        }
    });
});
