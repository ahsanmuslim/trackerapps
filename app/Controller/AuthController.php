<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;

class AuthController extends Controller
{
    public function blocked()
    {
        $data['title'] = 'Tracker App - Access Blocked';
        $data['userlogin'] = $this->model('User')->getUser();
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $this->view('Templates/header', $data);
        $this->view('Auth/blocked', $data);
        $this->view('Templates/footer', $data);
    }
}