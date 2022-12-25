<?php

use Teckindo\TrackerApps\App\Database;

class Divisi 
{
    private $db;
    private $table = "divisi";

    public function __construct()
    {
        $this->db = new Database();
    }

    //Ambil semu data divisi
    public function getDivisiAll()
    {
        $query = "SELECT * FROM ". $this->table;

		$this->db->query($query);
		return $this->db->resultSet();
    }

	//get alias Divisi
	public function getAliasDivisi($id_divisi)
	{
		$query = "SELECT alias FROM ". $this->table ." WHERE id_divisi=:id_divisi";

		$this->db->query($query);
		$this->db->bind('id_divisi', $id_divisi);
		return $this->db->Single();
	}

    public function getDivisiInfo($id_divisi)
    {
        $query = "SELECT * FROM ". $this->table ." WHERE id_divisi=:id_divisi";

        $this->db->query($query);
		$this->db->bind('id_divisi', $id_divisi);
		return $this->db->Single();
    }

    public function saveData($data)
    {
        $query = "INSERT INTO " . $this->table . " 
        VALUES  
        (NULL, :nama_divisi, :alias)";

        $this->db->query($query);

        $this->db->bind('nama_divisi', $data['nama_divisi']);
        $this->db->bind('alias', $data['alias']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateData($data)
    {
        $query = "UPDATE " . $this->table . " SET 
                    nama_divisi =:nama_divisi,
                    alias =:alias
					WHERE id_divisi =:id_divisi";

        $this->db->query($query);

        $this->db->bind('id_divisi', $data['id_divisi']);
        $this->db->bind('nama_divisi', $data['nama_divisi']);
        $this->db->bind('alias', $data['alias']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteData ($data): int
	{
		$query = " DELETE FROM " . $this->table . " WHERE id_divisi =:id_divisi ";

		$this->db->query($query);
		$this->db->bind('id_divisi', $data['id_divisi']);
		$this->db->execute();

		return $this->db->rowCount();
	}

}