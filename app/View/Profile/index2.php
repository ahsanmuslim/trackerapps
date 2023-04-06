<?php

use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Services\Security;

$csrftoken = Security::csrfToken();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">User Profile</h1>
    <div class="col-lg">
        <?php Flasher::flash(); ?>
    </div>
    <div class="col-lg-12 mt-4">
        <div class="card shadow-lg">
            <div class="card-header text-center">
                <b>My Profile</b>
            </div>
            <div class="card-body">
                <p class="text-center"><img src="<?= BASEURL; ?>/img/profile/<?= $data['user']['profile']; ?>" width="200" class="rounded-circle shadow-lg mt-2 mb-4 text-center" alt="<?= $data['user']['nama_user']; ?>"></p>
                <h4 class="card-title text-center"><b><?= $data['user']['nama_user']; ?> </b> ( <?= $data['user']['username']; ?> ) </h4>
                <hr>
                <p class="card-text ml-5"><i class="fas fa-clock mr-4"></i><?= 'Registered since - ' . date('d F Y', strtotime($data['user']['tgl_register'])) ?></p>
                <hr>
                <p class="text-center">
                    <a href="#" class="btn btn-dark mt-3 mr-3 updateProfileModal" data-toggle="modal" data-target="#updateProfileModal" data-user="<?= $data['user']['id_user']; ?>">Update Foto</a>
                    <a href="#" class="btn btn-success mt-3">Share To</a>
                </p>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

<!-- Modal Share Dokument-->
<div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="shareModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLongTitle"><span class="text-sm-left">Update Foto Profile : </span>  <span class="badge badge-primary" id="judul"></span></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?= BASEURL; ?>/profile" method="post" enctype="multipart/form-data">
                <input type="hidden" value="PUT" name="_method">
                <input type="hidden" value="<?= $csrftoken ?>" name="csrftoken">
                <input type="hidden" value="" name="id_user" id="id_user">
                <label for="profile">Pilih foto profile yang akan diupload</label>
                <div class="custom-file">
                    <input type="file" class="foto-upload" id="profile" name="profile" required> 
                    <label class="custom-file-label" for="profile">Format file harus gambar</label>
                </div>
        </div>
        <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Upload Foto</button>
            </form>
        </div>
        </div>
    </div>
</div>



<script>

$('.updateProfileModal').on('click',function(){

const id = $(this).data('user');
$('#id_user').val(id);

});

//fungsi untuk menampilka nama file ynag di upload
$('.foto-upload').on('change', function () {

    var size =(this.files[0].size);
    var inputFile = document.getElementById('profile');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.jpg|\.png)$/i;

    if(size > 2000000) {
        //disabled tomol submit
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
        $(':input[type="submit"]').prop('disabled', true);
        //menampilkan sweet alert jika file terlalu besar
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'File yang Anda upload lebih dari 2Mb !!',
        })
    } else if(!ekstensiOk.exec(pathFile)){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
        $(':input[type="submit"]').prop('disabled', true);
        //menampilkan sweet alert file extensi Tidak Sesuai
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Extensi File yang Anda upload tidak sesuai !!',
        })
    } else {
        //merubah value field dengan nama file
        $(':input[type="submit"]').prop('disabled', false);
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    }


});
</script>