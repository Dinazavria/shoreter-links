<?php

require 'DB.php';
class ShorterModel
{
    private $link;
    private $keyword;
    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function setData($link, $keyword) {
        $this->link = $link;
        $this->keyword = $keyword;
    }

    public function validForm() {
        $result = $this->_db->query("SELECT `keyword` FROM `links` WHERE keyword='$this->keyword'");
        $data = $result->fetch(PDO::FETCH_ASSOC);

        if ($this->link == '')
            return "Вставьте ссылку";
        else if($this->keyword == '')
            return "Напишите короткое название";
        else if($data != '')
            return "Такое сокращение уже существует";
        else
            return "Сокращаем...";

    }

    public function addShorter() {
        $sql = 'INSERT INTO links(owner, link, keyword) VALUES(:owner, :link, :keyword)';
        $query = $this->_db->prepare($sql);

        $owner = $this->getUserId();
        $keyword = '/s/'. $this->keyword;
        $query->execute(['owner'=> $owner, 'link' =>$this->link, 'keyword'=>$keyword]);

    }

    public function deleteShorter($id) {
        $sql = "DELETE * FROM `links` WHERE id = '$id'";
        $query = $this->_db->prepare($sql);
        if($query->execute())
            return "Удалено";
        else
            return "Что-то пошло не так";

        $this->view('/');
    }

    public function getLinks() {
        $data = [];
        $owner = $this->getUserId();
        $result = $this->_db->query("SELECT * FROM `links` WHERE owner='$owner'");
        $data =  $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getUserId() {
        $data = [];
        $login = $_COOKIE['login'];
        $result = $this->_db->query("SELECT `id` FROM `users` WHERE login='$login'");
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }

}