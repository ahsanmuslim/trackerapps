<?php

use Teckindo\TrackerApps\App\Database;

class User 
{
    private $table = "user";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserAll()
    {
        $query = "SELECT * FROM user JOIN role ON role.id=user.role";

		$this->db->query($query);
		return $this->db->resultSet();
    }

    public function getUser()
    {
        $username = $_SESSION['username'];
        $query = "SELECT * FROM " .$this->table. " WHERE username =:username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function cekUserLogin(string $username, string $password)
    {
        $cekdata = "SELECT * FROM ".$this->table." WHERE username =:username AND password =:password ";
        $this->db->query($cekdata);

        $this->db->bind('username',$username);
        $this->db->bind('password',$password);

        $this->db->execute();
        return $this->db->single();
    }

    public function simpanJWT(string $jwt, string $username): void
    {
        $query = "UPDATE user SET jwt =:jwt WHERE username =:username";
        $this->db->query($query);

        $this->db->bind("username", $username);
        $this->db->bind("jwt", $jwt);
        $this->db->execute();
    }

    public function hapusJWT(): void
    {
        $username = $_SESSION['username'];
        $query = "UPDATE user SET jwt = NULL WHERE username =:username";
        $this->db->query($query);

        $this->db->bind("username", $username);
        $this->db->execute();
    }

    public function update($data, $nama_file)
    {
        $query = "UPDATE " . $this->table . " SET 
                    nama_user =:namauser,
                    profile =:profile
                    WHERE id_user =:id_user";

        $this->db->query($query);

        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('namauser', $data['namauser']);
        $this->db->bind('profile', $nama_file);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cekUsername()
    {
        $username = $_POST['username'];
        $query = "SELECT count(id_user) FROM " . $this->table . " WHERE username = '$username'";
        $this->db->query($query);
        return $this->db->numRow();
    }

    public function saveData($data)
    {
        $query = "INSERT INTO " . $this->table . " 
        VALUES  
        (NULL, :username, :namauser, :alias, :role, :password, NULL, 'default.jpg', NULL, :is_active, NULL)";

        $this->db->query($query);

        $this->db->bind('username', $data['username']);
        $this->db->bind('namauser', $data['namauser']);
        $this->db->bind('alias', $data['alias']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('password', SHA1($data['password']));
        $this->db->bind('is_active', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();
    }

}