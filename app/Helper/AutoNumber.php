<?php
namespace Teckindo\TrackerApps\Helper;

use Teckindo\TrackerApps\App\Controller;

class AutoNumber extends Controller
{
    public function autonum($id_mobil, $divisi): string
    {
        $lastData = $this->model('Transaksi')->getLastTransaction($id_mobil, $divisi);
        $aliasdiv = $this->model('Divisi')->getAliasDivisi($divisi);

        if(! $lastData){
            $urutan = "0001";
        } else {
            $urutan = (int) substr($lastData['nomor'], -4);
            $urutan++;
        }
        $nomor = $aliasdiv['alias'] . date("dmy") . '-' . sprintf("%04s", $urutan);

        return $nomor;
    }   
}