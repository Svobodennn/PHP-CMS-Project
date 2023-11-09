<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelUser extends BaseModel
{
    public function editProfile($data)
    {
        extract($data);

        $user = $this->db->connect->prepare('update users set 
            users.name= :name,
            users.surname= :surname,
            users.mail= :mail
            where users.id= :id');

        $result = $user->execute([
            'name' => $userName,
            'surname' => $userSurname,
            'mail' => $userMail,
            'id' => Session::getSession('id')
        ]);

        if ($result) {
            Session::setSession('name', $userName);
            Session::setSession('surname', $userSurname);
            Session::setSession('mail', $userMail);
            return true;
        } else {
            return false;
        }
    }

    public function changePassword($data)
    {
        extract($data);

        $user = $this->db->connect->prepare('Select password from users where id= :id');
        $user->execute([
            'id' => Session::getSession('id')
        ]);

        $result = $user->fetch(\PDO::FETCH_ASSOC);


        if ($result['password'] != md5($password)) {
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Invalid Password';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $update = $this->db->connect->prepare('update users set password= :password where users.id= :id');
        $result = $update->execute([
            'password' => md5($newPassword),
            'id' => Session::getSession('id')
        ]);


        if ($result)
            return true;
        else
            return false;

    }
}