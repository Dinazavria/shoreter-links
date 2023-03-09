<?php
class Contacts extends Controller{
    public function index($firstParam = '') {
        echo 'contact index - ' . $firstParam;
    }

    public function about() {
        echo 'contact about';
    }
}