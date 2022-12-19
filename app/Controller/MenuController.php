<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;

class MenuController extends Controller
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
        $data['report'] = $this->model('Report')->getReportAll();
        $this->view('Templates/header', $data);
        $this->view('Report/index', $data);
        $this->view('Templates/footer');
    }
    
}