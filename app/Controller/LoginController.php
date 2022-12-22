<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;
use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Helper\Session;

class LoginController extends Controller 
{ 
    public function index() : void
    {
        if(Session::getCurrentSession()){
            header('Location: ' . BASEURL . '/home');
        } else {
            $data['title'] = "Tracker App - Login";
            $this->view('Auth/login', $data);
        }
    }

    public function login() : void
    {
        $email = $_POST['username'];
        $password = sha1($_POST['password']);

        $session = new Session();
        if($session->jwtlogin($email, $password)){
            header('Location: ' . BASEURL . '/home');
        } else {
            Flasher::setFlash('Login Gagal !!', 'Username / password Anda salah', 'danger', '', '');
            header('Location: ' . BASEURL . '/');
        }
    }

    public function logout() : void
    {
        //hapus JWT di DB, Hapus Cookie dan Hapus Session
        $this->model("User")->hapusJWT();
        setcookie("TRACKER-APPS", "", time() - 60);
        session_destroy();
        header('Location: ' . BASEURL . '/');
    }
}