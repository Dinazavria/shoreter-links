<?php

class User extends Controller {
    public function profile() {

        $user = $this->model('UserModel');

        if(isset($_POST['logout'])) {
            $user->logOut();
            exit();
        }

        $this->view('user/profile');
    }

    public function auth() {

        $data = [];

        if(isset($_POST['login'])) {
            $user = $this->model('UserModel');
            $data['message'] = $user->auth($_POST['login'], $_POST['password']);
        }

        $this->view('user/auth', $data);
    }

}