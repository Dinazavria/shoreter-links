<?php

require 'DB.php';
class LinkModel
{
    private $param;
    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function setData($param) {
        $this->param = $param;
    }
    public function redirect() {
        $url = 'localhost' . $this->param;
        $result = $this->_db->query("SELECT links FROM `links` WHERE keyword='$url';");
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}