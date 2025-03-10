<?php
$exchange_rate = 41;
$money = 50000;

$result = round($money/$exchange_rate, 3);

echo "За $money гривень можна отримати $result доларів";