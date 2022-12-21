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
		$query = "SELECT * FROM operator WHERE jenis=:jenis";

		$this->db->query($query);
		$this->db->bind('jenis', "Sopir");
		return $this->db->resultSet();
	}
    
	//get data Kenek
	public function getKenek()
	{
		$query = "SELECT * FROM operator WHERE jenis=:jenis";

		$this->db->query($query);
		$this->db->bind('jenis', "Kenek");
		return $this->db->resultSet();
	}

	//Update status Sopir setelah proses Scan
	public function updateStatusSopir($data)
	{
		$query = 'UPDATE operator SET status=:status, jam=:jam WHERE nama=:sopir';
		$this->db->query ($query); 
		$this->db->bind ( 'status', $data['status'] );
		$this->db->bind ( 'jam', $data['jam'] );
		$this->db->bind ( 'sopir', $data['sopir'] );

		$this->db->execute();
		return $this->db->rowCount();
	}

	//Update status Kenek setelah proses Scan
	public function updateStatusKenek($data)
	{
		$query = 'UPDATE operator SET status=:status, jam=:jam WHERE nama=:kenek';
		$this->db->query ($query); 
		$this->db->bind ( 'status', $data['status'] );
		$this->db->bind ( 'jam', $data['jam'] );
		$this->db->bind ( 'kenek', $data['kenek'] );

		$this->db->execute();
		return $this->db->rowCount();
	}

}