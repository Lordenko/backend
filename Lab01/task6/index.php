<?php
$number = (string) rand(100, 999);

echo "Number = $number <br>";

$sum_number = (int)$number[0] + (int)$number[1] + (int)$number[2];
echo "$sum_number <br>";

$reverse_number = strrev($number);
echo "$reverse_number <br>";

$split = str_split($number);
rsort($split);
echo join("", $split);