<?php

namespace App\Controllers;

use App\Model\ModelAuth;
use Core\BaseController;
use Core\Session;

class Auth extends BaseController
{
    public function Index(){

        $data['form_link'] = _link('login');
        echo $this->view->load('auth/index',$data);
    }
    public function Login(){
        $data = $this->request->post();

        if (!$data['mail']){
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Please enter a valid mail';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if (!$data['password']){
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Please enter a valid password';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $model = new ModelAuth();
        $result = $model->userLogin($data);


        if ($result){
            $status = 'success';
            $title = 'Yay!';
            $msg = 'Signed in';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link()]);
            exit();
        } else {
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Incorrect Mail or Password, Please Try Again.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }
    public function Logout(){
        Session::removeSession();
        redirect('login');
    }

}