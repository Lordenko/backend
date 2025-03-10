<?php

namespace Classes;

class View {
    public $view;

    public function __construct($view) {
        $this->view = $view;
    }
    public function get_view() {
        return "View: {$this->view}<br><br>";
    }
}
