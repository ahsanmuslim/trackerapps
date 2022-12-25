<?php

use Teckindo\TrackerApps\App\Database;

class Role 
{
    private $db;
    private $table = 'role'
;
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

    public function getRoleInfo($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id =:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function checkRole($role)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE role =:role";
        $this->db->query($query); 
		$this->db->bind ( 'role', $role );

		return $this->db->numRow();
    }

    public function checkRoleAkses($id)
    {
        $query = "SELECT count(id) FROM user_acces WHERE role=:id";
        $this->db->query($query); 
		$this->db->bind ( 'id', $id );

		return $this->db->numRow();
    }

    public function saveData($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES (NULL, :role)";

        $this->db->query($query);
        $this->db->bind('role', $data['role']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateData($data)
    {
        $query = "UPDATE " . $this->table . " SET role =:role WHERE id =:id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('role', $data['role']);
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

    public function getAccessInfo($role, $controller)
    {
        $query = "SELECT user_acces.role AS id_role, role.role, user_acces.controller, create_data, update_data, delete_data, print_data, import_data
        FROM user_acces JOIN role ON role.id=user_acces.role 
        WHERE user_acces.role =:role AND user_acces.controller=:controller";

        $this->db->query($query);
        $this->db->bind('role', $role);
        $this->db->bind('controller', $controller);
        return $this->db->single();
    }

    public function updateAksesData($role, $controller, $count, $createlist, $updatelist, $deletelist, $printlist, $importlist)
    {
        $query = "DELETE FROM user_acces WHERE role =:role";
        $this->db->query($query);
        $this->db->bind('role', $role);
        $this->db->execute();

        for ($i = 0; $i < $count; $i++) {
            $query = "INSERT INTO user_acces (id, role, controller)  VALUES ( NULL, :role, :controller)";
            $this->db->query($query);
            $this->db->bind('role', $role);
            $this->db->bind('controller', $controller[$i]);
            $this->db->execute();
        }

        if (!empty($createlist)) {
            foreach ($createlist as $cl) :
                $query = "UPDATE user_acces SET 
                        create_data = 1
                        WHERE role =:role AND controller =:controller";
                $this->db->query($query);
                $this->db->bind('role', $role);
                $this->db->bind('controller', $cl);
                $this->db->execute();
            endforeach;
        }

        if (!empty($updatelist)) {
            foreach ($updatelist as $ul) :
                $query = "UPDATE user_acces SET 
                        update_data = 1
                        WHERE role =:role AND controller =:controller";
                $this->db->query($query);
                $this->db->bind('role', $role);
                $this->db->bind('controller', $ul);
                $this->db->execute();
            endforeach;
        }

        if (!empty($deletelist)) {
            foreach ($deletelist as $dl) :
                $query = "UPDATE user_acces SET 
                        delete_data = 1
                        WHERE role =:role AND controller =:controller";
                $this->db->query($query);
                $this->db->bind('role', $role);
                $this->db->bind('controller', $dl);
                $this->db->execute();
            endforeach;
        }

        if (!empty($printlist)) {
            foreach ($printlist as $pl) :
                $query = "UPDATE user_acces SET 
                        print_data = 1
                        WHERE role =:role AND controller =:controller";
                $this->db->query($query);
                $this->db->bind('role', $role);
                $this->db->bind('controller', $pl);
                $this->db->execute();
            endforeach;
        }

        if (!empty($importlist)) {
            foreach ($importlist as $il) :
                $query = "UPDATE user_acces SET 
                        import_data = 1
                        WHERE role =:role AND controller =:controller";
                $this->db->query($query);
                $this->db->bind('role', $role);
                $this->db->bind('controller', $il);
                $this->db->execute();
            endforeach;
        }


        return $this->db->rowCount();
    }

}