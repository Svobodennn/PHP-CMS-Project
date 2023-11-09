<?php

namespace App\Controllers;

use App\Model\ModelCustomer;
use App\Model\ModelHome;
use App\Model\ModelProject;
use Core\BaseController;

class Home extends BaseController
{
    public function index()
    {

        $model = new ModelHome();
        $data['total'] = $model->getEverything()['total'];
        $data['projects'] = $model->getEverything()['project'];

        $modelProject = new ModelProject();
        $data['projects_table'] = $modelProject->getProjectsByStatus('a');

        $modelCustomer = new ModelCustomer();
        $data['customers_table'] = $modelCustomer->getCustomers(5);

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        echo $this->view->load('home/index',compact('data')); // ['data' => $data]
    }
}