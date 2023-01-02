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
                            <a class="nav-link text-dark" href="<?= BASEURL ?>/api/kendaraan"><b>Kendaraan</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?= BASEURL ?>/api/driver"><b>Driver</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning active" href="#"><b>Co Driver</b></a>
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
                                <th>Kode Co Driver</th>
                                <th>Nama Co Driver</th>
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
                                <td><?= $r['kd_codriver'] ?></td>
                                <td><?= $r['nama_codriver'] ?></td>
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