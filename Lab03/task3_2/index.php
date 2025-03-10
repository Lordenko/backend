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

<?php
$recreate_files = false;
if ($recreate_files) {
    include 'words.php';
}
?>

<!--Get all files-->
<?php
$all_files_in_folder = scandir("../task3_2");
$files = [];
foreach ($all_files_in_folder as $file) {
    if (strpos($file, "file_result") !== false) {
        $files[] = $file;
    }
}
?>

<!--Print info-->
<?php
$temp_open = fread(fopen("file1.txt", "r"), filesize("file1.txt"));
echo $temp_open . '<br>';


$temp_open = fread(fopen("file2.txt", "r"), filesize("file2.txt"));
echo $temp_open . '<br><br>';


foreach ($files as $file) {
    echo fread(fopen($file, "r"), filesize($file)) . '<br>';
}

echo '<br>'
?>


<form method="post">
    <label for="file_names">Виберіть файл для видаленя</label>
    <select name="file_names">
        <?php foreach ($files as $name): ?>
            <option value=<?php echo $name ?>><?php echo $name ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="fdfddf!">
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['file_names'])) {
        $file_name = $_POST['file_names'];
        unlink($file_name);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
?>

</body>
</html>