<?php
$rows = 8;
$cols = 3;

echo "<table border='1' style='border-collapse: collapse;'>";
for ($i = 0; $i < $rows; $i++) {
    echo "<tr>";


    for ($j = 0; $j < $cols; $j++) {
        $r = rand(0, 255);
        $g = rand(0, 255);
        $b = rand(0, 255);
        $color = "rgb($r, $g, $b)";
        echo "<td style='width: 50px; height: 50px; background: $color'></td>";
    }
    echo "</tr>";
}
echo "</table>";
