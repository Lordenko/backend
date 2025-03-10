<?php

$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8','homeuser','');

$sql = "SELECT * FROM employees";
$result = $pdo->query($sql);
$employees = $result->fetchAll(PDO::FETCH_ASSOC);


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
        <table id="info">
            <h1>Інформація</h1>


            <tr>
                <td><b>Номер</b></td>
                <td><b>Ім'я</b></td>
                <td><b>Посада</b></td>
                <td><b>Зарплата</b></td>
            </tr>

            <?php
            foreach($employees as $row) {
                echo "<tr>";

                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['position']."</td>";
                echo "<td>".$row['salary']." грн"."</td>";

                echo "</tr>";

            }
            ?>
        </table>


        <div id="actions">
            <form action="actions/insert.php" method="post">
                <table id="form">
                    <tr>
                        <td><input type="submit" value="Додати запис"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="name"></td>
                        <td><label for="name">Ім'я</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="position"></td>
                        <td><label for="position">Посада</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="salary"></td>
                        <td><label for="salary">Зарплата</label></td>
                    </tr>
                </table>
            </form>

            <br>

            <form action="actions/edit.php" method="post">
                <table id="form">
                    <tr>
                        <td><input type="submit" value="Змінити запис"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="id"></td>
                        <td><label for="id">Номер працівника</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="name"></td>
                        <td><label for="name">Ім'я</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="position"></td>
                        <td><label for="position">Посада</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="salary"></td>
                        <td><label for="salary">Зарплата</label></td>
                    </tr>
                </table>
            </form>

            <br>

            <form action="actions/delete.php" method="post">
                <table id="form">
                    <tr>
                        <td><input type="submit" value="Вилучити запис"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="id"></td>
                        <td><label for="id">Номер працівника</label></td>
                    </tr>
                </table>
            </form>
        </div>

        <div>
            <h1>Статистика</h1>
            <?php
            $salary = [];
            foreach($employees as $row) {
                $salary[] = $row['salary'];
            }
            $avg_salary = array_sum($salary) / count($salary);

            $positions = array_column($employees, 'position');
            $positionCounts = array_count_values($positions);
            ?>

            <p>Середня зарплата - <?php echo($avg_salary) ?></p>

            <table id="stats">
                <tr>
                    <td><b>Посада</b></td>
                    <td><b>Кількість працівників</b></td>
                </tr>

                <?php

                foreach($positionCounts as $key => $value) {
                    echo "<tr>";

                    echo "<td>".$key."</td>";
                    echo "<td>".$value."</td>";

                    echo "</tr>";
                }

                ?>
            </table>
        </div>

    </section>

</body>
</html>

