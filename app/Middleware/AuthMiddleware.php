<?php
namespace Teckindo\TrackerApps\Middleware;

use Teckindo\TrackerApps\Helper\Access;
use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Helper\Session;

require_once __DIR__ . '/../Config/config.php';

class AuthMiddleware implements Middleware
{
    public function index(): void
    {
        $akses = new Access();
        if(! Session::getCurrentSession()){
            header('Location: ' . BASEURL . '/');
            Flasher::setFlash('Oppss !!', 'Anda belum login !', 'danger', '', '');
            exit();
        } 
        elseif (! $akses->UserAccessCheck() ) {
            header('Location: ' . BASEURL . '/blocked');
            exit();
        }
    }
}

    

