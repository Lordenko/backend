<?php
session_start();


if (isset($_GET['language'])){
    setcookie("language", $_GET['language'], time() + (86400 * 30) * 182, "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="<?= $_COOKIE['language'] ?? 'ua' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма реєстрації</title>
</head>
<style>
    img {
        height: 20px;
        width: 30px;
    }
</style>
<body>
<a href="successful.php">Go to successful</a> <br> <br>

<a href="index.php?language=UA"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAD1BMVEUAV7f/1wAAULuln3f/2wCAuqzxAAAAzUlEQVR4nO3QsQGAMAzAsBT4/2b2eO0onaAZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACASx62ednmY5vD5qSclJNyUk7KSTkpJ+WknJSTclJOykk5KSflpJyUk3JSTspJOSkn5aSclJNyUk7KSTkpJ+WknJSTclJOykk5KSflpJyUk3JSTspJOSkn5aSclJNyUk7KSTkpJ+WknJSTclJOykk5KSflpJyUk3JSTspJOSkn5aSclJNyUk7KSTkpJ+WknJSTclJOykk5KSflpH7zk2pa0LCuDAAAAABJRU5ErkJggg==" alt="Ukraine"></a>
<a href="index.php?language=BRL"><img src="data:image/png;base64,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" alt="Brazil"></a>
<a href="index.php?language=DE"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASIAAACuCAMAAAClZfCTAAAAElBMVEUAAAD/zgDdAADnAADaAAD/2AAtsSEoAAAA+ElEQVR4nO3QMQGAMAAEsYeCf8tIuI0pkZANAAAAAAAAAAAAAAAAAAAAgB8dwm6CoqQoKUqKkqKkKClKipKipCgpSoqSoqQoKUqKkqKkKClKipKipCgpSoqSoqQoKUqKkqKkKClKipKipCgpSoqSoqQoKUqKkqKkKClKipKipCgpSoqSoqQoKUqKkqKkKClKewh7CbsIipKipCgpSoqSoqQoKUqKkqKkKClKipKipCgpSoqSoqQoKUqKkqKkKClKipKipCgpSoqSoqQoKUqKkqKkKClKipKipCgpSoqSoqQoKUqKkqKkKClKipKipCgpSoqSoqQoKUofMGTNC8HkSxoAAAAASUVORK5CYII=" alt="Germany"></a>


<?php echo '<br><br>' . "Мова сайту - " . $_COOKIE['language'] ?? 'UA' ?>

<h1>Форма реєстрації</h1>
<form action="/Lab02/task3/script.php" method="post" enctype="multipart/form-data">
    <?php
    $login = '';
    $password = '';
    $gender = '';
    $city = '';
    $games = [];
    $about = '';

    if (isset($_SESSION['login'])) {
        $login = $_SESSION['login'];
    }

    if (isset($_SESSION['password']) && $_SESSION['password'] != 'Паролі не збігаються') {
        $password = $_SESSION['password'];
    }

    if (isset($_SESSION['gender'])) {
        $gender = $_SESSION['gender'];
    }

    if (isset($_SESSION['city'])) {
        $city = $_SESSION['city'];
    }

    if (isset($_SESSION['games'])) {
        $games = $_SESSION['games'];
    }

    if (isset($_SESSION['about'])){
        $about = $_SESSION['about'];
    }

    ?>
    <div>
        <label for="login">Логін:</label>
        <input type="text" id="login" name="login" required value="<?= $login ?>">
    </div>
    <div>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required value="<?= $password ?>">
    </div>
    <div>
        <label for="confirm_password">Пароль (ще раз):</label>
        <input type="password" id="confirm_password" name="confirm_password" required value="<?= $password ?>">
    </div>
    <div>
        <label>Стать:</label>
        <label><input type="radio" name="gender" value="male" <?php echo $gender == 'male' ? 'checked' : '' ?>> чоловік</label>
        <label><input type="radio" name="gender" value="female" <?php echo $gender == 'female' ? 'checked' : '' ?>> жінка</label>
    </div>
    <div>
        <label for="city">Місто:</label>
        <select id="city" name="city" >
            <option value="Zhytomyr" <?php echo $city == 'Zhytomyr' ? 'selected' : '' ?>>Житомир</option>
            <option value="Kyiv" <?php echo $city == 'Kyiv' ? 'selected' : '' ?>>Київ</option>
            <option value="Lviv" <?php echo $city == 'Lviv' ? 'selected' : '' ?>>Львів</option>
        </select>
    </div>
    <div>
        <label>Улюблені гри:</label>
        <label><input type="checkbox" name="games[]" value="football" <?php echo in_array('football', $games) ? 'checked' : '' ?>> футбол</label>
        <label><input type="checkbox" name="games[]" value="basketball" <?php echo in_array('basketball', $games) ? 'checked' : '' ?>> баскетбол</label>
        <label><input type="checkbox" name="games[]" value="volleyball" <?php echo in_array('volleyball', $games) ? 'checked' : '' ?>> волейбол</label>
        <label><input type="checkbox" name="games[]" value="chess" <?php echo in_array('chess', $games) ? 'checked' : '' ?>> шахи</label>
        <label><input type="checkbox" name="games[]" value="wot" <?php echo in_array('wot', $games) ? 'checked' : '' ?>> World of Tanks</label>
    </div>
    <div>
        <label for="about">Про себе:</label>
        <textarea id="about" name="about"><?= $about ?></textarea>
    </div>
    <div>
        <label for="photo">Фотографія:</label>
        <input type="file" id="photo" name="photo">
    </div>
    <div>
        <button type="submit">Зареєструватися</button>
    </div>
</form>
</body>
</html>