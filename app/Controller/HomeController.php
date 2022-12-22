<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data['userlogin'] = $this->model('User')->getUser();
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['scan'] = $this->model('Transaksi')->getCounterScan($data['userlogin']['id_user']);
        $data['title'] = "Tracker Apps - Home";
        $this->view('Templates/header', $data);

        if($data['userlogin']['role'] == 2){ //user
            $this->view('Home/index', $data);
        } else {
            $this->view('Home/index2', $data);
        }
        
        $this->view('Templates/footer');
    }

    public function scanner()
    {
        $data['title'] = "Tracker App - Scanning";
        $data['userlogin'] = $this->model('User')->getUser();
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $this->view('Templates/header', $data);
        $this->view('Home/scanner', $data);
        $this->view('Templates/footer-scanner');
    }

    public function scanning($id_mobil)
    {
        $data['userlogin'] = $this->model('User')->getUser();
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['mobil'] = $this->model('Kendaraan')->getMobilInfo($id_mobil);
        $data['title'] = "Tracker Apps - Home";
        $this->view('Templates/header', $data);
        $this->view('Home/scanresult', $data);        
        $this->view('Templates/footer');
    }

    public function scanningPost()
    {
        $data['userlogin'] = $this->model('User')->getUser();
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['mobil'] = $this->model('Kendaraan')->getMobilInfo($_POST['id_mobil']);
        $data['title'] = "Tracker Apps - Home";
        $this->view('Home/scanresultweb', $data);
    }

    public function notfound()
    {
        $data['title'] = 'Tracker App - Page Not Found';
        $data['link'] = 'http://' . $_SERVER['HTTP_HOST'] .''. $_SERVER['REQUEST_URI'];
        $this->view('notfound', $data);
    }
}