<?php

use Teckindo\TrackerApps\App\Database;

class Divisi 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Ambil semu data divisi
    public function getDivisiAll()
    {
        $query = "SELECT * FROM divisi";

		$this->db->query($query);
		return $this->db->resultSet();
    }

	//get alias Divisi
	public function getAliasDivisi($id_divisi)
	{
		$query = "SELECT alias FROM divisi WHERE id_divisi=:id_divisi";

		$this->db->query($query);
		$this->db->bind('id_divisi', $id_divisi);
		return $this->db->Single();
	}

}