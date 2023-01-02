<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-4 text-gray-800">Data API Firman Indonesia</h1>
    
    <div class="row">
        <div class="col-lg-12">

            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs"> 	
                        <li class="nav-item">
                            <a class="nav-link text-warning active" href="#"><b>Kendaraan</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?= BASEURL ?>/api/driver"><b>Driver</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?= BASEURL ?>/api/codriver"><b>Co Driver</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?= BASEURL ?>/api/perjalanandriver"><b>Perjalanan Driver</b></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body text-left">
                    <div class="table-responsive mt-2">

                    <table class="table table-hover" id=tblapifirman>
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
                                <th>No Polisi</th>
                                <th>Kendaraan</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th>Lokasi</th>
                                <th>Rasio</th>
                                <th>Kd BBM</th>
                                <th>Status</th>
                                <th>Roda</th>
                                <th>Km Ganti Oli</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $text = '';
                        foreach ($data['api']['data'] as $r) : 
                        ?>
                            <tr>
                                <td class="judul"><?= $no++ ?></td>
                                <td><?= $r['no_polisi'] ?></td>
                                <td><?= $r['jenis_kendaraan'] ?></td>
                                <td><?= $r['jenis'] ?></td>
                                <td><?= $r['keterangan'] ?></td>
                                <td><?= $r['kd_lokasi'] ?></td>
                                <td><?= $r['rasio'] ?></td>
                                <td><?= $r['kd_bbm'] ?></td>
                                <td><?= $r['status'] ?></td>
                                <td><?= $r['roda'] ?></td>
                                <td><?= $r['km_ganti_oli'] ?></td>
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