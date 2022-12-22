<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <p class="h3 mb-0 text-light btn btn-block btn-warning py-3 font-weight-bold" id="scanner"><i class="fas fa-qrcode mr-3"></i>SCAN QR</p>
    </div>


    <!-- Start row 1 -->
    <div class="row">

        <!-- First Column -->
        <div class="col-lg-4 scanner-card">
            <!-- Custom Text Color Utilities -->
            <div class="card mb-1">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark text-center">Scan QR Code Here</h6>
                </div>
                <div class="card-body">
                    <div id="qr-reader" class="col-lg"></div>
                    <audio id="myaudio">
                        <source src="<?= BASEURL; ?>/audio/scan.mp3" type="audio/ogg">
                    </audio>
                </div>
            </div>
        </div>

        <!-- Second Column -->
        <div class="col-lg-12 hasil-scan">
            <!-- Background Gradient Utilities -->
            
        </div>
    
    </div>
    <!-- End of Row 2 -->




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->