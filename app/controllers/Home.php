<?php
class Home extends Controller {
    public function index() {

        $data = [];

        if(isset($_POST['login'])) {
            $user = $this->model('UserModel');

            $user->setData($_POST['email'], $_POST['login'], $_POST['password'], $_POST['repass']);

            $isValid = $user->validForm();
            if($isValid == "Происходит регистрация")
                $user->addUser();
            else
                $data['message'] = $isValid;

            $links = $this->model('ShorterModel');

            if(isset($_POST['iddel'])) {
                $delete = $links->deleteShorter($_POST['iddel']);
                if($delete == "Удалено")
                    $data['message'] = $delete;
                else
                    $data['message'] = $delete;
            }

        }

        if(isset($_POST['link'])) {
            $slink = $this->model('ShorterModel');
            $slink->setData($_POST['link'], $_POST['keyword']);

            $isValid = $slink->validForm();
            if($isValid == "Сокращаем...")
                $slink->addShorter();
            else
                $data['message'] = $isValid;

        }



        $this->view('home/index', $data);
    }

}