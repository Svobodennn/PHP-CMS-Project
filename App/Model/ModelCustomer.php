<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelCustomer extends BaseModel
{
    public function addCustomer($data)
    {
        extract($data);

        $user = $this->db->connect->prepare('Insert into customers 
            set customers.name= :name,
            customers.surname= :surname,
            customers.company= :company,
            customers.address= :address,
            customers.phone= :phone,
            customers.mail= :mail');

        $result = $user->execute([
            'name' => $customerName,
            'surname' => $customerSurname,
            'company' => $customerCompany,
            'address' => $customerAddress,
            'phone' => $customerPhone,
            'mail' => $customerMail
        ]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function editCustomer($data)
    {
        extract($data);

        $user = $this->db->connect->prepare('update customers set 
            customers.name= :name,
            customers.surname= :surname,
            customers.company= :company,
            customers.address= :address,
            customers.phone= :phone,
            customers.mail= :mail
            where customers.id= :id');

        $result = $user->execute([
            'name' => $customerName,
            'surname' => $customerSurname,
            'company' => $customerCompany,
            'address' => $customerAddress,
            'phone' => $customerPhone,
            'mail' => $customerMail,
            'id' => $customerId
        ]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function getCustomers()
    {
        $data = $this->db->query('select * from customers', true);
        return $data;
    }
    public function getCustomer($id)
    {
        $data = $this->db->query("select * from customers where customers.id='$id'", false);
        return $data;
    }
}