<?php


namespace app\models;


class PhotoModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new \mysqli(DB_HOST,DB_USER, DB_PASS, DB_NAME);
        if($this->db->connect_errno !== 0){
            throw new \Exception('mysql error: '. $this->db->connect_error);
        }
    }

    public function all()
    {
        $sql = "SELECT * FROM photos;";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function add($path)
    {
        $sql = "INSERT INTO photos(path) VALUES ('$path');";
        $this->db->query($sql);
    }

}
