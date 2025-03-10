<?php
class Programmer extends Human{
    public array $language;
    public float $experience; // in years

    public function __construct(float $height, float $weight, int $age, array $language, float $experience)
    {
        parent::__construct($height, $weight, $age);
        $this->language = $language;
        $this->experience = $experience;
    }

    public function add_language(string $language){
        array_push($this->language, $language);
    }

    public function __toString(){
        return "Height > $this->height <br>" . "Weight > $this->weight <br>" . "Age > $this->age <br>" . "Experience > $this->experience <br>" . "language > " . join(", " ,$this->language) . "<br>";
    }

    public function birthday()
    {
        return "Повідомлення при народженні дитини";
    }

    public function buyKitchen(){
        return "Програміст купує кухню";
    }

    public function buyRoom(){
        return "Програміст купує кімнату";
    }
}