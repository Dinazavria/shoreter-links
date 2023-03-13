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

    public function validLinkForm($keyword) {
        $result = $this->_db->query("SELECT * FROM `links` WHERE keyword='$keyword'");
        $link = $result->fetch(PDO::FETCH_ASSOC);

        if($link['id'] != '')
            return 'Такое слово уже используется в базе';
        else if ($this->link == '')
            return "Вставьте ссылку";
        else if($this->keyword == '')
            return "Напишите короткое название";
        else
            return 'Сокращаем';

    }

    public function addShorter() {
            $sql = 'INSERT INTO links(owner, link, keyword) VALUES(:owner, :link, :keyword)';
            $query = $this->_db->prepare($sql);

            $owner = $this->getUserId();
            $keyword = '/s/' . $this->keyword;
            $query->execute(['owner' => $owner, 'link' => $this->link, 'keyword' => $keyword]);

    }

    public function getLinks() {
        $data = [];
        $owner = $this->getUserId();
        $result = $this->_db->query("SELECT * FROM `links` WHERE owner='$owner'");
        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getUserId() {
        $data = [];
        $login = $_COOKIE['login'];
        $result = $this->_db->query("SELECT `id` FROM `users` WHERE login='$login'");
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }

    public function deleteShorter($id) {
        $sql = "DELETE FROM `links` WHERE `links`.`id` = '$id' ;";
        $query = $this->_db->prepare($sql);
        $query->execute();
    }

}