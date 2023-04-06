<?php

use Teckindo\TrackerApps\App\Database;

class Transaksi 
{
    private $db;
	private $table = "transaksi";

    public function __construct()
    {
        $this->db = new Database();
    }

	//Fungsi tambah data Scan Out
	public function tambahData ($data, $nomor, $id_user, $perjalanan): int
	{
		$query = "INSERT INTO ". $this->table . "
		(nomor, id_mobil, tanggal, jam, km, sopir, kenek, divisi, keterangan, status, id_user, id_perjalanan) 	
		VALUES (:nomor, :id_mobil, :tanggal, :jam, :km, :sopir, :kenek, :divisi, :keterangan, :status, :id_user, :id_perjalanan)";

		$this->db->query($query);

		$this->db->bind('nomor', $nomor);
		$this->db->bind('id_mobil', $data['id_mobil']);
		$this->db->bind('tanggal', $data['tanggal']);
		$this->db->bind('jam', $data['jam']);
		$this->db->bind('km', $data['km']);
		$this->db->bind('sopir', $data['sopir']);
		$this->db->bind('kenek', $data['kenek']);
		$this->db->bind('divisi', $data['divisi']);
		$this->db->bind('status', $data['status']);
		$this->db->bind('id_user', $id_user);
		$this->db->bind('keterangan', $data['keterangan']);
		$this->db->bind('id_perjalanan', $perjalanan);

		$this->db->execute();
		return $this->db->rowCount();
	}

	//get nomor terakhir transaksi
	public function getLastTransaction($divisi)
	{
		$query = "SELECT nomor FROM ". $this->table . " WHERE divisi=:divisi AND YEAR(tanggal)=YEAR(curdate()) ORDER BY jam DESC LIMIT 1";

		$this->db->query($query);
		$this->db->bind('divisi', $divisi);
		return $this->db->Single();
	}

	//Get last status mobil
	public function getLastStatus($id_mobil)
	{
		$query = "SELECT * FROM ". $this->table . " WHERE id_mobil=:id_mobil ORDER BY jam DESC LIMIT 1";
		$this->db->query($query); 
		$this->db->bind ( 'id_mobil', $id_mobil );
		return $this->db->single();
	}

	//Get counter Scanner
	public function getCounterScan($id_user)
	{
		$query = "SELECT count(nomor) FROM ". $this->table . " WHERE id_user=:id_user";
		$this->db->query($query); 
		$this->db->bind ( 'id_user', $id_user );

		return $this->db->numRow();
	}

	//CHeck id user di table transaski
	public function checkTransUser($id_user)
	{
		$query = "SELECT nomor FROM ". $this->table . " WHERE id_user=:id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->execute();
        return $this->db->rowCount();
	}

	//CHeck id kendaraan di table transaski
	public function checkTransKendaraan($id_mobil)
	{
		$query = "SELECT nomor FROM ". $this->table . " WHERE id_mobil=:id_mobil";
		$this->db->query($query);
		$this->db->bind('id_mobil', $id_mobil);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function getTransUser($id_user)
	{
		$query = "SELECT b.no_polisi, b.type, a.status, a.jam, d.username  
        FROM ". $this->table . "  AS a 
        JOIN kendaraan AS b ON a.id_mobil=b.id_mobil
        JOIN user AS d ON a.id_user=d.id_user 
		WHERE a.id_user=:id_user
        ORDER BY a.jam DESC LIMIT 50";

		$this->db->query ($query); 
		$this->db->bind('id_user', $id_user);
		return $this->db->resultSet();
	}

	public function getTransToday()
	{
		$query = "SELECT b.no_polisi, b.type, a.status, a.jam, a.km, c.nama, a.keterangan, d.username, b.jenis, a.id_perjalanan   
        FROM ". $this->table . "  AS a 
        JOIN kendaraan AS b ON a.id_mobil=b.id_mobil
		JOIN operator AS c ON a.sopir=c.id 
        JOIN user AS d ON a.id_user=d.id_user 
		WHERE DATE(a.jam) = CURDATE()
        ORDER BY a.jam DESC";

		$this->db->query ($query); 
		return $this->db->resultSet();
	}

	public function getAllTransUser()
	{
		$query = "SELECT b.no_polisi, b.type, a.status, a.jam, a.km, c.nama, a.keterangan, d.username, b.jenis, a.id_perjalanan  
        FROM ". $this->table . "  AS a 
        JOIN kendaraan AS b ON a.id_mobil=b.id_mobil
		JOIN operator AS c ON a.sopir=c.id 
        JOIN user AS d ON a.id_user=d.id_user 
        ORDER BY a.jam DESC LIMIT 100";

		$this->db->query ($query); 
		return $this->db->resultSet();
	}

	public function getTransaksiByNomor($nomor)
	{
		$query = "SELECT a.nomor, b.no_polisi, b.type, a.status, a.jam, a.km, c.nama, a.keterangan, d.username, b.jenis, a.id_perjalanan  
        FROM ". $this->table . "  AS a 
        JOIN kendaraan AS b ON a.id_mobil=b.id_mobil
		JOIN operator AS c ON a.sopir=c.id 
        JOIN user AS d ON a.id_user=d.id_user 
        WHERE a.nomor =:nomor";

		$this->db->query ($query); 
		$this->db->bind('nomor', $nomor);
		return $this->db->single();
	}

	public function updateData($data, $id_user)
	{
		$query = "UPDATE " . $this->table . " SET 
		km =:km, 
		jam =:jam,
		keterangan =:keterangan,
		updated_at = now(),
		updated_by =:id_user 
		WHERE nomor =:nomor";

		$this->db->query($query);
		$this->db->bind('nomor', $data['nomor']);
		$this->db->bind('km', $data['km']);
		$this->db->bind('jam', $data['jam']);
		$this->db->bind('keterangan', $data['keterangan']);
		$this->db->bind('id_user', $id_user);
		$this->db->execute();

		return $this->db->rowCount();
	}

}