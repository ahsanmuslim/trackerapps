<?php

use Teckindo\TrackerApps\App\DBFirman;


class Barang 
{
    private $dbf;
    private $table = "barangkeluar";

    public function __construct()
    {
        $this->dbf = new DBFirman();
    }

    //Ambil semu data Barang keluar
    public function getBarangKeluarAll()
    {
        $query = "SELECT kd_barangkeluar, no_salesorder, tgl_picking, tgl_kirim, jenis_kirim, kd_expedisi, no_suratjalan, kd_driver FROM ". $this->table . " WHERE kd_driver = 'D03' and tgl_kirim = CURDATE() ORDER BY tgl_kirim DESC";

		$this->dbf->query($query);
		return $this->dbf->resultSet();
    }

    public function getBarangKeluarByDriver($id)
    {
        $query = "SELECT kd_barangkeluar, no_salesorder, tgl_picking, tgl_kirim, jenis_kirim, kd_expedisi, no_suratjalan, kd_driver FROM ". $this->table . " WHERE kd_driver = '". $id ."' and tgl_kirim = CURDATE() ORDER BY tgl_kirim DESC";

		$this->dbf->query($query);
		return $this->dbf->resultSet();
    }

}