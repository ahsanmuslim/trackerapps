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
        <div class="col-lg-12 mb-3">
            <a href="#" class="btn btn-lg btn-dark btn-block mb-4 py-3" onclick="scanQR()" id="scan-info"><i class="fas fa-qrcode mr-3"></i>SCAN QR</a>
        </div>
    </div>

    <!-- hasil scan QR Kendaraan  -->
    <div class="row">
        <div class="col-lg-12 hasil-scan" id="hasil-scan">
            
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

    const scaninfo = document.getElementById('scan-info');

    const link = window.location.origin + '/';
    // const link = window.location.origin + '/security/';
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        scaninfo.setAttribute('href', '#');
    }else{
        scaninfo.setAttribute('href', link + 'home/scanner');
    }
</script>