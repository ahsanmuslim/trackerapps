<?php

use Teckindo\TrackerApps\App\Database;

class Kendaraan 
{
    private $table = "kendaraan";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Get data Kendaraan All
	public function getKendaraanAll()
	{
        $query = 'SELECT * FROM kendaraan ORDER BY jam DESC';
		$this->db->query ($query); 
		return $this->db->resultSet();
	}

    //get detail info mobil
    public function getMobilInfo($id_mobil)
	{
        $query = 'SELECT * FROM '. $this->table . ' WHERE id_mobil=:id_mobil';
		$this->db->query ($query); 
		$this->db->bind ( 'id_mobil', $id_mobil );
		return $this->db->single();
	}
    
    //Update status lokasi Kendaraan setelah proses Scan
    public function updateStatus($data)
    {
        $query = 'UPDATE kendaraan SET status=:status, jam=:jam WHERE id_mobil=:id_mobil';
        $this->db->query ($query); 
        $this->db->bind ( 'status', $data['status'] );
        $this->db->bind ( 'jam', $data['jam'] );
        $this->db->bind ( 'id_mobil', $data['id_mobil'] );

        $this->db->execute();
        return $this->db->rowCount();
    }

    //simpan data kendaraan Baru 
    public function saveData()
    {
        $query = "INSERT INTO kendaraan	VALUES (:id_mobil, :no_polisi, :type, :tahun, NULL, NULL)";

		$this->db->query($query);
		$this->db->bind('id_mobil', $_POST['id_mobil']);
		$this->db->bind('type', $_POST['type']);
		$this->db->bind('no_polisi', $_POST['nopol']);
		$this->db->bind('tahun', $_POST['tahun']);

		$this->db->execute();
		return $this->db->rowCount();
    }

    //Update data Mobil
    public function updateData($data)
    {
        $query = 'UPDATE kendaraan SET no_polisi=:no_polisi, type=:type, tahun=:tahun WHERE id_mobil=:id_mobil';
        $this->db->query ($query); 
        $this->db->bind ( 'no_polisi', $data['nopol'] );
        $this->db->bind ( 'type', $data['type'] );
        $this->db->bind ( 'tahun', $data['tahun'] );
        $this->db->bind ( 'id_mobil', $data['id_mobil'] );

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteData ($data): int
	{
		$query = " DELETE FROM kendaraan WHERE id_mobil =:id_mobil ";

		$this->db->query($query);
		$this->db->bind('id_mobil', $data['id_mobil']);
		$this->db->execute();

		return $this->db->rowCount();
	}


}