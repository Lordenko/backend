<?php

$pdo = new PDO('mysql:host=localhost;dbname=Lab05;charset=utf8','homeuser','');

$sql = "SELECT * FROM tov";
$result = $pdo->query($sql);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <h1>Створення бази даних</h1>

        <table id="info">

            <tr>
                <td>Номер</td>
                <td>Назва товару</td>
                <td>Ціна за штуку</td>
                <td>Кількість</td>
                <td>Опис</td>
            </tr>

            <?php
            foreach($result as $row) {
                echo "<tr>";

                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['price']." грн"."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['description']."</td>";

                echo "</tr>";

            }
            ?>
        </table>

        <form action="actions/insert.php" method="post">
            <table>
                <tr>
                    <td><input type="submit" value="Додати запис"></td>
                </tr>
                <tr>
                    <td><input type="text" name="name"></td>
                    <td><label for="name">Назва товару</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="price"></td>
                    <td><label for="price">Ціна за штуку</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="amount"></td>
                    <td><label for="amount">Кількість</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="description"></td>
                    <td><label for="description">Опис</label></td>
                </tr>
            </table>









        </form>

        <br>

        <form action="actions/delete.php" method="post">
            <input type="submit" value="Вилучити запис">
            <input type="text" name="id">
        </form>


    </section>

</body>
</html>

