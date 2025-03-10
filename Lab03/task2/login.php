<div>
    <form method="post">
        <label for="login">Введіть логін</label>
        <input type="text" name="login">

        <label for="password">Введіть логін</label>
        <input type="password" name="password">

        <input type="submit" value="Авторизуватися">
    </form>

    <?php
        isset($_SESSION['login']) && $_SESSION['login'] == 'error' ? include 'error.php' : null;
    ?>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if ($login == 'Admin' && $password == 'password') {
            $_SESSION['login'] = 'success';
        }
        else {
            $_SESSION['login'] = 'error';
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>