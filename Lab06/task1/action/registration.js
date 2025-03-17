const form = document.getElementById('registration-form');
const result = document.getElementById('result');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    fetch('register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            result.innerText = data.message || 'Реєстрація успішна!';
        })
        .catch(error => {
            console.error('Помилка:', error);
            result.innerText = 'Сталася помилка під час реєстрації.';
        });
});