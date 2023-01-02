<?php
namespace Teckindo\TrackerApps\Controller;

use Teckindo\TrackerApps\App\Controller;
use Teckindo\TrackerApps\Helper\ApiRequestResponse;

class ApiController extends Controller
{
    private $userlogin;

    public function __construct()
    {
        $this->userlogin = $this->model('User')->getUser();
    }

    public function getKendaraan()
    {
        $respon = ApiRequestResponse::GetDataApi('kendaraan');
        $data['api'] = json_decode($respon, true);

        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - API';
        $this->view('Templates/header', $data);
        $this->view('Api/kendaraan', $data);
        $this->view('Templates/footer');
    }

    public function getDriver()
    {
        $respon = ApiRequestResponse::GetDataApi('supir');
        $data['api'] = json_decode($respon, true);

        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - API';
        $this->view('Templates/header', $data);
        $this->view('Api/driver', $data);
        $this->view('Templates/footer');
    }

    public function getCodriver()
    {
        $respon = ApiRequestResponse::GetDataApi('cosupir');
        $data['api'] = json_decode($respon, true);

        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - API';
        $this->view('Templates/header', $data);
        $this->view('Api/codriver', $data);
        $this->view('Templates/footer');
    }

    public function getPerjalanan()
    {
        $respon = ApiRequestResponse::GetDataApi('perjalanansupir?page=2');
        $data['api'] = json_decode($respon, true);

        $data['userlogin'] = $this->userlogin;
        $data['menu'] = $this->model('Menu')->getMenuActive($data['userlogin']['username']);
        $data['title'] = 'Tracker Apps - API';
        $this->view('Templates/header', $data);
        $this->view('Api/perjalanandriver', $data);
        $this->view('Templates/footer');
    }
    
    public function getPerjalananDetail()
    {
        $id = $_POST['id'];
        $respon = ApiRequestResponse::GetDataApi('perjalanansupir/'.$id);
        $data['api'] = json_decode($respon, true);
        $this->view('Api/perjalanandetail', $data);
    }

    public function getBarangKeluar()
    {
        echo "Testya ";
        $data['barang'] = $this->model('Barang')->getBarangKeluarAll();
        // $data['barang'] = $this->model('Divisi')->getDivisiAll();
        var_dump($data['barang']);
    }

    public function getSuratJalan()
    {
        $data['sj'] = $this->model('Barang')->getBarangKeluarByDriver($_POST['id']);

        if(! empty($data['sj'])){
            echo '<label for="suratjalan">Surat Jalan</label>';
            foreach ($data['sj'] as $sj) {
                echo '<input type="text" name="nosj[]" class="form-control mb-1" value="'. $sj['no_suratjalan'] .'" readonly>';
            }
        }
    }
    
}