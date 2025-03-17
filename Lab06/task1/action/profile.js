// Редагування профілю
const editForm = document.getElementById('edit-profile');
const editResult = document.getElementById('edit-result');

editForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(editForm);
    const data = Object.fromEntries(formData.entries());

    fetch(editForm.action, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            editResult.innerText = data.message;
        })
        .catch(error => {
            console.error('Помилка:', error);
            editResult.innerText = 'Сталася помилка.';
        });
});

// Видалення профілю
const deleteButton = document.getElementById('delete-account');
const deleteResult = document.getElementById('delete-result');

deleteButton.addEventListener('click', function() {
    if (confirm('Ви точно хочете видалити акаунт?')) {
        fetch('delete_user.php', {
            method: 'POST'
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    window.location.href = 'login.html'; // Вихід після видалення
                } else {
                    deleteResult.innerText = data.message;
                }
            })
            .catch(error => {
                console.error('Помилка:', error);
                deleteResult.innerText = 'Сталася помилка під час видалення.';
            });
    }
});
