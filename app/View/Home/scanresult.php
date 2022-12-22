<?php

use Teckindo\TrackerApps\Helper\Flasher;

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-dark">Wellcome <?= $data['userlogin']['username'] ?> !</h1>
    </div>

    <!-- ENd of Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-2">
            <a href="#" class="btn btn-lg btn-dark btn-block mb-4 py-3" onclick="scanQR()"><i class="fas fa-qrcode mr-3"></i>SCAN QR</a>
        </div>
    </div>

    <!-- hasil scan QR Kendaraan  -->
    <div class="row">
        <div class="col-lg-12 hasil-scan" id="hasil-scan">
        <?php

        if($data['mobil']['status'] == 'IN'){
            $text = 'success';
            $status = 'Available';
        } elseif(is_null($data['mobil']['status'])){
            $status = '';
            $text = 'success';
        } else {
            $text = 'danger';
            $status = 'OUT';
        }

        ?>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-sm">
                    <thead class="thead-dark text-left">
                        <tr>
                            <th scope="col" class="pl-3">No Polisi</th>
                            <th scope="col"><?= $data['mobil']['no_polisi'] ?></th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        <tr>
                            <th scope="row" class="pl-3">No STNK</th>
                            <td><?= $data['mobil']['no_stnk'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Nama STNK</th>
                            <td><?= $data['mobil']['nama_stnk'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">No mesin</th>
                            <td><?= $data['mobil']['no_mesin'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">No rangka</th>
                            <td><?= $data['mobil']['no_rangka'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Type</th>
                            <td><?= $data['mobil']['type'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Merek</th>
                            <td><?= $data['mobil']['merk'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Jenis</th>
                            <td><?= $data['mobil']['jenis'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Model</th>
                            <td><?= $data['mobil']['model'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Tahun</th>
                            <td><?= $data['mobil']['tahun'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">CC</th>
                            <td><?= $data['mobil']['cc'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Warna</th>
                            <td><?= $data['mobil']['warna'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Lokasi</th>
                            <td><?= $data['mobil']['lokasi'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">BBM</th>
                            <td><?= $data['mobil']['bbm'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Masa berlaku</th>
                            <td><?= $data['mobil']['masa_berlaku'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Operasional</th>
                            <td><?= $data['mobil']['operasional'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Department</th>
                            <td><?= $data['mobil']['dept'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Masa pakai</th>
                            <td><?= $data['mobil']['masa_pakai'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Kilometer</th>
                            <td><?= $data['mobil']['km'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Status</th>
                            <td class="text-<?= $text ?> font-weight-bold"><?= $status ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="pl-3">Last status</th>
                            <td><?= $data['mobil']['jam'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        </div>
    </div>
    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    function scanQR(){
        Android.ScanQRInfo();
    }
</script>