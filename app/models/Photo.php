<?php

namespace app\models;

use app\core\AbstractModel;

class Photo extends AbstractModel
{
    public function all(){
        $sql = "SELECT photos.id as id, photos.path as path, photos.user_id as user_id, photos.likes as likes, photos.created_at as created_at, users.login as user FROM photos INNER JOIN users ON photos.user_id = users.id ORDER BY photos.created_at DESC";
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
        $sql = "SELECT * FROM photos WHERE user_id={$id} ORDER BY photos.created_at DESC";
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

    public function addLike($userId, $photoId)
    {
        $sql = "INSERT INTO user_like (user_id, photo_id) values ({$userId}, {$photoId});";
        $this->db->query($sql);
        if($this->db->errno !== 0){
            throw new \Exception($this->db->error);
        }
    }

}