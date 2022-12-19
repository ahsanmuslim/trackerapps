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
}