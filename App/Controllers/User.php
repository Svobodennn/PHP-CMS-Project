<?php

namespace App\Controllers;

use App\Model\ModelUser;
use Core\BaseController;
use Core\Session;

class User extends BaseController
{

    public function Index()
    {
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');

        $data['user'] = Session::getAllSession();

        echo $this->view->load('user/index',compact('data')); // ['data' => $data]
    }
    public function EditProfile()
    {
        $data = $this->request->post();

        if (!$data['userName']){
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Name can not be empty';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if (!$data['userSurname']){
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Surname can not be empty';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if (!$data['userMail']){
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Mail can not be empty';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $model = new ModelUser();
        $result = $model->editProfile($data);

        if ($result){
            $status = 'success';
            $title = 'Success!';
            $msg = 'Profile Updated';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        else{
            $status = 'error';
            $title = 'Oops!';
            $msg = 'An unexpected error occurred. Please refresh your page and try again.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }
    public function ChangePassword()
    {
        $data = $this->request->post();



        if (!$data['password']){
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Please Enter Your Password';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if (!$data['newPassword'] || !$data['newPasswordAgain']){
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Please Enter Your New Password';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        if ($data['newPassword'] != $data['newPasswordAgain']){
            $status = 'error';
            $title = 'Oops!';
            $msg = "New password doesn't match";
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $model = new ModelUser();
        $result = $model->changePassword($data);

        if ($result){
            $status = 'success';
            $title = 'Success!';
            $msg = 'Password Updated';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        else{
            $status = 'error';
            $title = 'Oops!';
            $msg = 'An unexpected error occurred. Please refresh your page and try again.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }

}