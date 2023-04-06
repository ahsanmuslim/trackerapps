<?php

use Teckindo\TrackerApps\App\Database;

class Report 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

	//Get last status mobil
	public function getReportAll()
	{
        $query = 'SELECT b.no_polisi, b.type, a.sopir, e.nama, a.kenek, c.nama_divisi, a.status, a.jam, a.km, a.id_perjalanan, a.keterangan, d.username  
        FROM transaksi AS a 
        JOIN kendaraan AS b ON a.id_mobil=b.id_mobil 
        JOIN divisi AS c ON a.divisi=c.id_divisi 
        JOIN user AS d ON a.id_user=d.id_user 
        JOIN operator as e ON a.sopir=e.id
        ORDER BY b.id_mobil ASC, a.jam DESC';

		$this->db->query ($query); 
		return $this->db->resultSet();
	}

    //Get data berdasarkan Tanggal
    public function getReportByDate()
	{
        $tglawal = $_POST['tglawal'];
        $tglakhir = $_POST['tglakhir'];

        $query = 'SELECT b.no_polisi, b.type, a.sopir, e.nama, a.kenek, c.nama_divisi, a.status, a.jam, a.km, a.id_perjalanan, a.keterangan, d.username  
        FROM transaksi AS a 
        JOIN kendaraan AS b ON a.id_mobil=b.id_mobil 
        JOIN divisi AS c ON a.divisi=c.id_divisi 
        JOIN user AS d ON a.id_user=d.id_user 
        JOIN operator as e ON a.sopir=e.id
        WHERE tanggal BETWEEN :tglawal AND :tglakhir
        ORDER BY b.id_mobil ASC, a.jam DESC';
		$this->db->query ($query); 
        $this->db->bind('tglawal', $tglawal);
        $this->db->bind('tglakhir', $tglakhir);

		return $this->db->resultSet();
	}

}