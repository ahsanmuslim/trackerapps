<?php

if($data['mobil']['status'] == 'IN'){
    $text = 'success';
    $status = 'Available';
} elseif(is_null($data['mobil']['status'])){
    $status = '';
    $text = 'success';
} else {
    $text = 'danger';
    $status = 'OUT';
}

?>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-sm">
            <thead class="thead-dark text-left">
                <tr>
                    <th scope="col">No Polisi</th>
                    <th scope="col"><?= $data['mobil']['no_polisi'] ?></th>
                </tr>
            </thead>
            <tbody class="text-left">
                <tr>
                    <th scope="row">No STNK</th>
                    <td><?= $data['mobil']['no_stnk'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Nama STNK</th>
                    <td><?= $data['mobil']['nama_stnk'] ?></td>
                </tr>
                <tr>
                    <th scope="row">No mesin</th>
                    <td><?= $data['mobil']['no_mesin'] ?></td>
                </tr>
                <tr>
                    <th scope="row">No rangka</th>
                    <td><?= $data['mobil']['no_rangka'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Type</th>
                    <td><?= $data['mobil']['type'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Merek</th>
                    <td><?= $data['mobil']['merk'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Jenis</th>
                    <td><?= $data['mobil']['jenis'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Model</th>
                    <td><?= $data['mobil']['model'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Tahun</th>
                    <td><?= $data['mobil']['tahun'] ?></td>
                </tr>
                <tr>
                    <th scope="row">CC</th>
                    <td><?= $data['mobil']['cc'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Warna</th>
                    <td><?= $data['mobil']['warna'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Lokasi</th>
                    <td><?= $data['mobil']['lokasi'] ?></td>
                </tr>
                <tr>
                    <th scope="row">BBM</th>
                    <td><?= $data['mobil']['bbm'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Masa berlaku</th>
                    <td><?= $data['mobil']['masa_berlaku'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Operasional</th>
                    <td><?= $data['mobil']['operasional'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Department</th>
                    <td><?= $data['mobil']['dept'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Masa pakai</th>
                    <td><?= $data['mobil']['masa_pakai'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Kilometer</th>
                    <td><?= $data['mobil']['km'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td class="text-<?= $text ?> font-weight-bold"><?= $status ?></td>
                </tr>
                <tr>
                    <th scope="row">Last status</th>
                    <td><?= $data['mobil']['jam'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

