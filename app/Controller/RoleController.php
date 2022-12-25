<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;
use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Services\Security;

class RoleController extends Controller
{
    private $userlogin;

    public function __construct()
    {
        $this->userlogin = $this->model('User')->getUser();
    }
    public function index()
    {
        $data['userlogin'] = $this->userlogin;
        $data['title'] = 'Tracker Apps - Role';
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['role'] = $this->model('Role')->getRoleAll();
        $this->view('Templates/header', $data);
        $this->view('Role/index', $data);
        $this->view('Templates/footer');
    }

    public function akses($id_role)
    {
        $data['userlogin'] = $this->userlogin;
        $data['title'] = 'Tracker Apps - Role';
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['role'] = $this->model('Role')->getRoleInfo($id_role);
        $data['controller'] = $this->model('Menu')->getMenuAllActive();

        $akses = [];

        foreach ($data['controller'] as $ctr) {
            $aksesinfo = "";
            $aksesinfo = $this->model('Role')->getAccessInfo($id_role, $ctr['id']);

            if(! empty($aksesinfo)){
                $akses[] = [
                    "title" => $ctr['title'],
                    "url" => $ctr['url'],
                    "role" => $aksesinfo['id_role'],
                    "controller" => $aksesinfo['controller'],
                    "akses" => "1",
                    "create" => $aksesinfo['create_data'],
                    "update" => $aksesinfo['update_data'],
                    "delete" => $aksesinfo['delete_data'],
                    "print" => $aksesinfo['print_data'],
                    "import" => $aksesinfo['import_data'],
                ];
            } else {
                $akses[] = [
                    "title" => $ctr['title'],
                    "url" => $ctr['url'],
                    "role" => $id_role,
                    "controller" => $ctr['id'],
                    "akses" => "0",
                    "create" => "0",
                    "update" => "0",
                    "delete" => "0",
                    "print" => "0",
                    "import" => "0",
                ];
            }

        }
        $data['akses'] = $akses;

        $this->view('Templates/header', $data);
        $this->view('Role/akses', $data);
        $this->view('Templates/footer');
    }

    public function getEdit()
    {
        echo json_encode($this->model('Role')->getRoleInfo($_POST['id']));
    }

    public function save()
    {
        $respon = Security::verifyToken($_POST);
		if($respon['type']){
            if ($this->model('Role')->checkRole($_POST['role']) > 0) {
                Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'role', 'Role sudah ada');
                header('Location: ' . BASEURL . '/role');
                exit;
            } elseif ($this->model('Role')->saveData($_POST) > 0) {
                Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'role', '');
                header('Location: ' . BASEURL . '/role');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'role', '');
                header('Location: ' . BASEURL . '/role');
                exit;
            }
        } else {
            Flasher::setFlash($respon['message'], '', 'danger', '', '');
			header ('Location: ' . BASEURL . '/role' );
			exit;
        }
    }

    public function update()
    {
        $respon = Security::verifyToken($_POST);
		if($respon['type']){
            if ($this->model('Role')->updateData($_POST) > 0) {
                Flasher::setFlash('Berhasil', 'diupdate', 'success', 'role', '');
                header('Location: ' . BASEURL . '/role');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'diupdate', 'danger', 'role', '');
                header('Location: ' . BASEURL . '/role');
                exit;
            }
        } else {
            Flasher::setFlash($respon['message'], '', 'danger', '', '');
			header ('Location: ' . BASEURL . '/role' );
			exit;
        }
    }
    
    public function delete()
    {
        $respon = Security::verifyToken($_POST);
		if($respon['type']){
            if ($this->model('role')->checkRoleAkses($_POST['id']) > 0) {
                Flasher::setFlash('Tidak bisa', 'dihapus', 'danger', 'role', 'role sudah digunakan.');
                header('Location: ' . BASEURL . '/role');
                exit;
            } elseif( $this->model('role')->deleteData($_POST) > 0 ){
                Flasher::setFlash('Berhasil', 'dihapus', 'success', 'role', '');
				header ('Location: ' . BASEURL . '/role' );
				exit;
			} else {
				Flasher::setFlash('gagal', 'dihapus', 'danger', '', '');
				header ('Location: ' . BASEURL . '/role' );
				exit;
			}
		} else {
			Flasher::setFlash($respon['message'], '', 'danger', '', '');
			header ('Location: ' . BASEURL . '/role' );
			exit;
		}
    }

    public function updateAkses()
    {
        // var_dump($_POST);
        $id_role = $_POST['id_role'];
        $controller = $_POST['akseslist'];
        $count = count($_POST['akseslist']);
        //deklarasi variable cekbox create update delete
        $createlist = "";
        $updatelist = "";
        $deletelist = "";
        $printlist = "";
        $importlist = "";
        if (!empty($_POST['createlist'])) {
            $createlist = $_POST['createlist'];
        }
        if (!empty($_POST['updatelist'])) {
            $updatelist = $_POST['updatelist'];
        }
        if (!empty($_POST['deletelist'])) {
            $deletelist = $_POST['deletelist'];
        }
        if (!empty($_POST['printlist'])) {
            $printlist = $_POST['printlist'];
        }
        if (!empty($_POST['importlist'])) {
            $importlist = $_POST['importlist'];
        }

        $respon = Security::verifyToken($_POST);
		if($respon['type']){
            if ($this->model('Role')->updateAksesData($id_role, $controller, $count, $createlist, $updatelist, $deletelist, $printlist, $importlist) > 0) {
                Flasher::setFlash('Berhasil', 'diupdate', 'success', 'role akses', '');
                header('Location: ' . BASEURL . '/role');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'diupdate', 'danger', 'role  akses', '');
                header('Location: ' . BASEURL . '/role');
                exit;
            }
        } else {
            Flasher::setFlash($respon['message'], '', 'danger', '', '');
			header ('Location: ' . BASEURL . '/role' );
			exit;
        }

    }

}