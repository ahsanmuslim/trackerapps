<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;

class HistoryController extends Controller
{
    public function index()
    {
        $data['userlogin'] = $this->model('User')->getUser();
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - History';
        $data['history'] =  $this->model('Transaksi')->getTransUser($data['userlogin']['id_user']);
        $this->view('Templates/header', $data);
        $this->view('History/index', $data);
        $this->view('Templates/footer');
    }
}