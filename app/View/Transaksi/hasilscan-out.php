<?php

use Teckindo\TrackerApps\Services\Security;
$csrftoken = Security::csrfToken();

if($data['last'] != false){
    $last = $data['last']['km'];
} else {
    $last = $data['mobil']['km'];
}

?>
<div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark text-center">Data Kendaraan Keluar</h6>
    </div>
    <div class="card-body">
        <!-- <style>
            form label:not(.form-check-label) {font-weight:bold;}
        </style> -->
        <div class="col-lg">
        <form action="<?= BASEURL; ?>/transaksi" method="post">
        <input type="hidden" value="<?= $csrftoken ?>" name="csrftoken">
            <div class="form-group">
                <label for="nopol">No Kendaraan</label>
                <input type="hidden" name="id_mobil" id="id_mobil" class="form-control" value="<?= $data['mobil']['id_mobil']?>" readonly>
                <input type="text" name="nopol" id="nopol" class="form-control mb-3" value="<?= $data['mobil']['no_polisi']?>" readonly>
                <label for="type">Type Kendaraan</label>
                <input type="text" name="type" id="type" class="form-control mb-3" value="<?= $data['mobil']['type']?>" readonly>
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="<?=date('Y-m-d')?>" class="form-control mb-3" readonly>
                <label for="jam">Jam Keluar</label>
                <input type="datetime" name="jam" id="jam" value="<?= date("Y-m-d H:i:s") ?>" class="form-control mb-3" readonly>
                <label for="lastkm">Kilometer Terakhir</label>
                <input type="number" name="lastkm" id="lastkm" class="form-control mb-3" value="<?= $last ?>" readonly>
                <label for="km">Kilometer Awal</label>
                <input type="number" name="km" id="km" step="any" class="form-control mb-3" onkeyup="validasi()" value="<?= $last ?>" required>
                <div class="invalid-feedback mb-2">
                    Data tidak valid
                </div>
                <label for="divisi">Divisi</label>
                <select name="divisi" id="divisi" class="form-control mb-3" required>
                            <option value=""></option>
                    <?php
                        foreach ($data['divisi'] as $div) { ?>
                            <option value="<?= $div['id_divisi'] ?>"><?= $div['nama_divisi'] ?></option>
                    <?php } ?>
                </select>
                <label for="sopir">Sopir</label>
                <select name="sopir" id="sopir" onchange="getPerjalananSupir()" class="form-control mb-3" required>
                            <option value=""></option>
                    <?php
                        foreach ($data['sopir'] as $sopir) { ?>
                            <option value="<?= $sopir['id'] ?>"><?= $sopir['nama'] ?></option>
                    <?php } ?>
                </select>
                <label for="kenek">Kenek</label>
                <select name="kenek" id="kenek" class="form-control mb-3">
                            <option value=""></option>
                    <?php
                        foreach ($data['kenek'] as $kenek) { ?>
                            <option value="<?= $kenek['nama'] ?>"><?= $kenek['nama'] ?></option>
                    <?php } ?>
                </select>

                <label for="perjalanan">Data perjalanan supir</label>
                <div class="form-group row">
                    <div class="col-md-10">
                        <select name="perjalanan" id="perjalanan" class="form-control mb-3" onchange="popupDetailPerjalanan()">
                                
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-dark btn-block detailSuratJalan" data-toggle="modal" data-target="#suratJalanModal">Lihat Surat Jalan</button>
                    </div>
                </div>      
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control mb-3" id="keterangan" name="keterangan"></textarea>
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control mb-3" value="OUT" readonly>
            </div>
            <br>
            <div class="form-group text-center">
                <input type="submit" name="simpan" value="SIMPAN DATA" id="btnsimpan" class="btn btn-block btn-danger py-3 font-weight-bold">
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="suratJalanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLongTitle">Detail Surat Jalan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-content" style="overflow-x: scroll;">
        ...
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<script type="text/javascript">


//Validasi pada saat Scan Out (mobil keluar Pabrik)
function validasi()
{
    let kmawal = document.getElementById('lastkm');
    let kmakhir = document.getElementById('km');
    let btnsimpan = document.getElementById('btnsimpan');
    let akhir = parseInt(kmakhir.value);
    let awal = parseInt(kmawal.value);

    const good_color = "#D0F8FF";     
    const bad_color  = "#FFD0C6";

    let selisih = akhir - awal;
    console.log(selisih);

    if( akhir < awal || selisih > 1 ){
        kmakhir.style.backgroundColor = bad_color;
        kmakhir.classList.add('is-invalid')
        btnsimpan.disabled = true;
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kilometer harus sama dengan pada saat Kendaraan masuk',
        })
    } else {
        kmakhir.style.backgroundColor = good_color;
        kmakhir.classList.remove('is-invalid')
        btnsimpan.disabled = false;
    }

}

function getPerjalananSupir()
{
    const url = window.location.origin + '/';
    // const url = window.location.origin + '/security/';
    const sopir = $('#sopir').val();
    const nopol = $('#nopol').val();
    const btnsimpan = document.getElementById('btnsimpan');

    $.ajax({
        url: url + 'api/getPerjalanan',
        data: {
            sopir: sopir,
            nopol: nopol
        },
        method: 'post',
        success: function(data) {
            if(data){
                // btnsimpan.disabled = false;
                // console.log(data);
                $('#perjalanan').html(data);
            } else {
                // btnsimpan.disabled = true;
                Swal.fire({
                    icon: 'info',
                    title: 'Oops...',
                    text: 'Data perjalanan Supir belum dibuat',
                })
            }

        }

    });


}

function popupDetailPerjalanan()
{
    const url = window.location.origin + '/';
    // const url = window.location.origin + '/security/';
    const nomor = $('#perjalanan').val();

    $.ajax({
        url: url + 'api/getDetailPerjalanan',
        data: {
            nomor: nomor
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {
            if(data){
                // console.log(JSON.stringify(data));
                Swal.fire({
                    icon: 'info',
                    title: 'Detail No. : '+ data.no_transaksi,
                    html: 'Tanggal Entry : '+ data.tgl_entry +'<br>Tujuan : '+ data.tujuan + '<br>Keterangan : ' + data.keterangan + '<br> Alamat : ' + data.alamat,
                })
            }
        }
    });
}

//function modal Tampil Detail Perjalanan
$('.detailSuratJalan').on('click',function(){
    const url = window.location.origin + '/';
    // const url = window.location.origin + '/security/';
    const nomor = $('#perjalanan').val();
    // const nomor = '0124-III-23-HQ-KI';

    $.ajax({
        
        url: url + 'api/suratjalan',
        data: {nomor : nomor},
        method: 'post',
        success: function(data) {
            console.log('Berhasil');
            $('#modal-content').html(data);
        }

    });

});



</script>
