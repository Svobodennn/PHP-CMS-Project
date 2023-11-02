<?php

namespace App\Controllers;

use Core\BaseController;
use Core\Session;

class Auth extends BaseController
{
    public function Index(){
        echo $this->view->load('auth/index');
    }
    public function Login(){
        $post = $this->request->post();

        print_r($post);
    }
    public function Logout(){
        Session::removeSession();
        redirect('login');
    }

}