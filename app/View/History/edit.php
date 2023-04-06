<?php

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

    <div class="row mb-5 mt-3">
        <div class="col-lg-6">
            <div class="card mb-0">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Edit Operator</h6>
                </div>
                <div class="card-body">
                    <div class="col-lg">

                        <form action="<?= BASEURL; ?>/operator" method="post">
                        <input type="hidden" value="<?= $csrftoken ?>" name="csrftoken">
                        <input type="hidden" value="PUT" name="_method">
                        
                        <div class="form-group">
                            <label for="nama">Nama Operator</label>
                            <input type="text" name="nama" id="nama" class="form-control" required maxLength="50" minLength="3" pattern="^[a-zA-Z ]*$" value="<?= $data['operator']['nama'] ?>">
                            <input type="hidden" value="<?= $data['operator']['id'] ?>" name="id">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">
                                Panjang karakter : 6 ~ 50 & menggunakan huruf semua !!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" class="form-control" id="jenis" required>
                                <option value="Sopir" <?= ($data['operator']['jenis'] == "Sopir") ? 'selected' : '' ?>>Sopir</option>
                                <option value="Kenek" <?= ($data['operator']['jenis'] == "Kenek") ? 'selected' : '' ?>>Kenek</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" name="ket" id="ket" class="form-control" value="<?= $data['operator']['keterangan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value=1 <?= ($data['operator']['is_active'] == 1) ? 'selected' : '' ?>>Aktif</option>
                                <option value=0 <?= ($data['operator']['is_active'] == 0) ? 'selected' : '' ?>>Tidak Aktif</option>
                            </select>
                        </div><br>

                        <div class="form-group text-center">
                            <input type="submit" name="update" value="UPDATE" class="btn btn-warning btn-block py-3 font-weight-bold">
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


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>