<?php

use Ramsey\Uuid\Uuid;
use Teckindo\TrackerApps\Services\Security;

$csrftoken = Security::csrfToken();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Operator</h1>

    <div class="text-left">
        <a href="<?= BASEURL; ?>/operator" class="btn btn-warning btn-sm mb-3">
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
                    <h6 class="m-0 font-weight-bold text-dark">Tambah Operator</h6>
                </div>
                <div class="card-body">
                    <div class="col-lg">
                  
                        <form action="<?= BASEURL; ?>/operator" method="post">
                        <input type="hidden" value="<?= $csrftoken ?>" name="csrftoken">
                        
                        <div class="form-group">
                            <label for="namauser">Nama User</label>
                            <input type="text" name="namauser" id="namauser" class="form-control" required maxLength="50" minLength="3" pattern="^[a-zA-Z ]*$" autofocus>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">
                                Panjang karakter : 6 ~ 50 & menggunakan huruf semua !!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required maxLength="15" minLength="3" pattern="^[a-z0-9_.-]*$">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">
                                Gunakan kombinasi huruf kecil & angka !!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dept">Department</label>
                            <select name="dept" class="form-control" id="dept" required>
                                <?php foreach ($data['dept'] as $dept) : ?>
                                    <option value="<?= $dept['id_dept']; ?>"><?= $dept['nama_dept']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Email tidak valid !</div>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input type="text" name="no_telp" id="no_telp" class="form-control" required pattern="[0]{1}[8]{1}[0-9]{9,10}">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Nomor telp tidak valid !</div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password <small><i>( password default : 123 )</i></small></label>
                            <input type="password" name="password" id="password" value="123" class="form-control" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="level">Level User</label>
                            <div>
                                <div class="form-check">
                                    <?php foreach ($data['datarole'] as $role) : ?>
                                        <?php
                                            if ($role['id_role'] != 1) { ?>
                                                <input class="form-check-input" type="radio" name="role" id="<?= $role['role']; ?>" value="<?= $role['id_role']; ?>" <?= $role['id_role'] == 2 ? 'checked' : '' ?> required>
                                                <label class="form-check-label mr-5" for="<?= $role['role']; ?>">
                                                    <?= $role['role']; ?>
                                                </label>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                    <div class="invalid-feedback">Pilih level user !</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value=1>Aktif</option>
                                <option value=0>Tidak Aktif</option>
                            </select>
                        </div><br>

                        <div class="form-group text-center">
                            <input type="submit" name="simpan" value="SIMPAN" class="btn btn-dark btn-block py-3 font-weight-bold">
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