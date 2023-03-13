<?php

class S extends Controller
{
    public function index() {
        $link = $this->model('LinkModel');
        $link->setData($_GET['url']);
        $this->view('s/index');
    }

}