<?php
require 'Circle.php';

//$circle = new Circle(10, 10, 10);
//echo $circle;

$circle1 = new Circle(10, 10, 10);
$circle2 = new Circle(1, 1, 1);

echo $circle1->intersectsWith($circle2) ? 'true' : 'false';

echo $circle2;

