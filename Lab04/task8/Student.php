<?php
class Student extends Human{
    public string $name_of_university;
    public string $course;

    public function __construct(float $height, float $weight, int $age, string $name_of_university, string $course){
        parent::__construct($height, $weight, $age);
        $this->name_of_university = $name_of_university;
        $this->course = $course;
    }

    public function next_course(){
        $this->course += 1;
    }

    public function __toString(){
        return "Height > $this->height <br>" . "Weight > $this->weight <br>" . "Age > $this->age <br>" . "Name_of_university > $this->name_of_university <br>" . "Course > $this->course<br>";
    }

    public function birthday()
    {
        return "Повідомлення при народженні дитини";
    }

    public function buyKitchen(){
        return "Студент купує кухню";
    }

    public function buyRoom(){
        return "Студент купує кімнату";
    }


}