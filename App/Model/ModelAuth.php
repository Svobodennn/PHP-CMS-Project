<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelAuth extends BaseModel
{
    public function userLogin($data){
        extract($data);
        $password = md5($password);
        $user = $this->db->query("Select * from users where users.mail = '$mail' and users.password= '$password'");
        if ($user){
            Session::setSession('login', true);
            Session::setSession('name',$user['name']);
            Session::setSession('surname',$user['surname']);
            Session::setSession('mail',$user['mail']);
            return true;
        } else {
            return false;
        }
    }
}