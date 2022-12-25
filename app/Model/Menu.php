<?php

use Teckindo\TrackerApps\App\Database;

class Menu 
{
    private $db;
    private $table = 'controller';

    public function __construct()
    {
        $this->db = new Database();
    }

    //Ambil semu data Menu / Controller
    public function getMenuAll()
    {
        $query = "SELECT * FROM ". $this->table;

		$this->db->query($query);
		return $this->db->resultSet();
    }

    //Ambil semu data Menu / Controller yang Aktif
    public function getMenuAllActive()
    {
        $query = "SELECT id, title, url FROM ". $this->table . " WHERE is_active = 1";

		$this->db->query($query);
		return $this->db->resultSet();
    }

    //Ambil semu data Menu berdsarkan ID
    public function getMenuInfo($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
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

    public function checkMenuAkses($controller)
    {
        $query = "SELECT count(id) FROM user_acces WHERE controller=:controller";
        $this->db->query($query); 
		$this->db->bind ( 'controller', $controller );

		return $this->db->numRow();
    }

    public function saveData($data)
    {
        $query = "INSERT INTO " . $this->table . " 
        VALUES  
        (NULL, :title, :url, :icon, :is_menu, :is_active)";

        $this->db->query($query);

        $this->db->bind('title', $data['title']);
        $this->db->bind('url', $data['url']);
        $this->db->bind('icon', $data['icon']);
        $this->db->bind('is_menu', $data['is_menu']);
        $this->db->bind('is_active', $data['is_active']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateData($data)
    {
        $query = "UPDATE " . $this->table . " SET 
                    title =:title,
                    url =:url,
                    icon =:icon,
                    is_menu =:is_menu,
                    is_active =:is_active
					WHERE id =:id";

        $this->db->query($query);

        $this->db->bind('id', $data['id']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('url', $data['url']);
        $this->db->bind('icon', $data['icon']);
        $this->db->bind('is_menu', $data['is_menu']);
        $this->db->bind('is_active', $data['is_active']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteData ($data): int
	{
		$query = " DELETE FROM " . $this->table . " WHERE id =:id ";

		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->execute();

		return $this->db->rowCount();
	}


}