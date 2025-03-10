<?php

interface BuyHouse{
    public function buyRoom();
    public function buyKitchen();

}
abstract class Human implements BuyHouse{
    public float $height;
    public float $weight;
    public int $age;

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

    public function __construct($height, $weight, $age)
    {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
    }

    abstract public function birthday();

}