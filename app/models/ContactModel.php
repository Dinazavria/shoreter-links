<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
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
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.example.ru';
            $mail->SMTPAuth = true;
            $mail->Username = 'example@mail.ru';
            $mail->Password = 'password';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom($this->email, $this->name);
            /*Указываем перечень адресов почты куда отсылаем сообщение*/
            $mail->addAddress('admin@shorter.ru', 'Команда Shorter');

            $mail->isHTML(true);
            $mail->Subject = 'Новое сообщение с сайта Короче';
            $mail->Body    = "Имя: " . $this->name . " Email: " . $this->email . " Сообщение: " . $this->message;
            $mail->AltBody = 'Новое сообщение с сайта Короче';
            $mail->send();
            return 'Сообщение успешно отправлено';

        } catch (Exception $e) {
            return 'При отправке сообщения произошла ошибка.';
        }

        $mail->clearAddresses();
    }
}