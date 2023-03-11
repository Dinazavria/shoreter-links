<?php

require 'DB.php';
class UserModel {
    private $login;
    private $email;
    private $password;
    private $repass;
    private $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function setData($login, $email, $password, $repass) {
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->repass = $repass;
    }

    public function validForm() {
        if(strlen($this->login) < 3)
            return "Слишком короткий логин";
        else if(strlen($this->email) < 3)
            return "Слишком короткий адрес";
        else if(strlen($this->password) < 3)
            return "Слишком короткий пароль";
        else if($this->password != $this->repass)
            return "Пароли не совпадают";
        else
            return true;
    }

    public function addUser() {
        $sql = "INSERT INTO users(login, email, password) VALUES (:login :email :password)";
        $query = $this->_db->prepare($sql);

        $pass = password_hash($this->password, PASSWORD_DEFAULT);

        $query->execute(['login' => $this->login, 'email'=> $this->email, 'password'=>$pass]);

        setcookie('login', $this->login, time() + 3600 * 24 * 14, '/');
        header('Location: /user/profile/');
    }

}