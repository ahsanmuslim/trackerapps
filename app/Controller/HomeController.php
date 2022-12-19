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
        $this->view('Home/index', $data);
        $this->view('Templates/footer');
    }

    public function notfound()
    {
        $data['title'] = 'Tracker App - Page Not Found';
        $data['link'] = 'http://' . $_SERVER['HTTP_HOST'] .''. $_SERVER['REQUEST_URI'];
        $this->view('notfound', $data);
    }
}