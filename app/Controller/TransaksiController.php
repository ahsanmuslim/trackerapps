<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;
use Teckindo\TrackerApps\Helper\AutoNumber;
use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Helper\Validation;
use Teckindo\TrackerApps\Services\Security;

class TransaksiController extends Controller
{
    protected $userlogin;

    public function __construct()
    {
        $this->userlogin = $this->model('User')->getUser();
    }

    public function scannerIN()
    {
        $data['title'] = "Tracker App - Scanning";
        $data['userlogin'] = $this->model('User')->getUser();
        $this->view('Templates/header', $data);
        $this->view('Transaksi/scan-in', $data);
        $this->view('Templates/footer-scanner');
    }
    
    public function scanningIN()
    {
        $data['mobil'] = $this->model('Kendaraan')->getMobilInfo($_POST['id_mobil']);
        $data['last'] = $this->model('Transaksi')->getLastStatus($_POST['id_mobil']);
        $data['sopir'] = $this->model('Operator')->getSopir();
        $data['kenek'] = $this->model('Operator')->getKenek();
        $data['divisi'] = $this->model('Divisi')->getDivisiAll();
        $validation = new Validation();
        $check = $validation->cekStatus($_POST['id_mobil'], "IN");
        if($check){
            $this->view('Transaksi/error', $data);
        } else {
            $this->view('Transaksi/hasilscan-in', $data );
        }
    }

    public function scannerOUT()
    {
        $data['title'] = "Tracker App - Scanning";
        $data['userlogin'] = $this->model('User')->getUser();
        $this->view('Templates/header', $data);
        $this->view('Transaksi/scan-out', $data);
        $this->view('Templates/footer-scanner');
    }
    
    public function scanningOUT()
    {
        $data['mobil'] = $this->model('Kendaraan')->getMobilInfo($_POST['id_mobil']);
        $data['last'] = $this->model('Transaksi')->getLastStatus($_POST['id_mobil']);
        $data['sopir'] = $this->model('Operator')->getSopir();
        $data['kenek'] = $this->model('Operator')->getKenek();
        $data['divisi'] = $this->model('Divisi')->getDivisiAll();
        $validation = new Validation();
        $check = $validation->cekStatus($_POST['id_mobil'], "OUT");
        if($check){
            $this->view('Transaksi/error', $data);
        } else {
            $this->view('Transaksi/hasilscan-out', $data );
        }
    }
    
    public function save()
    {
        $respon = Security::verifyToken($_POST);
        $auto = new AutoNumber();
        $nomor = $auto->autonum($_POST['id_mobil'], $_POST['divisi']);
        $id_user = $this->userlogin['id_user'];

		if($respon['type']){
            $trans1 = $this->model('Transaksi')->tambahData($_POST, $nomor, $id_user);
            $trans2 = $this->model('Kendaraan')->updateStatus($_POST);
            if($trans1 > 0 && $trans2 > 0){
				Flasher::setFlash('berhasil', 'disimpan', 'success','' , '');
				header ('Location: ' . BASEURL . '/home' );
				exit;
			} else {
				Flasher::setFlash('gagal', 'disimpan', 'danger','' ,'');
				header ('Location: ' . BASEURL . '/home' );
				exit;
			}
		} else {
			Flasher::setFlash($respon['message'], '', 'danger', '', '');
			header ('Location: ' . BASEURL . '/home' );
			exit;
		}
    }

}