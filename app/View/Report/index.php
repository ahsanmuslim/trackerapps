<?php

use Teckindo\TrackerApps\Helper\Flasher;

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Report</h1>
    
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <style>
                            label:not(.form-check-label) {font-weight:bold;}
                        </style>
                        <div class="col-lg">
                            <form action="<?= BASEURL ?>/report" method="post">
                                <div class="row">
                                    <div class="col-lg-4 my-1">
                                        <input type="date" class="form-control" name="tglawal" id="tglawal" value="" required>
                                    </div>
                                    <div class="col-lg-4 my-1">
                                        <input type="date" class="form-control" name="tglakhir" id="tglakhir" value="" required>
                                    </div>
                                    <div class="col-lg-4 my-1">
                                        <input type="submit" name="cari" value="Get Report" class="btn btn-dark btn-block font-weight-bold" id="getreport">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card mb-2">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Data Keluar Masuk Kendaraan</h6>
                    <a href="<?= BASEURL ?>/report" class="btn btn-warning"><i class="fas fa-sync-alt"></i></a>
                </div>
                <div class="card-body">
                    <div class="col-lg-8">
                        <?php Flasher::flash(); ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="tblreport">
                            <thead class="thead-light">
                                <style>
                                    th.judul,
                                    td.judul {
                                        text-align: center;
                                    }
                                    /* //css untuk horizantal scroll */
                                    th, td { white-space: nowrap; }
                                    div.dataTables_wrapper {
                                        width: 100%;
                                        margin: 0 auto;
                                    }
                                </style>
                                <tr>
                                    <th class="judul">No.</th>
                                    <th>No Kendaraan</th>
                                    <th>Tipe Kendaraan</th>
                                    <th>Sopir</th>
                                    <th>Kenek</th>
                                    <th>Divisi</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Kilometer</th>
                                    <th>User</th>
                                    <th>Keterangan</th>
                                    <th class="judul"><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody id="tblreport-content">
                                <?php
                                $no = 1;
                                $text = '';
                                foreach ($data['report'] as $r) : 
                                if($r['status'] == 'IN'){
                                    $text = 'success';
                                } else {
                                    $text = 'danger';
                                }

                                ?>
                                    <tr>
                                        <td class="judul"><?= $no++ ?></td>
                                        <td><?= $r['no_polisi'] ?></td>
                                        <td><?= $r['type'] ?></td>
                                        <td><?= $r['sopir'] ?></td>
                                        <td><?= $r['kenek'] ?></td>
                                        <td><?= $r['nama_divisi'] ?></td>
                                        <td class="text-<?= $text ?> font-weight-bold judul"><?= $r['status'] ?></td>
                                        <td><?= $r['jam'] ?></td>
                                        <td><?= $r['km'] ?></td>
                                        <td><?= $r['username'] ?></td>
                                        <td><?= $r['keterangan'] ?></td>
                                        <td class="judul">
                                            <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-fw fa-trash-alt"></i></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>