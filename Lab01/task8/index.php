<?php

$amount = 5;

echo "<div style='position: relative; width: 100vw; height: 100vh; background-color: black;'>";
for ($i = 0; $i < $amount; $i++) {
    $size = rand(30, 150);
    $left = rand(0, 90);
    $top = rand(0, 90);

    echo "<div style='
        width: {$size}px;
        height: {$size}px;
        background-color: red;
        position: absolute;
        left: {$left}vw;
        top: {$top}vh;
    '></div>";
}
