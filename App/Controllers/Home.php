<?php

namespace App\Controllers;

use Core\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        echo $this->view->load('home/index',compact('data')); // ['data' => $data]
    }
}