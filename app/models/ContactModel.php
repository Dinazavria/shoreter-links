<?php

class ContactModel {
    private $name;
    private $email;
    private $message;

    public function setData($name, $email, $message) {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public function validForm() {
        if(strlen($this->email) < 3)
            return "Email слишком короткий";
        else if(strlen($this->name) < 2)
            return "Имя слишком короткое";
        else if(strlen($this->message) < 10)
            return "Сообщение слишком короткое.";
        else
            return "Верно";
    }

    public function mail() {
        $to = "drsinenkova@gmail.com";
        $message = "Имя: " . $this->name . " Email: " . $this->email . " Сообщение: " . $this->message;

        $subject = "=?utf-8?B?".base64_encode("Сообщение с сайта Короче")."?=";
        $headers = "From: $this->email\r\nReply-to: $this->email\r\nContent-type: text/html; charset=utf-8\r\n";
        $success = mail($to, $subject, $message, $headers);

        if(!$success)
            return "Сообщение не отправлено";
        else
            return true;
    }
}