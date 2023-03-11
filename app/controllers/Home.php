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
        }

        $this->view('home/index', $data);
    }


}