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

    public function addShorter() {
        $data = [];
        $sql = 'INSERT INTO links(owner, link, keyword) VALUES(:owner, :link, :keyword)';
        $query = $this->_db->prepare($sql);

        $login = $_COOKIE['login'];
        $result = $this->_db->query("SELECT `id` FROM `users` WHERE login='$login'");
        $data = $result->fetch(PDO::FETCH_ASSOC);
        $owner = $data['id'];

        $query->execute(['owner'=> $owner, 'link' =>$this->link, 'keyword'=>$this->keyword]);

    }
}