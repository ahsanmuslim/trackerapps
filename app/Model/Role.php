<?php

use Teckindo\TrackerApps\App\Database;

class Role 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getRoleAll()
    {
        $query = "SELECT * FROM role";

		$this->db->query($query);
		return $this->db->resultSet();
    }

    public function countAccess($role, $controller)
    {
        $query = "SELECT user_acces.role, role.role, user_acces.controller, controller.url FROM user_acces 
        JOIN controller ON controller.id=user_acces.controller 
        JOIN role ON role.id=user_acces.role 
        WHERE user_acces.role =:role AND controller.url =:controller";
        $this->db->query($query);
        $this->db->bind('role', $role);
        $this->db->bind('controller', $controller);
        $this->db->execute();

        return $this->db->rowCount();
    }

}