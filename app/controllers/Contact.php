<?php

class Contact extends Controller {
    public function index() {
        $this->view('contact/index');
    }

    public function about() {
        $this->view('contact/about');
    }
}
