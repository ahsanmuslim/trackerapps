<?php

use Teckindo\TrackerApps\App\Database;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

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
        $query = "SELECT * FROM " . $this->table . " ORDER BY jam DESC";
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
    
    //check QR Validasi QR 
    public function checkQR($id_mobil)
    {
        $query = "SELECT count(id_mobil) FROM " . $this->table . " WHERE id_mobil=:id_mobil";
        $this->db->query($query);
        $this->db->bind ( 'id_mobil', $id_mobil );
        return $this->db->numRow();
    }
    
    //Update status lokasi Kendaraan setelah proses Scan
    public function updateStatus($data)
    {
        $query = "UPDATE " . $this->table . " SET status=:status, jam=:jam, km=:km WHERE id_mobil=:id_mobil";
        $this->db->query ($query); 
        $this->db->bind ( 'status', $data['status'] );
        $this->db->bind ( 'jam', $data['jam'] );
        $this->db->bind ( 'id_mobil', $data['id_mobil'] );
        $this->db->bind ( 'km', $data['km'] );

        $this->db->execute();
        return $this->db->rowCount();
    }

    //simpan data kendaraan Baru 
    public function saveData()
    {

        $query = "INSERT INTO " . $this->table . "	VALUES (:id_mobil, :no_polisi, :no_stnk, :nama_stnk, :no_mesin, :no_rangka,  :type, :merk, :jenis, :model, :tahun, :cc, :warna, :lokasi, :bbm, :masa_berlaku, :operasional, :dept, :masa_pakai,  NULL, NULL, NULL)";

		$this->db->query($query);
		$this->db->bind('id_mobil', $_POST['id_mobil']);
		$this->db->bind('no_polisi', $_POST['nopol']);
		$this->db->bind('no_stnk', $_POST['nostnk']);
		$this->db->bind('nama_stnk', $_POST['namastnk']);
		$this->db->bind('no_mesin', $_POST['nomesin']);
		$this->db->bind('no_rangka', $_POST['norangka']);
		$this->db->bind('type', $_POST['type']);
		$this->db->bind('merk', $_POST['merk']);
		$this->db->bind('jenis', $_POST['jenis']);
		$this->db->bind('model', $_POST['model']);
		$this->db->bind('tahun', $_POST['tahun']);
		$this->db->bind('cc', $_POST['cc']);
		$this->db->bind('warna', $_POST['warna']);
		$this->db->bind('lokasi', $_POST['lokasi']);
		$this->db->bind('bbm', $_POST['bbm']);
		$this->db->bind('masa_berlaku', $_POST['masaberlaku']);
		$this->db->bind('operasional', $_POST['operasional']);
		$this->db->bind('dept', $_POST['dept']);
		$this->db->bind('masa_pakai', $_POST['masapakai']);

		$this->db->execute();
		return $this->db->rowCount();
    }

    //Update data Mobil
    public function updateData($data)
    {
        $query = "UPDATE " . $this->table . " 
        SET no_polisi=:no_polisi, no_stnk=:no_stnk, nama_stnk=:nama_stnk, no_mesin=:no_mesin, no_rangka=:no_rangka,  type=:type, merk=:merk, jenis=:jenis, model=:model, tahun=:tahun, cc=:cc, warna=:warna, lokasi=:lokasi, bbm=:bbm, masa_berlaku=:masa_berlaku, operasional=:operasional, dept=:dept, masa_pakai=:masa_pakai 
        WHERE id_mobil=:id_mobil";

        $this->db->query ($query); 
		$this->db->bind('id_mobil', $_POST['id_mobil']);
		$this->db->bind('no_polisi', $_POST['nopol']);
		$this->db->bind('no_stnk', $_POST['nostnk']);
		$this->db->bind('nama_stnk', $_POST['namastnk']);
		$this->db->bind('no_mesin', $_POST['nomesin']);
		$this->db->bind('no_rangka', $_POST['norangka']);
		$this->db->bind('type', $_POST['type']);
		$this->db->bind('merk', $_POST['merk']);
		$this->db->bind('jenis', $_POST['jenis']);
		$this->db->bind('model', $_POST['model']);
		$this->db->bind('tahun', $_POST['tahun']);
		$this->db->bind('cc', $_POST['cc']);
		$this->db->bind('warna', $_POST['warna']);
		$this->db->bind('lokasi', $_POST['lokasi']);
		$this->db->bind('bbm', $_POST['bbm']);
		$this->db->bind('masa_berlaku', $_POST['masaberlaku']);
		$this->db->bind('operasional', $_POST['operasional']);
		$this->db->bind('dept', $_POST['dept']);
		$this->db->bind('masa_pakai', $_POST['masapakai']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteData ($data): int
	{
		$query = " DELETE FROM " . $this->table . " WHERE id_mobil =:id_mobil ";

		$this->db->query($query);
		$this->db->bind('id_mobil', $data['id_mobil']);
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

        $query_data = "INSERT INTO " . $this->table . " VALUES ";

        for ($i=2 ; $i <= count($all_data) ; $i++){
            $id_mobil = bin2hex(random_bytes(16));
            $no_polisi = $all_data [$i]['B'];
            $no_stnk = $all_data [$i]['C'];
            $nama_stnk = $all_data [$i]['D'];
            $no_mesin = $all_data [$i]['E'];
            $no_rangka = $all_data [$i]['F'];
            $type = $all_data [$i]['G'];
            $merk = $all_data [$i]['H'];
            $jenis = $all_data [$i]['I'];
            $model = $all_data [$i]['J'];
            $tahun = $all_data [$i]['K'];
            $cc = $all_data [$i]['L'];
            $warna = $all_data [$i]['M'];
            $lokasi = $all_data [$i]['N'];
            $bbm = $all_data [$i]['O'];
            $masa_berlaku = $all_data [$i]['P'];
            $operasional = $all_data [$i]['Q'];
            $dept = $all_data [$i]['R'];
            $masa_pakai = $all_data [$i]['S'];
            $km = $all_data [$i]['T'];


            $query_data .= "('$id_mobil', '$no_polisi', '$no_stnk', '$nama_stnk', '$no_mesin', '$no_rangka',  '$type', '$merk', '$jenis', '$model', '$tahun', '$cc', '$warna', '$lokasi', '$bbm', '$masa_berlaku', '$operasional', '$dept', '$masa_pakai',  '$km', NULL, NULL, '$create_by'),";
        }

        $query_data = substr ($query_data, 0, -1);

        $this->db->query($query_data);
        $this->db->execute();

        return $this->db->rowCount();
        unlink($target_file);
    }


}