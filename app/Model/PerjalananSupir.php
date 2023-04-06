<?php

use Teckindo\TrackerApps\App\DBFirman;


class PerjalananSupir
{
    private $dbf;

    public function __construct()
    {
        $this->dbf = new DBFirman();
    }

	public function updatePerjalananSupirIn($data)
	{
		$query = "UPDATE perjalanan_supir SET status_berangkat =:status_val, no_in =:no_in
		WHERE no_transaksi=:no_transaksi";

		$this->dbf->query($query);

		$this->dbf->bind('no_in', $data['nomor']);
		$this->dbf->bind('status_val', $data['status_val']);
		$this->dbf->bind('no_transaksi', $data['no_transaksi']);

		$this->dbf->execute();
		return $this->dbf->rowCount();
	}

	public function updatePerjalananSupirOut($data)
	{
		$query = "UPDATE perjalanan_supir SET status_berangkat =:status_val, no_out =:no_out
		WHERE no_transaksi =:no_transaksi";

		$this->dbf->query($query);

		$this->dbf->bind('no_out', $data['nomor']);
		$this->dbf->bind('status_val', $data['status_val']);
		$this->dbf->bind('no_transaksi', $data['no_transaksi']);

		$this->dbf->execute();
		return $this->dbf->rowCount();
	}

    //Cari data perjalanan Baru
    public function cekDataBaru($kd_driver, $kd_kendaraan, $status_berangkat)
	{
		$query = "SELECT count(no_transaksi) FROM perjalanan_supir WHERE kd_driver=:kd_driver AND kd_kendaraan=:kd_kendaraan AND status_berangkat=:status_berangkat";
		$this->dbf->query($query); 
		$this->dbf->bind('kd_driver', $kd_driver);
		$this->dbf->bind('kd_kendaraan', $kd_kendaraan);
		$this->dbf->bind('status_berangkat', $status_berangkat);

		return $this->dbf->numRow();
	}

	public function getDataPerjalananIn($kd_kendaraan, $kd_driver)
	{
        $query = "SELECT no_transaksi, tgl_entry, kd_kendaraan, no_in, no_out, status_berangkat FROM perjalanan_supir 
		WHERE kd_driver=:kd_driver AND kd_kendaraan=:kd_kendaraan ORDER BY tgl_entry DESC LIMIT 3";

		$this->dbf->query($query);
		$this->dbf->bind('kd_driver', $kd_driver);
		$this->dbf->bind('kd_kendaraan', $kd_kendaraan);
		return $this->dbf->resultSet();
	}

	public function getDataPerjalananOut($kd_driver, $kd_kendaraan)
	{
        $query = "SELECT no_transaksi, tgl_entry, kd_kendaraan, no_in, no_out, status_berangkat FROM perjalanan_supir 
		WHERE kd_driver=:kd_driver AND kd_kendaraan=:kd_kendaraan ORDER BY tgl_entry DESC LIMIT 3";

		$this->dbf->query($query);
		$this->dbf->bind('kd_driver', $kd_driver);
		$this->dbf->bind('kd_kendaraan', $kd_kendaraan);
		return $this->dbf->resultSet();
	}

	public function getDetailPerjalanan($nomor)
	{
		$query = "SELECT a.no_transaksi, a.tgl_entry, b.tujuan, b.keterangan, b.alamat FROM perjalanan_supir as a
		JOIN  perjalanan_supir_detil as b ON a.no_transaksi=b.no_transaksi 
		WHERE a.no_transaksi =:nomor";

		$this->dbf->query($query);
		$this->dbf->bind('nomor', $nomor);
		return $this->dbf->Single();
	}

	public function getDetailSuratJalan($nomor)
	{
		$query = "SELECT a.no_transaksi, b.kd_barangkeluar, b.jenis_kirim, b.tgl_kirim, b.tgl_picking, c.kd_barang, d.nama_barang, c.qty_kirim, b.no_salesorder 
		FROM perjalanan_supir_sj AS a JOIN barangkeluar AS b ON a.no_sj=b.kd_barangkeluar 
		JOIN detil_barangkeluar AS c ON b.kd_barangkeluar=c.kd_barangkeluar 
		JOIN barang AS d ON c.kd_barang=d.kd_barang 
		WHERE a.no_transaksi=:nomor";

		$this->dbf->query($query);
		$this->dbf->bind('nomor', $nomor);
		return $this->dbf->resultSet();
	}

}