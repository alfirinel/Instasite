<?php


namespace app\models;


use app\core\AbstractModel;

class AuthModel extends AbstractModel
{
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