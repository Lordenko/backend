<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
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

<?php
require 'DataBaseManager.php';
$user = DataBaseManager::getUserDate($_SESSION['id']);
?>

<body>
<h1>Вітаю <?php echo DataBaseManager::getLoginById($_SESSION['id'])?>!</h1>

<a href="logout.php">Вийти з аккаунту</a>
<br>
<a href="delete_user.php">Видалити аккаунт</a>

<h2>Редагування даних</h2>
<form method="POST">
    <label for="login">Логін</label>
    <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($user['login']); ?>" required><br><br>

    <label for="password">Новий пароль (залиште порожнім, якщо не змінюєте):</label>
    <input type="password" id="password" name="password"><br><br>

    <label for="email">Електронна пошта:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>

    <label for="phone_number">Номер телефону:</label>
    <input type="text" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($user['phone_number']); ?>"><br><br>

    <label for="date_of_birth">Дата народження:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo htmlspecialchars($user['date_of_birth']); ?>"><br><br>

    <label for="gender">Стать:</label>
    <select id="gender" name="gender">
        <option value="Male" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Чоловік</option>
        <option value="Female" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Жінка</option>
        <option value="Other" <?php echo ($user['gender'] == 'Other') ? 'selected' : ''; ?>>Інше</option>
    </select><br><br>

    <label for="address">Адреса:</label>
    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>"><br><br>

    <label for="city">Місто:</label>
    <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($user['city']); ?>"><br><br>

    <label for="country">Країна:</label>
    <input type="text" id="country" name="country" value="<?php echo htmlspecialchars($user['country']); ?>"><br><br>

    <label for="is_active">Активний користувач:</label>
    <input type="checkbox" id="is_active" name="is_active" <?php echo ($user['is_active']) ? 'checked' : ''; ?>><br><br>

    <button type="submit">Оновити дані</button>
</form>
</body>
</html>

<?php
require_once "DataBaseManager.php";

if (!isset($_SESSION["id"])) {
    die("Ви не авторизовані!");
}

$conn = DataBaseManager::getConnection();
$user_id = $_SESSION["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_login = trim($_POST["login"] ?? "");
    $new_password = trim($_POST["password"] ?? "");
    $new_email = trim($_POST["email"] ?? "");
    $new_phone_number = trim($_POST["phone_number"] ?? "");
    $new_date_of_birth = trim($_POST["date_of_birth"] ?? "");
    $new_gender = trim($_POST["gender"] ?? "");
    $new_address = trim($_POST["address"] ?? "");
    $new_city = trim($_POST["city"] ?? "");
    $new_country = trim($_POST["country"] ?? "");
    $new_is_active = isset($_POST["is_active"]) ? 1 : 0;

    $updates = [];
    $params = [];
    $types = "";

    if (!empty($new_login)) {
        $updates[] = "login = ?";
        $params[] = $new_login;
        $types .= "s";
    }

    if (!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $updates[] = "password = ?";
        $params[] = $hashed_password;
        $types .= "s";
    }

    if (!empty($new_email)) {
        $updates[] = "email = ?";
        $params[] = $new_email;
        $types .= "s";
    }

    if (!empty($new_phone_number)) {
        $updates[] = "phone_number = ?";
        $params[] = $new_phone_number;
        $types .= "s";
    }

    if (!empty($new_date_of_birth)) {
        $updates[] = "date_of_birth = ?";
        $params[] = $new_date_of_birth;
        $types .= "s";
    }

    if (!empty($new_gender)) {
        $updates[] = "gender = ?";
        $params[] = $new_gender;
        $types .= "s";
    }

    if (!empty($new_address)) {
        $updates[] = "address = ?";
        $params[] = $new_address;
        $types .= "s";
    }

    if (!empty($new_city)) {
        $updates[] = "city = ?";
        $params[] = $new_city;
        $types .= "s";
    }

    if (!empty($new_country)) {
        $updates[] = "country = ?";
        $params[] = $new_country;
        $types .= "s";
    }

    $updates[] = "is_active = ?";
    $params[] = $new_is_active;
    $types .= "i";

    if (empty($updates)) {
        echo "Немає даних для оновлення!";
        exit();
    }

    $sql = "UPDATE users SET " . implode(", ", $updates) . " WHERE id = ?";
    $params[] = $user_id;
    $types .= "i";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        echo "Дані успішно оновлено!";
    } else {
        echo "Помилка оновлення!";
    }

    $stmt->close();
    $conn->close();

    header("Location: " . $_SERVER['HTTP_REFERER']);
}
?>
