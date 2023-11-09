<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelProject extends BaseModel
{
    public function addProject($data)
    {
        extract($data);


        $user = $this->db->connect->prepare('Insert into projects 
            set projects.title= :title,
            projects.description= :description,
            projects.progress= :progress,
            projects.status= :status,
            projects.customer_id= :customer_id,
            projects.start_date= :start_date,
            projects.end_date= :end_date,
            projects.added_user= :added_user');

        $result = $user->execute([
            'title' => $projectTitle,
            'description' => $projectDetails,
            'progress' => $projectProgress,
            'status' => $projectStatus,
            'customer_id' => $customerId,
            'start_date' => $projectStartDate,
            'end_date' => $projectEndDate,
            'added_user' => Session::getSession('id')
        ]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function editProject($data)
    {
        extract($data);

        $user = $this->db->connect->prepare('update projects 
            set projects.title= :title,
            projects.description= :description,
            projects.progress= :progress,
            projects.status= :status,
            projects.customer_id= :customer_id,
            projects.start_date= :start_date,
            projects.end_date= :end_date
            where projects.id= :projectId');

        $result = $user->execute([
            'title' => $projectTitle,
            'description' => $projectDetails,
            'progress' => $projectProgress,
            'status' => $projectStatus,
            'customer_id' => $customerId,
            'start_date' => $projectStartDate,
            'end_date' => $projectEndDate,
            'projectId' => $projectId
        ]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getProjects()
    {
        $data = $this->db->query('select projects.*,c.name,c.surname from projects
        left join cms.customers c on c.id = projects.customer_id', true);
        return $data;
    }
    public function getProjectsByCustomerId($id)
    {
        $data = $this->db->query("select * from projects where projects.customer_id = '$id'", true);
        return $data;
    }
    public function getProject($id)
    {
        $data = $this->db->query("select * from projects where projects.id='$id'", false);
        return $data;
    }
}