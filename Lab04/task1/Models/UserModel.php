<?php
class UserModel {
    public $model;

    public function __construct($model) {
        $this->model = $model;
    }
    public function get_model() {
        return "Model: {$this->model}<br><br>";
    }
}
