<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.html');
}

$pdo = new PDO('mysql:host=localhost;dbname=Lab06;charset=utf8', 'homeuser', '');
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h1>Ваш профіль</h1>

<form id="edit-profile" action="edit_user.php" method="post">
    <label>Ім'я:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($user['username']) ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>

    <label>Новий пароль (залиште порожнім, якщо не змінювати):</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Зберегти зміни</button>
</form>

<p id="edit-result"></p>

<button id="delete-account">Видалити акаунт</button>
<p id="delete-result"></p>

<script src="action/profile.js"></script>
