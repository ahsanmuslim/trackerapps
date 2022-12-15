<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;

class AuthController extends Controller
{
    public function blocked()
    {
        $data['title'] = 'Tracker App - Access Blocked';
        $data['userlogin'] = $this->model('User')->getUser();
        $this->view('Auth/blocked', $data);
    }
}