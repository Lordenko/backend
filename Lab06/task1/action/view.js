const button = document.getElementById('get_users');
const users_block = document.getElementById('users')
const result_users = document.getElementById('result_users')

button.addEventListener('click', function(event) {

    fetch('view.php', {
        method: 'POST',
    })
        .then(response => response.json())
        .then(data => {

            if (data.status === 'success'){

                const users = data.message
                console.log(users)

                let html = `<tr> <td>ID</td> <td>UserName</td> <td>Email</td> </tr>`
                users.forEach((element) => {
                    html += `<tr>`
                    html += `<td>${element['id']}</td> <td>${element['username']}</td> <td>${element['email']}</td>`
                    html += `</tr>`
                })

                users_block.innerHTML = html

            }

        })
        .catch(error => {
            console.error('Помилка:', error);
            result.innerText = 'Сталася помилка під час завантаження юзерів.';
        });
});