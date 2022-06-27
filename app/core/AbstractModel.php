<?php

namespace app\core;

class AbstractModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new \mysqli(DB_HOST, DB_USER,DB_PASS,DB_NAME);
        if($this->db->connect_errno !== 0){
            throw new \Exception('mysql error : '.$this->db->connect_error);
        }
    }
}