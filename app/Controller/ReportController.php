<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;

class ReportController extends Controller
{
    private $userlogin;

    public function __construct()
    {
        $this->userlogin = $this->model('User')->getUser();
    }
    public function index()
    {
        $data['userlogin'] = $this->userlogin;
        $data['title'] = 'Tracker Apps - Report';
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['report'] = $this->model('Report')->getReportAll();
        $this->view('Templates/header', $data);
        $this->view('Report/index2', $data);
        $this->view('Templates/footer');
    }
    
    public function search()
    {
        $data['userlogin'] = $this->userlogin;
        $data['tgl'] = $_POST;
        $data['title'] = 'Tracker Apps - Report';
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['report'] = $this->model('Report')->getReportByDate();	
        $this->view('Templates/header', $data);
		$this->view('Report/cari', $data);
        $this->view('Templates/footer');
    }
    
    public function cari()
    {
         $data['report'] = $this->model('Report')->getReportByDate();        $this->view('Report/getreport', $data);
    }
}