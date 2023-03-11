<?php
class Home extends Controller {
    public function index() {
        //$user = $this->model("UserModel");

        $this->view('home/index');
    }

}