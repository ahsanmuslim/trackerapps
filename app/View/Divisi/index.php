<?php

use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Services\Security;

$csrftoken = Security::csrfToken();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Divisi</h1>
    
    <div class="row">
        <div class="col-lg-6">

        <div class="card mb-2">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Data Divisi</h6>
                <div class="d-inline">
                    <a href="<?= BASEURL ?>/divisi/add" class="btn btn-dark text-right"><i class="fas fa-plus"></i></a>
                    <a href="<?= BASEURL ?>/divisi" class="btn btn-warning text-right"><i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-8">
                    <?php Flasher::flash(); ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover" id="tbldivisi">
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
                                <th>Nama Divisi</th>
                                <th>Alias</th>
                                <th class="judul"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $text = '';
                        foreach ($data['divisi'] as $r) : 
                        ?>
                            <tr>
                                <td class="judul"><?= $no++ ?></td>
                                <td><?= $r['nama_divisi'] ?></td>
                                <td><?= $r['alias'] ?></td>
                                <td class="judul">
                                    <a href="<?= BASEURL ?>/divisi/edit/<?= $r['id_divisi'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                    <form action="<?= BASEURL ?>/divisi" method="POST" class="d-inline">
                                        <input type="hidden" value="DELETE" name="_method">
                                        <input type="hidden" value="<?= $csrftoken ?>" name="csrftoken">
                                        <input type="hidden" value="<?= $r['id_divisi']; ?>" name="id_divisi">
                                        <button class="btn btn-sm btn-danger tombol-hapus-form"><i class="fas fa-fw fa-trash"></i></button>
                                    </form>
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
<!-- /.container-fluid -->

</div>