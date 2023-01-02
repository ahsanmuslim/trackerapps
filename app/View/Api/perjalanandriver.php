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
                            <a class="nav-link text-dark" href="<?= BASEURL ?>/api/codriver"><b>Co Driver</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning active" href="#"><b>Perjalanan Driver</b></a>
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

                                .modal-content {
                                    overflow-x: scroll;
                                }
                            </style>
                            <tr>
                                <th class="judul">No.</th>
                                <th>No Transaksi</th>
                                <th>Tanggal Entry</th>
                                <th>Driver</th>
                                <th>Kendaraan</th>
                                <th>Km Awal</th>
                                <th>Km Akhir</th>
                                <th>User</th>
                                <th>Lokasi</th>
                                <th class="judul"><i class="fas fa-cog"></i></th>
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
                                <td><?= $r['no_transaksi'] ?></td>
                                <td><?= $r['tgl_entry'] ?></td>
                                <td><?= $r['kd_driver'] ?></td>
                                <td><?= $r['kd_kendaraan'] ?></td>
                                <td><?= $r['km_awal'] ?></td>
                                <td><?= $r['km_akhir'] ?></td>
                                <td><?= $r['kd_user'] ?></td>
                                <td><?= $r['kd_lokasi'] ?></td>
                                <td><a href="#" class="btn btn-primary btn-sm detailPerjalanan" data-toggle="modal" data-target="#modalPerjalanandriver" data-id="<?= $r['no_transaksi']; ?>"><i class="fas fa-fw fa-eye"></i></a></td>
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


<!-- Modal -->
<div class="modal fade" id="modalPerjalanandriver" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="judulModal">Detail Perjalanan Driver</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body p-3">
                <div class="row">
                    <div class="col-lg text-center" id="modal-content">
                        <!-- Genereate QR Code Here -->

                    </div>
                </div>
			</div>

		</div>
	</div>
</div>
