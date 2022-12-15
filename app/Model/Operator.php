<?php

use Teckindo\TrackerApps\App\Database;

class Operator 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Ambil semu data divisi
    public function getOperatorAll()
    {
        $query = "SELECT * FROM operator";

		$this->db->query($query);
		$this->db->execute();
		return $this->db->resultSet();
    }

	//get data Sopir
	public function getSopir()
	{
		$query = "SELECT id, nama FROM operator WHERE jenis=:jenis";

		$this->db->query($query);
		$this->db->bind('jenis', "Sopir");
		return $this->db->resultSet();
	}
    
	//get data Kenek
	public function getKenek()
	{
		$query = "SELECT id, nama FROM operator WHERE jenis=:jenis";

		$this->db->query($query);
		$this->db->bind('jenis', "Kenek");
		return $this->db->resultSet();
	}

}