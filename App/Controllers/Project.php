<?php

namespace App\Controllers;

use App\Model\ModelCustomer;
use App\Model\ModelProject;
use Core\BaseController;

class Project extends BaseController
{
    public function Index()
    {
        $modelProject = new ModelProject();
        $data['projects'] = $modelProject->getProjects();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        echo $this->view->load('project/index',compact('data')); // ['data' => $data]
    }
    public function Add()
    {
        $model = new ModelCustomer();
        $data['customers'] = $model->getCustomers();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        echo $this->view->load('project/add',compact('data')); // ['data' => $data]
    }

    public function AddProject()
    {
        $data = $this->request->post();
        if (!$data['projectTitle']){
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

    public function RemoveProject()
    {
        $data = $this->request->post();

        if (!$data['projectId']){
            $status = 'error';
            $title = 'Oops!';
            $msg = "Couldn't find Project Id. Please refresh the page";
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $result = $this->db->remove("Delete from projects where projects.id = '{$data['projectId']}'");


        if ($result){
            $status = 'success';
            $title = 'Yay!';
            $msg = 'Project deleted';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'removed' => $data['projectId']]);
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
        $modelProject = new ModelProject();
        $data['project'] = $modelProject->getProject($id);

        $modelCustomer = new ModelCustomer();
        $data['customers'] = $modelCustomer->getCustomers();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        echo $this->view->load('project/edit',compact('data')); // ['data' => $data]
    }

    public function EditProject()
    {
        $data = $this->request->post();

        if (!$data['customerId']){
            $status = 'error';
            $title = 'Oops!';
            $msg = "Couldn't find Project Id. Please refresh the page";
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if (!$data['projectTitle'] || !$data['customerId']){
            $status = 'error';
            $title = 'Oops!';
            $msg = "Please enter customer and project title";
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $model = new ModelProject();
        $result = $model->editProject($data);

        if ($result){
            $status = 'success';
            $title = 'Yay!';
            $msg = 'Project Edited';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link('project')]);
            exit();
        } else {
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Something went wrong';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }

}