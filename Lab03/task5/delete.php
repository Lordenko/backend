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
<a href="index.php">Go to index.php</a> <br> <br>

<?php
$all_files = scandir("../task5");
foreach ($all_files as $dir) {
    if (is_dir($dir) && $dir != "." && $dir != "..") {
        $dirs[] = $dir;
    }
}
?>

<form method="post">
    <label for="user">Виберіть юзера</label>
    <select name="user">
        <?php foreach ($dirs as $dir):?>
            <option value=<?= $dir ?>> <?= $dir ?> </option>
        <?php endforeach; ?>
    </select>

    <input type="submit" value="Видалити">
</form>

<?php
function delete_folder($folderPath) {
    $files = array_diff(scandir($folderPath), ['.', '..']);

    foreach ($files as $file) {
        $fullPath = $folderPath . DIRECTORY_SEPARATOR . $file;

        if (is_file($fullPath)) {
            unlink($fullPath);
        }
        elseif (is_dir($fullPath)) {
            delete_folder($fullPath);
        }
    }

    return rmdir($folderPath);

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["user"])) {
        echo $_POST["user"];
        delete_folder($_POST["user"]);
    }

    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit();
}
?>

</body>
</html>