<?php

use Ramsey\Uuid\Uuid;
use Teckindo\TrackerApps\Services\Security;

$csrftoken = Security::csrfToken();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kendaraan Operasional</h1>

    <div class="text-left">
        <a href="<?= BASEURL; ?>/kendaraan" class="btn btn-warning btn-sm mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-angle-double-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-0 shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Form Penambahan Kendaraan Operasional</h6>
                </div>
                <div class="card-body">
                    <div class="col-lg">
                    <form action="<?= BASEURL; ?>/kendaraan" method="post">
                    <input type="hidden" value="<?= $csrftoken ?>" name="csrftoken">
                        <div class="form-group">
                            <label for="nopol">No Polisi</label>
                            <input type="hidden" name="id_mobil" id="id_mobil" class="form-control" value="<?= Uuid::uuid1()->toString() ?>">
                            <input type="text" name="nopol" id="nopol" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="type">Type Kendaraan</label>
                            <input type="text" name="type" id="type" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun Pembuatan</label>
                            <input type="number" name="tahun" id="tahun" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group text-right">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-dark btn-block">
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