<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;

class StatusController extends Controller
{
    private $userlogin;

    public function __construct()
    {
        $this->userlogin = $this->model('User')->getUser();
    }

    public function kendaraan()
    {
        $data['userlogin'] = $this->userlogin;
        $data['title'] = 'Tracker Apps - Report';
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['kendaraan'] = $this->model('Kendaraan')->getKendaraanAll();
        $this->view('Templates/header', $data);
        $this->view('Status/kendaraan', $data);
        $this->view('Templates/footer');
    }

    public function sopir()
    {
        $data['userlogin'] = $this->userlogin;
        $data['title'] = 'Tracker Apps - Report';
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['sopir'] = $this->model('Operator')->getSopir();
        $this->view('Templates/header', $data);
        $this->view('Status/sopir', $data);
        $this->view('Templates/footer');
    }

    public function kenek()
    {
        $data['userlogin'] = $this->userlogin;
        $data['title'] = 'Tracker Apps - Report';
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['kenek'] = $this->model('Operator')->getKenek();
        $this->view('Templates/header', $data);
        $this->view('Status/kenek', $data);
        $this->view('Templates/footer');
    }
    
}