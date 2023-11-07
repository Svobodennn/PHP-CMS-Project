<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelProject extends BaseModel
{
    public function addProject($data)
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
    public function getProjects()
    {

        $data = $this->db->query('select * from projects', true);
        return $data;

    }
}