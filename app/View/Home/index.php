<?php

use Teckindo\TrackerApps\Helper\Flasher;

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-dark">Wellcome <?= $data['userlogin']['username'] ?> !</h1>
    </div>

    <!-- start Row 1  -->
    <div class="row">

        <!-- Total biaya -->
        <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-warning h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-lg font-weight-bold text-dark mb-1">Total Scan Activity</div>
                <div class="h5 mb-0 font-weight-bold text-warning"><?= $data['scan'] ?></div>
                </div>
                <div class="col-auto">
                <i class="fab fa-searchengin fa-3x text-gray-800"></i>
                </div>
            </div>
            </div>
        </div>
        </div>

    </div>
    <!-- ENd of Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-5">
            <a href="<?= BASEURL ?>/transaksi/scanin" class="btn btn-lg btn-success btn-block mb-4 py-5">SCAN IN ( MASUK )</a>
            <a href="<?= BASEURL ?>/transaksi/scanout" class="btn btn-lg btn-danger btn-block mb-4 py-5">SCAN OUT ( KELUAR )</a>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->