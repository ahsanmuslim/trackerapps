<?php

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
        <div class="col-lg-12">
            <div class="card mb-0">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Edit Kendaraan</h6>
                </div>
                <div class="card-body">
                    <div class="col-lg">
                        <form action="<?= BASEURL; ?>/kendaraan" method="post">
                        <input type="hidden" value="PUT" name="_method">
                        <input type="hidden" value="<?= $csrftoken ?>" name="csrftoken">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nopol">No Polisi</label>
                                <input type="hidden" name="id_mobil" id="id_mobil" class="form-control" value="<?= $data['mobil']['id_mobil'] ?>">
                                <input type="text" name="nopol" id="nopol" class="form-control" value="<?= $data['mobil']['no_polisi'] ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="namastnk">Nama Pemilik</label>
                                <input type="text" name="namastnk" id="namastnk" class="form-control" value="<?= $data['mobil']['nama_stnk'] ?>" required>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nostnk">No STNK</label>
                                <input type="text" name="nostnk" id="nostnk" class="form-control" value="<?= $data['mobil']['no_stnk'] ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="masaberlaku">Masa Berlaku</label>
                                <input type="date" name="masaberlaku" id="masaberlaku" class="form-control" value="<?= $data['mobil']['masa_berlaku'] ?>" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="tahun">Tahun</label>
                                <input type="number" name="tahun" id="tahun" class="form-control" value="<?= $data['mobil']['tahun'] ?>" required>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomesin">No Mesin</label>
                                <input type="text" name="nomesin" id="nomesin" class="form-control" value="<?= $data['mobil']['no_mesin'] ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="norangka">No Rangka</label>
                                <input type="text" name="norangka" id="norangka" class="form-control" value="<?= $data['mobil']['no_rangka'] ?>" required>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="type">Type Kendaraan</label>
                                <input type="text" name="type" id="type" class="form-control" value="<?= $data['mobil']['type'] ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="merk">Merek</label>
                                <input type="text" name="merk" id="merk" class="form-control" value="<?= $data['mobil']['merk'] ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="jenis">Jenis Kendaraan</label>
                                <input type="text" name="jenis" id="jenis" class="form-control" value="<?= $data['mobil']['jenis'] ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="model">Model</label>
                                <input type="text" name="model" id="model" class="form-control" value="<?= $data['mobil']['model'] ?>" required>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="warna">Warna</label>
                                <input type="text" name="warna" id="warna" class="form-control" value="<?= $data['mobil']['warna'] ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bbm">Bahan Bakar</label>
                                <input type="text" name="bbm" id="bbm" class="form-control" value="<?= $data['mobil']['bbm'] ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="masapakai">Masa Pakai</label>
                                <input type="number" name="masapakai" id="masapakai" class="form-control" value="<?= $data['mobil']['masa_pakai'] ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cc">CC Kendaraan</label>
                                <input type="number" name="cc" id="cc" class="form-control" value="<?= $data['mobil']['cc'] ?>" required>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" name="lokasi" id="lokasi" class="form-control" value="<?= $data['mobil']['lokasi'] ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dept">Department</label>
                                <input type="text" name="dept" id="dept" class="form-control" value="<?= $data['mobil']['dept'] ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="operasional">Operasional</label>
                                <input type="text" name="operasional" id="operasional" class="form-control" value="<?= $data['mobil']['operasional'] ?>" required>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <br>
                        <div class="form-group text-center">
                            <input type="submit" name="simpan" value="UPDATE" class="btn btn-warning btn-block py-3 font-weight-bold">
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