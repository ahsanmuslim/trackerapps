<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;
use Teckindo\TrackerApps\Helper\Flasher;

class UserController extends Controller
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
        $data['title'] = 'Tracker Apps - User';
        $data['user'] = $this->model('User')->getUserAll();
        $this->view('Templates/header', $data);
        $this->view('User/index', $data);
        $this->view('Templates/footer');
    }

    public function add()
    {
        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - User';
        $data['role'] = $this->model('Role')->getRoleAll();
        $this->view('Templates/header', $data);
        $this->view('User/add', $data);
        $this->view('Templates/footer');
    }

    public function save()
    {
        $username = $_POST['username'];

        if ($this->model('User')->cekUsername($_POST) > 0) {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'user', 'username ' . $username . ' sudah ada di Database !');
            header('Location: ' . BASEURL . '/user');
            exit;
        } elseif ($this->model('User')->saveData($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'user', '');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'user', '');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }
    
}