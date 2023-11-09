<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelHome extends BaseModel
{
    public function getEverything()
    {
        $data =
            ['total' =>
                $this->db->query('
                Select (Select count(c.id) from customers c) as customers,
               (Select count(p.id) from projects p) as projects,
               (Select count(u.id) from users u) as system_users') ?? [],

            'project' => $this->db->query('Select count(p.id) as total, status from projects p group by p.status', true) ?? [],


            ];
        return $data;
    }
}