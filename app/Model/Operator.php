<?php

use Teckindo\TrackerApps\App\Database;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Operator 
{
    private $db;
	private $table= "operator";

    public function __construct()
    {
        $this->db = new Database();
    }

    //Ambil semu data divisi
    public function getOperatorAll()
    {
        $query = "SELECT * FROM " .$this->table. "";

		$this->db->query($query);
		$this->db->execute();
		return $this->db->resultSet();
    }

	//get detail info User
	public function getOperatorInfo($id)
	{
		$query = "SELECT * FROM ". $this->table . " WHERE id=:id";
		$this->db->query ($query); 
		$this->db->bind ( 'id', $id );
		return $this->db->single();
	}

	//get data Sopir
	public function getSopir()
	{
		$query = "SELECT * FROM " .$this->table. " WHERE jenis=:jenis";

		$this->db->query($query);
		$this->db->bind('jenis', "Sopir");
		return $this->db->resultSet();
	}

	//get data Sopir Ready
	public function getSopirReady()
	{
		$query = "SELECT * FROM " .$this->table. " WHERE jenis=:jenis AND status=:status";

		$this->db->query($query);
		$this->db->bind('jenis', "Sopir");
		$this->db->bind('status', "IN");
		return $this->db->resultSet();
	}
		
    
	//get data Kenek
	public function getKenek()
	{
		$query = "SELECT * FROM " .$this->table. " WHERE jenis=:jenis";

		$this->db->query($query);
		$this->db->bind('jenis', "Kenek");
		return $this->db->resultSet();
	}

	//get data Kenek Ready
	public function getKenekReady()
	{
		$query = "SELECT * FROM " .$this->table. " WHERE jenis=:jenis AND status=:status";

		$this->db->query($query);
		$this->db->bind('jenis', "Kenek");
		$this->db->bind('status', "IN");
		return $this->db->resultSet();
	}

	//Update status Sopir setelah proses Scan
	public function updateStatusSopir($data)
	{
		$query = "UPDATE " .$this->table. " SET status=:status, jam=:jam WHERE nama=:sopir";
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
		$query = "UPDATE " .$this->table. " SET status=:status, jam=:jam WHERE nama=:kenek";
		$this->db->query ($query); 
		$this->db->bind ( 'status', $data['status'] );
		$this->db->bind ( 'jam', $data['jam'] );
		$this->db->bind ( 'kenek', $data['kenek'] );

		$this->db->execute();
		return $this->db->rowCount();
	}

	public function saveData($data)
    {
        $id = bin2hex(random_bytes(8));

        $query = "INSERT INTO " . $this->table . " 
        VALUES  
        (:id, :nama, :jenis, :ket, :is_active, :status, NULL)";

        $this->db->query($query);

        $this->db->bind('id', $id);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jenis', $data['jenis']);
        $this->db->bind('ket', $data['ket']);
        $this->db->bind('is_active', $data['status']);
        $this->db->bind('status', 'IN');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateData($data)
    {
        $query = "UPDATE " . $this->table . " SET 
                    nama =:nama,
                    jenis =:jenis,
                    keterangan =:ket,
					is_active =:is_active 
					WHERE id =:id";

        $this->db->query($query);

        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jenis', $data['jenis']);
        $this->db->bind('ket', $data['ket']);
        $this->db->bind('is_active', $data['status']);

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

		//Function untuk import data ke DB dari FIle Excel
		public function importData ($create_by)
		{
	
			$file           = basename($_FILES['file_import']['name']);
			$ekstensi       = explode(".",$file);
			$file_name      = "file-".round(microtime(true)).".".end($ekstensi);
			$sumber_file    = $_FILES['file_import']['tmp_name'];
	
			//masuk ke folder file tempfile dari file index.php
			$target_dir     = "file/";
			$target_file    = $target_dir.$file_name;
			$upload         = move_uploaded_file($sumber_file, $target_file);
	
			$reader = new Xlsx();
			$objek = $reader->load($target_file);
			$all_data = $objek->getActiveSheet()->toArray(null,true,true,true);
	
			// var_dump($all_data);
	
			$query_data = "INSERT INTO " . $this->table . " (id, nama, jenis, status, is_active, created_by) VALUES ";
	
			for ($i=2 ; $i <= count($all_data) ; $i++){
				$id = $all_data [$i]['A'];
				$nama = $all_data [$i]['B'];
				$jenis = $all_data [$i]['C'];
				$is_active = $all_data [$i]['D'];
				$status = $all_data [$i]['E'];
	
				$query_data .= "('$id', '$nama', '$jenis', '$status', '$is_active', '$create_by'),";
			}
	
			$query_data = substr ($query_data, 0, -1);
	
			$this->db->query($query_data);
			$this->db->execute();
	
			return $this->db->rowCount();
			unlink($target_file);
		}

}