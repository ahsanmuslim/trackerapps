<?php

use Teckindo\TrackerApps\Services\Security;

$csrftoken = Security::csrfToken();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Import kendaraan</h1>
    <div class="text-left">
        <a href="<?= BASEURL; ?>/kendaraan" class="btn btn-warning btn-sm mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-angle-double-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-0">
                <div class="card-body">
                    <style>
                        form label:not(.form-check-label) {font-weight:bold;}
                    </style>
                    <div class="col-lg">
                    <form action="<?= BASEURL; ?>/kendaraan/import" method="post"  enctype="multipart/form-data">
                        <input type="hidden" value="<?= $csrftoken ?>" name="csrftoken">
                        <div class="form-group">
                            <label for="file_import">Pilih file yang akan diimport</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file_import" name="file_import" required> 
                                <label class="custom-file-label" for="file_import">Format file harus .xlsx</label>
                            </div>
                        </div>
                        <div class="form-group text-right mt-3">
                            <a href="<?= BASEURL; ?>/kendaraan/download" class="btn btn-warning mr-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-file-download"></i>
                                </span>
                                <span class="text">Sample File Excel</span>                            
                            </a>
                            <input type="submit" name="import" value="Import Data" class="btn btn-dark">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>