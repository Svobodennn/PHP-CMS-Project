<?php

namespace App\Controllers;

use Core\BaseController;
use Core\Session;

class User extends BaseController
{

    public function showProfile(){
        $todos = $this->db->query('Select * from todos',true);

        print_r($todos);
    }
}