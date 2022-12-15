<?php

use Teckindo\TrackerApps\Helper\Flasher;

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Kendaraan Operasional</h1>
    
    <div class="row">
        <div class="col-lg-12">

        <div class="card mb-2">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Data Kendaraan</h6>
                <a href="<?= BASEURL ?>/kendaraan/add" class="btn btn-dark"><i class="fas fa-plus"></i></a>
            </div>
            <div class="card-body">
                <div class="col-lg-8">
                    <?php Flasher::flash(); ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover" id="tblkendaraan">
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
                                <th>Tahun</th>
                                <th>Status</th>
                                <th>Jam</th>
                                <th class="judul"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody id="tblkendaraan-content">
                            <?php
                            $no = 1;
                            $text = '';
                            foreach ($data['kendaraan'] as $r) : 
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
                                    <td><?= $r['tahun'] ?></td>
                                    <td class="text-<?= $text ?> font-weight-bold judul"><?= $r['status'] ?></td>
                                    <td><?= $r['jam'] ?></td>
                                    <td class="judul">
                                        <a href="<?= BASEURL ?>/kendaraan/<?= $r['id_mobil'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                        <a href="#" class="btn btn-dark btn-sm tampilModal" data-toggle="modal" data-target="#modalKendaraan" data-mobil="<?= $r['id_mobil']; ?>"><i class="fas fa-qrcode"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="modalKendaraan" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="judulModal">QR Code Kendaraan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-lg text-center" id="qrcode">
                        <!-- Genereate QR Code Here -->
                    </div>
                </div>
			</div>
			<div class="modal-footer">
                <a href="<?= BASEURL ?>/kendaraan/print" class="btn btn-dark btn-sm px-3">Print QR</a>
                <a href="<?= BASEURL ?>/kendaraan/simpan" class="btn btn-warning btn-sm px-3">Simpan QR</a>
			</div>

		</div>
	</div>
</div>