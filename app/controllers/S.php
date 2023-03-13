<?php

class S extends Controller
{
    public function index() {
        /*if(isset($_GET['url'])) {
            $link= $this->model('LinkModel');
            $redirect = $link->redirect($_GET['url']);
        }*/

        $this->view('s/index');
    }

}