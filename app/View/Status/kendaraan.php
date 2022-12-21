<?php
use Teckindo\TrackerApps\Helper\Flasher;
//script untuk cek user role

?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Status Kendaraan</h1>

    <div class="card text-center shadow">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs"> 	
                <li class="nav-item">
                    <a class="nav-link text-warning active" href="#"><b>Kendaraan</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?= BASEURL ?>/status/sopir"><b>Sopir</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?= BASEURL ?>/status/kenek"><b>Kenek</b></a>
                </li>
            </ul>
        </div>
        <div class="card-body text-left">
            <div class="col-lg-8">
                <?php Flasher::flash(); ?>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-hover">
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
                            <th>Kendaraan</th>
                            <th>No Polisi</th>
                            <th>Status</th>
                            <th>Last Status</th>
                            <th>Masa Berlaku</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $text = '';
                    foreach ($data['kendaraan'] as $r) : 
                        if($r['status'] == 'IN'){
                            $text = 'success';
                            $status = 'Available';
                        } elseif(is_null($r['status'])){
                            $status = '';
                        } else {
                            $text = 'danger';
                            $status = 'OUT';
                        }
                    ?>
                        <tr>
                            <td class="judul"><?= $no++ ?></td>
                            <td><?= $r['type'] ?></td>
                            <td><?= $r['no_polisi'] ?></td>
                            <td class="text-<?= $text ?> font-weight-bold"><?= $status ?></td>
                            <td><?= $r['jam'] ?></td>
                            <td><?= $r['masa_berlaku'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>