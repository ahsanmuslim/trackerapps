<?php

use Teckindo\TrackerApps\App\Database;

class Menu 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Ambil semu data Menu / Controller
    public function getMenuAll()
    {
        $query = "SELECT * FROM controller";

		$this->db->query($query);
		return $this->db->resultSet();
    }

    //Ambil semu data Menu berdsarkan ID
    public function getMenuByID()
    {
        $query = "SELECT * FROM controller";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    //Side menu user active
    public function getMenuActive($username)
    {
        $query = "SELECT DISTINCT a.title, a.url, a.icon, a.is_menu, c.role FROM controller AS a 
        join user_acces AS b ON a.id=b.controller 
        join role AS c ON b.role=c.id 
        join user AS d ON c.id=d.role  
        WHERE is_menu = 1 AND username=:username ORDER BY a.id";

		$this->db->query($query);
        $this->db->bind('username', $username);
		return $this->db->resultSet();
    }


}