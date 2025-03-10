<?php
class UserController {
    public $controller;

    public function __construct($controller) {
        $this->controller = $controller;
    }
    public function get_controller() {
        return "Controller: {$this->controller}<br><br>";
    }
}
