<?php


namespace app\models;


class AuthModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->db->connect_errno !== 0) {
            throw new \Exception('mysql error: ' . $this->db->connect_error);
        }
    }

    public function all()
    {
        $sql = "SELECT * FROM users;";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addUser($login, $pass, $email, $name, $date)
    {
        $sql = "INSERT INTO `users`( `login`, `pass`, `email`, `name`, `date`) 
                            VALUES ( '$login', '$pass', '$email', '$name', '$date');";
        $this->db->query($sql);
    }

    public function getUserAndPass($user)
    {
        $sql = "SELECT login, pass FROM `users` WHERE login = '$user';";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }


}