<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;
use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Services\Security;

class OperatorController extends Controller
{
    private $userlogin;

    public function __construct()
    {
        $this->userlogin = $this->model('User')->getUser();
    }
    public function index()
    {
        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - Report';
        $data['operator'] = $this->model('Operator')->getOperatorAll();
        $this->view('Templates/header', $data);
        $this->view('Operator/index', $data);
        $this->view('Templates/footer');
    }

    public function add()
    {
        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - User';
        $data['role'] = $this->model('Role')->getRoleAll();
        $this->view('Templates/header', $data);
        $this->view('Operator/add', $data);
        $this->view('Templates/footer');
    }

    public function save()
    {
        if ($this->model('Operator')->saveData($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'operator', '');
            header('Location: ' . BASEURL . '/operator');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'operator', '');
            header('Location: ' . BASEURL . '/operator');
            exit;
        }
    }

    public function edit($id)
    {
        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['operator'] = $this->model('Operator')->getOperatorInfo($id);
        $data['title'] = 'Tracker Apps - User';
        $this->view('Templates/header', $data);
        $this->view('Operator/edit', $data);
        $this->view('Templates/footer');
    }

    public function update()
    {
        if ($this->model('Operator')->updateData($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diupdate', 'success', 'operator', '');
            header('Location: ' . BASEURL . '/operator');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diupdate', 'danger', 'operator', '');
            header('Location: ' . BASEURL . '/operator');
            exit;
        }
    }

    public function delete()
    {
		$respon = Security::verifyToken($_POST);
		if($respon['type']){
            if( $this->model('Operator')->deleteData($_POST) > 0 ){
				header ('Location: ' . BASEURL . '/operator' );
				exit;
			} else {
				Flasher::setFlash('gagal', 'dihapus', 'danger', '', '');
				header ('Location: ' . BASEURL . '/operator' );
				exit;
			}
		} else {
			Flasher::setFlash($respon['message'], '', 'danger', '', '');
			header ('Location: ' . BASEURL . '/operator' );
			exit;
		}
    }
    
}