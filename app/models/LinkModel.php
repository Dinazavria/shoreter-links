<?php

class LinkModel
{
    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }
    public function redirect($param) {
        $url = 'localhost' . $param;
        //print_r($param);
        $result = $this->_db->query("SELECT link FROM `links` WHERE keyword='$url';");
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}