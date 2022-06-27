<?php

namespace app\models;

use app\core\AbstractModel;

class Photo extends AbstractModel
{
    public function all(){
        $sql = "SELECT * FROM photos";
        $result = $this->db->query($sql);
        //TODO error handling
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function add($path){
        $sql = "INSERT INTO photos (path) values ('$path');";
        $this->db->query($sql);

    }
}