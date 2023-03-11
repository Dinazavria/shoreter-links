<?php

class User extends Controller {
    public function reg() {

        $data = [];
        if(isset($_POST['login'])) {
            $user = $this->model('UserModel');
            $user->setData($_POST['email'], $_POST['login'], $_POST['password'], $_POST['repass']);

            $isValid = $user->validForm();
            if($isValid)
                $user->addUser();
            else
                $data['message'] = $isValid;
        }

        $this->view('user/reg', $data);
    }
}