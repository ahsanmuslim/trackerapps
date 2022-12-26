<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">History Transaksi (Scanning)</h1>
    
    <div class="row">
        <div class="col-lg-8">

            <div class="card mb-2">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Data Scanning</h6>
                    <div class="d-inline">
                        <a href="<?= BASEURL ?>/history" class="btn btn-warning text-right"><i class="fas fa-sync-alt"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                                    <th>No Polisi</th>
                                    <th>Type</th>
                                    <th class="judul">Status</th>
                                    <th>Last Status</th>
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
                                        <td><?= $r['no_polisi'] ?></td>
                                        <td><?= $r['type'] ?></td>
                                        <td class="judul"><span class="badge badge-pill badge-<?= $text ?>"><?= $status ?></span></td>
                                        <td><?= $r['jam'] ?></td>
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

