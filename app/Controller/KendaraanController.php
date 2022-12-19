<?php
declare(strict_types=1);
namespace Teckindo\TrackerApps\Controller;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Teckindo\TrackerApps\App\Controller;
use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Services\Security;

class KendaraanController extends Controller
{
    protected $userlogin;

    public function __construct()
    {
        $this->userlogin = $this->model('User')->getUser();
    }
    
    public function index()
    {
        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - Kendaraan';
        $data['kendaraan'] = $this->model('Kendaraan')->getKendaraanAll();
        $this->view('Templates/header', $data);
        $this->view('Kendaraan/index', $data);
        $this->view('Templates/footer');
    }

    public function add()
    {
        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - Kendaraan';
        $this->view('Templates/header', $data);
        $this->view('Kendaraan/add', $data);
        $this->view('Templates/footer');
    }

    public function edit($id_mobil)
    {
        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['mobil'] = $this->model('Kendaraan')->getMobilInfo($id_mobil);
        $data['title'] = 'Tracker Apps - Kendaraan';
        $this->view('Templates/header', $data);
        $this->view('Kendaraan/edit', $data);
        $this->view('Templates/footer');
    }
    
    public function print($id_mobil)
    {
        $data['mobil'] = $this->model('Kendaraan')->getMobilInfo($id_mobil);
        $this->view('Kendaraan/print', $data);
    }

    public function detail()
    {
        $data['mobil'] = $this->model('Kendaraan')->getMobilInfo($_POST['id']);
        $this->view('Kendaraan/detail', $data);
    }
    public function save()
    {
        $respon = Security::verifyToken($_POST);
		if($respon['type']){
            $transaksi = $this->model('Kendaraan')->saveData($_POST);
            if($transaksi){
				Flasher::setFlash('berhasil', 'disimpan', 'success','' , '');
				header ('Location: ' . BASEURL . '/kendaraan' );
				exit;
			} else {
				Flasher::setFlash('gagal', 'disimpan', 'danger','' ,'');
				header ('Location: ' . BASEURL . '/kendaraan' );
				exit;
			}
		} else {
			Flasher::setFlash($respon['message'], '', 'danger', '', '');
			header ('Location: ' . BASEURL . '/kendaraan' );
			exit;
		}
    }

    public function update()
    {
        $respon = Security::verifyToken($_POST);
        // var_dump($_POST);
		if($respon['type']){
            $transaksi = $this->model('Kendaraan')->updateData($_POST);
            if($transaksi){
				Flasher::setFlash('berhasil', 'diupdate', 'success','' , '');
				header ('Location: ' . BASEURL . '/kendaraan' );
				exit;
			} else {
				Flasher::setFlash('gagal', 'disimpan', 'danger','' ,'');
				header ('Location: ' . BASEURL . '/kendaraan' );
				exit;
			}
		} else {
			Flasher::setFlash($respon['message'], '', 'danger', '', '');
			header ('Location: ' . BASEURL . '/kendaraan' );
			exit;
		}
    }

    public function getQRCode ()
	{
        $options = new QROptions(
        [
            'eccLevel' => QRCode::ECC_L,
            'outputType' => QRCode::OUTPUT_MARKUP_SVG,
            'version' => 5,
        ]
        );

        $qrcode = (new QRCode($options))->render($_POST['id']);
        echo '<img src="' . $qrcode . '" alt="qrcode" width="80%" id="qrcode">';
	}

    public function import ()
    {
        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - Kendaraan';
        $this->view('Templates/header', $data);
        $this->view('Kendaraan/import', $data);
        $this->view('Templates/footer');
    }

    public function importData ()
    {
        // var_dump($_FILES);
        if ( $this->model('Kendaraan')->importData() > 0 ){
            Flasher::setFlash('Berhasil', 'diimport', 'success', 'kendaraan', '');
            header ('Location: '. BASEURL . '/kendaraan');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diimport', 'danger','kendaraan', '');
            header ('Location: '. BASEURL . '/kendaraan');
            exit;
        }
    }

    public function download ()
    {
        header('Location: ' . BASEURL . '/file/sample/kendaraan.xlsx');
    }


}