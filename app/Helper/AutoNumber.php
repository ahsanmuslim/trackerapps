<?php
namespace Teckindo\TrackerApps\Helper;

use Teckindo\TrackerApps\App\Controller;

class AutoNumber extends Controller
{
    public function autonum($divisi, $alias): string
    {
        $lastData = $this->model('Transaksi')->getLastTransaction($divisi);
        $aliasdiv = $this->model('Divisi')->getAliasDivisi($divisi);

        if(! $lastData){
            $urutan = "0001";
        } else {
            $urutan = (int) substr($lastData['nomor'], -4);
            $urutan++;
        }
        $nomor = $aliasdiv['alias'] . $alias . date("dmy") . '-' . sprintf("%04s", $urutan);

        return $nomor;
    }   
}