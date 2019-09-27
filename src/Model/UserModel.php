<?php

namespace Model;

class UserModel extends \Core\Entity
{
    public function register()
    {
        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

        $orm = new \Core\ORM();
        $orm->create('users', ["email"=>$this->email, "password"=>$password_hash, "username" => $this->username]);
    }

    public function login()
    {
        $orm = new \Core\ORM();
        $info_email = $orm->find('users', ["WHERE" => "email='" . $this->email . "'"]);

        if(empty($info_email))
        {
            return ["error"=>true, "error_message"=>"Email inconnu"];
        }
        elseif(!password_verify($this->password, $info_email[0]["password"]))
        {
            return ["error"=>true, "error_message"=>"Mot de passe invalide"];
        }
        else
        {
            session_start();
            $_SESSION["id"] = $info_email[0]["id"];
            $_SESSION["username"] = $info_email[0]["username"];
            $_SESSION["email"] = $info_email[0]["email"];
            $_SESSION["password"] = $info_email[0]["password"];
            $_SESSION["firstname"] = $info_email[0]["firstname"];
            $_SESSION["lastname"] = $info_email[0]["lastname"];
            $_SESSION["birthdate"] = $info_email[0]["birthdate"];
            $_SESSION["city"] = $info_email[0]["city"];
            return ["error"=>false];
        }        
    }

    public function update()
    {
        $password_hash = $this->password;
        $orm = new \Core\ORM();
        $all_info_users = $orm->read('users', $_SESSION['id']);
        if($all_info_users[0]["password"] != $this->password)
        {
            $password_hash = password_hash($this->password, PASSWORD_DEFAULT);  
        }
        $user_update = $orm->update('users', $_SESSION["id"], ["email" => $this->email, "username" => $this->username, "firstname" => $this->firstname, "lastname" => $this->lastname, "birthdate" => $this->birthdate, "city" => $this->city, "password" => $password_hash]);
        $id = $_SESSION["id"];
        session_destroy();
        session_start();
        $info_user = $orm->read('users', $id);
        $_SESSION["id"] = $id;
        $_SESSION["username"] = $info_user[0]["username"];
        $_SESSION["email"] = $info_user[0]["email"];
        $_SESSION["password"] = $info_user[0]["password"];
        $_SESSION["firstname"] = $info_user[0]["firstname"];
        $_SESSION["lastname"] = $info_user[0]["lastname"];
        $_SESSION["birthdate"] = $info_user[0]["birthdate"];
        $_SESSION["city"] = $info_user[0]["city"];
    }

    public function delete()
    {
        $orm = new \Core\ORM();
        $delete_user = $orm->delete('users', $_SESSION["id"]);
    }
}

?>