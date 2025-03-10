<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table {
        border-collapse: collapse;
    }
    td {
        border: 1px solid black;
        width: 200px;
        height: 40px;
        text-align: center;
        font-size: 20px;
        padding: 10px;
    }

    .hidden {
        display: none;
    }

    .visible {
        display: block;
    }
</style>
<?php require 'Function/func.php' ?>
<body>
<form method="POST">
    <label for="number_x">Enter x</label>
    <input type="number" name="number_x">

    <label for="number_y">Enter y</label>
    <input type="number" name="number_y">

    <br>
    <input type="submit" value="Підрахувати">
</form>

<?php
$x = '';
$y = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["number_x"]) && isset($_POST["number_y"])) {
        $x = $_POST["number_x"];
        $y = $_POST["number_y"];
        $visibility = 'visible';
    }
}

if ($x === '' && $y === '') {
    $visibility = 'hidden';
}
else {
    $visibility = 'visible';
}
?>
<div class=<?php echo $visibility ?>>
    <hr>
    <table>
        <tr>
            <td>x<sup>y</sup></td>
            <td>x!</td>
            <td>my_tang</td>
            <td>sin(x)</td>
            <td>cos(x)</td>
            <td>tag(x)</td>
        </tr>
        <tr>
            <td><?= degree($x, $y) ?></td>
            <td><?= factorial($x) ?></td>
            <td><?= my_tang($x) ?></td>
            <td><?= sinus($x) ?></td>
            <td><?= cosin($x) ?></td>
            <td><?= tang($x) ?></td>
        </tr>
    </table>
</div>



</body>
</html>