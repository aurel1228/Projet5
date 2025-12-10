<?php
    class ViewController {
        public function loadView() {

        if ($controller == 0) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/' . $name . '.php';
            require 'controller/. '$name '.php ';
        }
    }







}
    
    