const loginForm = document.getElementById('login-form');
const loginResult = document.getElementById('login-result');

loginForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(loginForm);
    const data = Object.fromEntries(formData.entries());

    const url = loginForm.getAttribute('action');

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                window.location.href = data.redirect;
            } else {
                loginResult.innerText = data.message || 'Помилка при вході';
            }

        })
        .catch(error => {
            console.error('Помилка:', error);
            loginResult.innerText = 'Сталася помилка під час входу.';
        });
});
