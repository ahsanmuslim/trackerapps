<?php

use Teckindo\TrackerApps\App\Database;

class Role 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function countAccess($role, $controller)
    {
        $query = "SELECT user_acces.role, role.role, user_acces.controller, controller.nama_controller FROM user_acces 
        JOIN controller ON controller.id=user_acces.controller 
        JOIN role ON role.id=user_acces.role 
        WHERE user_acces.role =:role AND controller.nama_controller =:controller";
        $this->db->query($query);
        $this->db->bind('role', $role);
        $this->db->bind('controller', $controller);
        $this->db->execute();

        return $this->db->rowCount();
    }

}