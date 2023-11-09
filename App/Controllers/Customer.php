<?php

namespace App\Controllers;

use App\Model\ModelCustomer;
use App\Model\ModelProject;
use Core\BaseController;

class Customer extends BaseController
{
    public function Index()
    {
        $modelCustomer = new ModelCustomer();
        $data['customers'] = $modelCustomer->getCustomers();

        $modelProject = new ModelProject();
        $data['projects'] = $modelProject->getProjects();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('customer/index',compact('data')); // ['data' => $data]
    }
    public function Add()
    {
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        echo $this->view->load('customer/add',compact('data')); // ['data' => $data]
    }
    public function AddCustomer()
    {
        $data = $this->request->post();

        if (!$data['customerName'] || !$data['customerSurname']){
            $status = 'error';
            $title = 'Oops!';
            $msg = "Please enter customer's name and surname";
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $model = new ModelCustomer();
        $result = $model->addCustomer($data);

        if ($result){
            $status = 'success';
            $title = 'Yay!';
            $msg = 'Customer added';
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
    public function RemoveCustomer()
    {
        $data = $this->request->post();

        if (!$data['customerId']){
            $status = 'error';
            $title = 'Oops!';
            $msg = "Couldn't find Customer Id. Please refresh the page";
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $result = $this->db->remove("Delete from customers where customers.id = '{$data['customerId']}'");


        if ($result){
            $status = 'success';
            $title = 'Yay!';
            $msg = 'Customer deleted';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'removed' => $data['customerId']]);
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
        $model = new ModelCustomer();
        $data['customer'] = $model->getCustomer($id);

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        echo $this->view->load('customer/edit',compact('data')); // ['data' => $data]
    }
    public function Detail($id)
    {

        $modelProject = new ModelProject();
        $data['projects'] = $modelProject->getProjectsByCustomerId($id);

        $model = new ModelCustomer();
        $data['customer'] = $model->getCustomer($id);

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        echo $this->view->load('customer/detail',compact('data')); // ['data' => $data]
    }

    public function EditCustomer()
    {
        $data = $this->request->post();

        if (!$data['customerId']){
            $status = 'error';
            $title = 'Oops!';
            $msg = "Couldn't find Customer Id. Please refresh the page";
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if (!$data['customerName'] || !$data['customerSurname']){
            $status = 'error';
            $title = 'Oops!';
            $msg = "Please enter customer's name and surname";
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $model = new ModelCustomer();
        $result = $model->editCustomer($data);

        if ($result){
            $status = 'success';
            $title = 'Yay!';
            $msg = 'Customer Edited';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link('customer')]);
            exit();
        } else {
            $status = 'error';
            $title = 'Oops!';
            $msg = 'Something went wrong';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }
    public function TakeNote($id)
    {
        $data = $this->request->post();
        $data['id']= $id;

        if (!$data['note']){
            $status = 'error';
            $title = 'Oops!';
            $msg = "Please enter your note first.";
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }


        $model = new ModelCustomer();
        $result = $model->editNote($data);

        if ($result){
            $status = 'success';
            $title = 'Yay!';
            $msg = 'Note Saved';
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
}