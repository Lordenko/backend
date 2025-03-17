<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location: profile.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<a href="login.php">Залогінитись</a>


<h1>Реєстрація</h1>

<form method="POST">
    <label for="login">Логін</label>
    <input type="text" id="login" name="login" required><br><br>

    <label for="password">Пароль</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="email">Електронна пошта:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone_number">Номер телефону:</label>
    <input type="text" id="phone_number" name="phone_number"><br><br>

    <label for="date_of_birth">Дата народження:</label>
    <input type="date" id="date_of_birth" name="date_of_birth"><br><br>

    <label for="gender">Стать:</label>
    <select id="gender" name="gender">
        <option value="Male">Чоловік</option>
        <option value="Female">Жінка</option>
        <option value="Other">Інше</option>
    </select><br><br>

    <label for="address">Адреса:</label>
    <input type="text" id="address" name="address"><br><br>

    <label for="city">Місто:</label>
    <input type="text" id="city" name="city"><br><br>

    <label for="country">Країна:</label>
    <input type="text" id="country" name="country"><br><br>

    <label for="is_active">Активний користувач:</label>
    <input type="checkbox" id="is_active" name="is_active" checked><br><br>

    <button type="submit">Зареєструватися</button>
</form>
</body>
</html>


<?php
require "DataBaseManager.php";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['login'])) {
        $errors[] = "Логін є обов'язковим.";
    } else {
        $login = $_POST['login'];
    }

    if (empty($_POST['password'])) {
        $errors[] = "Пароль є обов'язковим.";
    } else {
        $password = $_POST['password'];
    }

    if (empty($_POST['email'])) {
        $errors[] = "Email є обов'язковим.";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['phone_number'])) {
        $errors[] = "Номер телефону є обов'язковим.";
    } else {
        $phone_number = $_POST['phone_number'];
    }

    if (empty($_POST['date_of_birth'])) {
        $errors[] = "Дата народження є обов'язковою.";
    } else {
        $date_of_birth = $_POST['date_of_birth'];
    }

    if (empty($_POST['gender'])) {
        $errors[] = "Пол є обов'язковим.";
    } else {
        $gender = $_POST['gender'];
    }

    if (empty($_POST['address'])) {
        $errors[] = "Адреса є обов'язковою.";
    } else {
        $address = $_POST['address'];
    }

    if (empty($_POST['city'])) {
        $errors[] = "Місто є обов'язковим.";
    } else {
        $city = $_POST['city'];
    }

    if (empty($_POST['country'])) {
        $errors[] = "Країна є обов'язковою.";
    } else {
        $country = $_POST['country'];
    }

    $is_active = isset($_POST['is_active']) ? 1 : 0;

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {
        if (!DataBaseManager::isExists($login)){
            DataBaseManager::insertDate($login, $password, $email, $phone_number, $date_of_birth, $gender, $address, $city, $country, $is_active);
            header('Location: login.html');
        }
        else {
            echo "Користувач уже зареєстрований!";
        }
    }
}

exit();
?>

</body>
</html>