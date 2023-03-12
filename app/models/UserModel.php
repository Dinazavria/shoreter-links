<?php

require 'DB.php';

session_start();
class UserModel {
    private $email;
    private $login;
    private $password;
    private $repass;
    private $_db = null;

    private $session_name = 'list';

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function setData($email, $login, $password, $repass) {
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
        $this->repass = $repass;
    }

    public function validForm() {
        if(strlen($this->email) < 3)
            return "Слишком короткий адрес";
        else if(strlen($this->login) < 3)
            return "Слишком короткий логин";
        else if(strlen($this->password) < 3)
            return "Пароль должен содержать не менее 3 символов";
        else if($this->password != $this->repass)
            return "Пароли не совпадают";
        else
            return "Происходит регистрация";
    }

    public function addUser() {
        $sql = 'INSERT INTO users(email, login, password) VALUES(:email, :login, :password)';
        $query = $this->_db->prepare($sql);

        $pass = password_hash($this->password, PASSWORD_DEFAULT);

        $query->execute(['email'=> $this->email, 'login' => $this->login, 'password'=>$pass]);

        $this->setCookie($this->login);
    }

    /*public function getUserEmail() {
        $login = $_COOKIE['login'];
        $result = $this->_db->query("SELECT * FROM `users` WHERE login='$login'");
        return $result->fetch(PDO::FETCH_ASSOC);
    }*/

    public function logOut() {
        setcookie('login', $this->login, time() - 3600 * 24 * 14, '/');
        unset($_COOKIE['login']);
        header('Location: /user/auth');
    }

    public function auth($login, $password) {
        $result = $this->_db->query("SELECT * FROM `users` WHERE login='$login'");
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if($user['login'] == '')
            return "Пользователя с таким логином не существует";
        else if(password_verify($password, $user['password']))
            $this->setCookie($login);
        else
            return "Пароли не совпадают";


    }

    public function setCookie($login) {

        setcookie('login', $login, time() + 3600 * 24 * 14, '/');
        header('Location: /user/profile');
    }




}