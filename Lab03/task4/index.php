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
<form method="post" enctype="multipart/form-data">
    <label for="photo">Фотографія:</label>
    <input type="file" id="photo" name="photo">

    <input type="submit" value='Відправити'>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['photo']['name'];
        $tmpName = $_FILES['photo']['tmp_name'];
        $fileType = $_FILES['photo']['type'];

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($fileType, $allowedTypes)) {
            $uniqueName = uniqid() . '_' . $fileName;

            $uploadDir = 'images/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $uploadPath = $uploadDir . $uniqueName;

            move_uploaded_file($tmpName, $uploadPath);
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

</body>
</html>