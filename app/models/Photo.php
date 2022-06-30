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

    public function add($path, $id){
        $sql = "INSERT INTO photos (path, user_id) values ('$path', {$id});";
        $this->db->query($sql);
        if($this->db->errno !== 0){
            throw new \Exception($this->db->error);
        }

    }

    public function getByUserId($id)
    {
        $sql = "SELECT * FROM photos WHERE user_id={$id};";
        $result = $this->db->query($sql);
        if($this->db->errno !== 0){
            throw new \Exception($this->db->error);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function delete($id){
        $sql = "DELETE FROM `photos` WHERE id={$id}";
        $this->db->query($sql);
        if($this->db->errno !== 0){
            throw new \Exception($this->db->error);
        }
    }
}