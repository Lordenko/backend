<?php
class Circle{
    private float $centerX;
    private float $centerY;
    private float $radius;

    function __construct(float $centerX, float $centerY, float $radius)
    {
        $this->centerX = $centerX;
        $this->centerY = $centerY;
        $this->radius = $radius;
    }

    function __toString(){
        return "Коло з центром в ($this->centerX, $this->centerY) і радіусом $this->radius";
    }

    public function __get(string $name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new Exception("Властивість $name не існує!");
    }

    public function __set(string $name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            throw new Exception("Властивість $name не існує!");
        }
    }

    public function intersectsWith(Circle $other): bool {
        $dx = $this->centerX - $other->centerX;
        $dy = $this->centerY - $other->centerY;
        $distance = sqrt($dx * $dx + $dy * $dy);

        return $distance <= ($this->radius + $other->radius);
    }


}


