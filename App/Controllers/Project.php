<?php

namespace App\Controllers;

use App\Model\ModelCustomer;
use Core\BaseController;

class Project extends BaseController
{
    public function Index()
    {
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        echo $this->view->load('project/index',compact('data')); // ['data' => $data]
    }
    public function Add()
    {
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        echo $this->view->load('project/add',compact('data')); // ['data' => $data]
    }

    public function AddProject()
    {
        $data = $this->request->post();

        if (!$data['projectName']){
            $status = 'error';
            $title = 'Oops!';
            $msg = "Please enter project name";
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $model = new ModelProject();
        $result = $model->addProject($data);

        if ($result){
            $status = 'success';
            $title = 'Yay!';
            $msg = 'Project added';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        } else {
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Something went wrong';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }

    public function Edit($id)
    {
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        echo $this->view->load('project/edit',compact('data')); // ['data' => $data]
    }
}