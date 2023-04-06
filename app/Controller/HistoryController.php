<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;
use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Services\Security;

class HistoryController extends Controller
{
    public function index()
    {
        $data['userlogin'] = $this->model('User')->getUser();
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - History';
        if($data['userlogin']['role'] == 1){
            $data['history'] = $this->model('Transaksi')->getAllTransUser();
        } else {
            $data['history'] =  $this->model('Transaksi')->getTransToday();
        }
        $this->view('Templates/header', $data);
        $this->view('History/index', $data);
        $this->view('Templates/footer');
    }

    public function edit($nomor)
    {
        $data['userlogin'] = $this->model('User')->getUser();
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['transaksi'] = $this->model('Transaksi')->getTransaksiByNomor($nomor);
        $data['title'] = 'Tracker Apps - History';
        $this->view('Templates/header', $data);
        $this->view('History/edit', $data);
        $this->view('Templates/footer');
    }

    public function update()
    {
        $respon = Security::verifyToken($_POST);
        // var_dump($_POST);
		if($respon['type']){
            $transaksi = $this->model('Transaksi')->updateData($_POST);
            if($transaksi){
				Flasher::setFlash('berhasil', 'diupdate', 'success','' , '');
				header ('Location: ' . BASEURL . '/history' );
				exit;
			} else {
				Flasher::setFlash('gagal', 'disimpan', 'danger','' ,'');
				header ('Location: ' . BASEURL . '/history' );
				exit;
			}
		} else {
			Flasher::setFlash($respon['message'], '', 'danger', '', '');
			header ('Location: ' . BASEURL . '/history' );
			exit;
		}
    }
}