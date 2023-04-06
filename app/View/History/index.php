<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">History Transaksi (Scanning)</h1>
    
    <div class="row">
        <div class="col-lg-12">

            <div class="card mb-2">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Data Scanning</h6>
                    <div class="d-inline">
                        <a href="<?= BASEURL ?>/history" class="btn btn-warning text-right"><i class="fas fa-sync-alt"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="tblgeneral">
                            <thead class="thead-light">
                            <style>
                                th.judul , td.judul {text-align: center;}
                                /* //css untuk horizantal scroll */
                                th, td { white-space: nowrap; }
                                div.dataTables_wrapper {
                                    width: 100%;
                                    margin: 0 auto;
                                }
                            </style>
                                <tr>
                                    <th class="judul">#</th>
                                    <th class="judul"><i class="fas fa-cog"></i></th>  
                                    <th>No Polisi</th>
                                    <th>Type</th>
                                    <th>Jenis</th>
                                    <th class="judul">Status</th>
                                    <th>Sopir</th>
                                    <th>Km</th>
                                    <th>Last Status</th>
                                    <th>ID Perjalanan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $text = '';
                                foreach ($data['history'] as $r) : 
                                    if($r['status'] == 'IN'){
                                        $text = 'success';
                                        $status = 'Scan In';
                                    } elseif(is_null($r['status'])){
                                        $status = '';
                                    } else {
                                        $text = 'danger';
                                        $status = 'Scan Out';
                                    }
                                ?>
                                    <tr>
                                        <td class="judul"><?= $no++ ?></td>
                                        <td><a href="<?= BASEURL ?>/transaksi/edit/<?= $r['nomor'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pen"></i></a></td>
                                        <td><?= $r['no_polisi'] ?></td>
                                        <td><?= $r['type'] ?></td>
                                        <td><?= $r['jenis'] ?></td>
                                        <td class="judul"><span class="badge badge-pill badge-<?= $text ?>"><?= $status ?></span></td>
                                        <td><?= $r['nama'] ?></td>
                                        <td><?= number_format($r['km'], 1) ?></td>
                                        <td><?= $r['jam'] ?></td>
                                        <td><?= $r['id_perjalanan'] ?></td>
                                        <td><?= $r['keterangan'] ?></td>
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

