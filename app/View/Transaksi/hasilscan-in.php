<?php

use Teckindo\TrackerApps\Services\Security;
$csrftoken = Security::csrfToken();

$lastkm = "";
$lastsopir = "";
$lastkenek = "";
$lastdivisi = "";
if($data['last'] != false){
    $lastkm = $data['last']['km'];
    $lastsopir = $data['last']['sopir'];
    $lastkenek = $data['last']['kenek'];
    $lastdivisi = $data['last']['divisi'];
}

?>
<div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark text-center">Data Kendaraan Masuk</h6>
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
                <label for="jam">Jam Masuk</label>
                <input type="datetime" name="jam" id="jam" value="<?= date("Y-m-d H:i:s") ?>" class="form-control mb-3" readonly>
                <label for="lastkm">Odometer Terakhir</label>
                <input type="number" name="lastkm" id="lastkm" class="form-control mb-3" value="<?= $lastkm ?>" readonly>
                <label for="km">Odometer</label>
                <input type="number" name="km" id="km" class="form-control mb-3" onkeyup="validasi()" required>
                <div class="invalid-feedback mb-2">
                    Data tidak valid
                </div>
                <label for="divisi">Divisi</label>
                <select name="divisi" id="divisi" class="form-control mb-3" required>
                            <option value=""></option>
                    <?php
                        foreach ($data['divisi'] as $div) { ?>
                            <option value="<?= $div['id_divisi'] ?>" <?php if($div['id_divisi'] == $lastdivisi) {echo 'selected';} ?>><?= $div['nama_divisi'] ?></option>
                    <?php } ?>
                </select>
                <label for="sopir">Sopir</label>
                <select name="sopir" id="sopir" class="form-control mb-3" required>
                            <option value=""></option>
                    <?php
                        foreach ($data['sopir'] as $sopir) { ?>
                            <option value="<?= $sopir['id'] ?>" <?php if($sopir['id'] == $lastsopir) {echo 'selected';} ?>><?= $sopir['nama'] ?></option>
                    <?php } ?>
                </select>
                <label for="kenek">Kenek</label>
                <select name="kenek" id="kenek" class="form-control mb-3">
                            <option value=""></option>
                    <?php
                        foreach ($data['kenek'] as $kenek) { ?>
                            <option value="<?= $kenek['nama'] ?>" <?php if($kenek['nama'] == $lastkenek) {echo 'selected';} ?>><?= $kenek['nama'] ?></option>
                    <?php } ?>
                </select>
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control mb-3" id="keterangan" name="keterangan"></textarea>
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control mb-3" value="IN" readonly>
            </div>
            <br>
            <div class="form-group text-center">
                <input type="submit" name="simpan" id="btnsimpan" value="SIMPAN DATA" class="btn btn-block btn-success py-3 font-weight-bold">
            </div>
        </form>
        </div>
    </div>
</div>

<script type="text/javascript">

//Validasi pada saat Scan In (mobil masuk Pabrik)
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

    if(selisih > 200 && selisih < 2000){
        Swal.fire(
            'Anda yakin ?',
            'Kendaraan melakukan perjalanan > 200 km',
            'question'
        )
    }

    if( akhir <= awal || selisih > 2000 ){
        kmakhir.style.backgroundColor = bad_color;
        kmakhir.classList.add('is-invalid')
        btnsimpan.disabled = true;
    } else {
        kmakhir.style.backgroundColor = good_color;
        kmakhir.classList.remove('is-invalid')
        btnsimpan.disabled = false;
    }


}

</script>
