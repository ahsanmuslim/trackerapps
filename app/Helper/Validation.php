<?php
namespace Teckindo\TrackerApps\Helper;

use Teckindo\TrackerApps\App\Controller;
use Teckindo\TrackerApps\Helper\Flasher;

class Validation extends Controller
{
    public function cekStatus($id_mobil, $scan): bool
    {
        $lastStatus = $this->model('Transaksi')->getLastStatus($id_mobil);

        if($lastStatus != false){
            if($lastStatus['status'] == $scan) {
                Flasher::setFlash('QR CODE tidak bisa di Scan !', 'Status mobil '. $scan, 'danger','' ,'');
                return true;
            }
            return false;
        }
        return false;
    }   
}