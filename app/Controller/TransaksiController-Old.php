<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;
use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Helper\AutoNumber;
use Teckindo\TrackerApps\Helper\Validation;
use Teckindo\TrackerApps\Services\Security;
use Teckindo\TrackerApps\Helper\ApiRequestResponse;

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
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $this->view('Templates/header', $data);
        $this->view('Transaksi/scan-in', $data);
        $this->view('Templates/footer-scanner');
    }
    
    public function scanningINWeb()
    {
        $data['mobil'] = $this->model('Kendaraan')->getMobilInfo($_POST['id_mobil']);
        $data['last'] = $this->model('Transaksi')->getLastStatus($_POST['id_mobil']);
        $data['sopir'] = $this->model('Operator')->getOperatorAll();
        $data['kenek'] = $this->model('Operator')->getOperatorAll();
        $data['divisi'] = $this->model('Divisi')->getDivisiAll();
        $data['perjalanan'] = $this->model('PerjalananSupir')->getDataPerjalananIn($data['mobil']['no_polisi'], $data['last']['sopir']);
        var_dump($data['perjalanan']);
        $validation = new Validation();
        $check = $validation->cekStatus($_POST['id_mobil'], "IN");
        if($check){
            $this->view('Transaksi/error', $data);
        } else {
            $this->view('Transaksi/hasilscan-in', $data );
        }
    }

    public function scanningINAndroid($id_mobil)
    {
        $data['title'] = "Tracker App - Scanning";
        $data['userlogin'] = $this->model('User')->getUser();
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['mobil'] = $this->model('Kendaraan')->getMobilInfo($id_mobil); // Scanner Android
        $data['last'] = $this->model('Transaksi')->getLastStatus($id_mobil); // Scanner Android
        $data['sopir'] = $this->model('Operator')->getOperatorAll();
        $data['kenek'] = $this->model('Operator')->getOperatorAll();
        $data['divisi'] = $this->model('Divisi')->getDivisiAll();
        $validation = new Validation();
        $check = $validation->cekStatus($id_mobil, "IN");
        if($check){
            $this->view('Templates/header', $data);
            $this->view('Transaksi/error', $data);
            $this->view('Templates/footer-scanner');
        } else {
            $this->view('Templates/header', $data);
            $this->view('Transaksi/hasilscan-in', $data );
            $this->view('Templates/footer-scanner');
        }
    }

    public function scannerOUT()
    {
        $data['title'] = "Tracker App - Scanning";
        $data['userlogin'] = $this->model('User')->getUser();
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $this->view('Templates/header', $data);
        $this->view('Transaksi/scan-out', $data);
        $this->view('Templates/footer-scanner');
    }
    
    public function scanningOUTWeb()
    {
        $data['mobil'] = $this->model('Kendaraan')->getMobilInfo($_POST['id_mobil']);
        $data['last'] = $this->model('Transaksi')->getLastStatus($_POST['id_mobil']);
        $data['sopir'] = $this->model('Operator')->getOperatorAll();
        $data['kenek'] = $this->model('Operator')->getOperatorAll();
        $data['divisi'] = $this->model('Divisi')->getDivisiAll();
        $data['perjalanan'] = $this->model('PerjalananSupir')->getDataPerjalananOut($data['mobil']['no_polisi'], $data['last']['sopir']);
        var_dump($data['perjalanan']);
        $validation = new Validation();
        $check = $validation->cekStatus($_POST['id_mobil'], "OUT");
        if($check){
            $this->view('Transaksi/error', $data);
        } else {
            $this->view('Transaksi/hasilscan-out', $data );
        }
    }
    
    public function scanningOUTAndroid($id_mobil)
    {
        $data['title'] = "Tracker App - Scanning";
        $data['userlogin'] = $this->model('User')->getUser();
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['mobil'] = $this->model('Kendaraan')->getMobilInfo($id_mobil); // Scanner Android
        $data['last'] = $this->model('Transaksi')->getLastStatus($id_mobil); // Scanner Android
        $data['sopir'] = $this->model('Operator')->getOperatorAll();
        $data['kenek'] = $this->model('Operator')->getOperatorAll();
        $data['divisi'] = $this->model('Divisi')->getDivisiAll();
        $validation = new Validation();
        $check = $validation->cekStatus($id_mobil, "OUT");
        if($check){
            $this->view('Templates/header', $data);
            $this->view('Transaksi/error', $data);
            $this->view('Templates/footer-scanner');
        } else {
            $this->view('Templates/header', $data);
            $this->view('Transaksi/hasilscan-out', $data );
            $this->view('Templates/footer-scanner');
        }
    }

    public function save()
    {
        $id_user = $this->userlogin['id_user'];
        $alias = $this->userlogin['alias'];
        $respon = Security::verifyToken($_POST);
        $auto = new AutoNumber();
        $nomor = $auto->autonum($_POST['divisi'], $alias);

		if($respon['type']){
            
            $trans1 = $this->model('Transaksi')->tambahData($_POST, $nomor, $id_user);
            $trans2 = $this->model('Kendaraan')->updateStatus($_POST);
            $trans3 = $this->model('Operator')->updateStatusSopir($_POST);
            $this->model('Operator')->updateStatusKenek($_POST);
            //Update endpoint API perjalanan Driver
            
            $status_ref = 0; //OUT (Normal)
            $status_val = 1;
            if($_POST['status'] == 'IN'){
                //Cek data perjalanan Baru yang dibuat pada hari Berikutnya
                if($this->model('PerjalananSupir')->cekDataBaru($_POST['sopir'], $_POST['nopol'], 0) > 0) {
                    $status_ref = 0; //In (Jika driver tugas > 1 hari)
                    $status_val = 2;
                } else {
                    $status_ref = 1; //In (Normal)
                    $status_val = 2;
                }
            }

            $body = [
                "kd_driver" => $_POST['sopir'],
                "kd_kendaraan" => $_POST['nopol'],
                "nomor" => $nomor,
                "status_ref" => $status_ref,
                "status_val" => $status_val
            ];

            //Update perjalanan Driver
            if($_POST['sopir'] <> "D58") {
                if($_POST['status'] == 'IN'){
                    $this->model('PerjalananSupir')->updatePerjalananSupirIn($body);
                } else {
                    $this->model('PerjalananSupir')->updatePerjalananSupirOut($body);
                }
            }

            if($trans1 > 0 && $trans2 > 0 && $trans3 > 0){
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