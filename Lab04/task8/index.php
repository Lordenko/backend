<?php
require 'Human.php';
require 'Student.php';
require 'Programmer.php';

$student = new Student(12.3, 32.3, 43, "SFd", 1);
echo $student . "<br>";
$student->next_course();
echo $student . "<br>";
echo $student->birthday() . "<br>" . "<br>";
echo $student->buyRoom() . "<br>" . "<br>";
echo $student->buyKitchen() . "<br>" . "<br>";

$programmer = new Programmer(12.3, 32.3, 43, array("C#", "Python"), 3);
echo $programmer . "<br>";
$programmer->add_language('PHP');
echo $programmer . "<br>";
echo $programmer->birthday() . "<br>" . "<br>";
echo $programmer->buyRoom() . "<br>" . "<br>";
echo $programmer->buyKitchen() . "<br>" . "<br>";

