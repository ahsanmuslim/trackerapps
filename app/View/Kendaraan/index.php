<?php

use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Services\Security;

$csrftoken = Security::csrfToken();

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
                    <div class="d-inline">
                        <a href="<?= BASEURL ?>/kendaraan/add" class="btn btn-dark text-right"><i class="fas fa-plus"></i></a>
                        <a href="<?= BASEURL ?>/kendaraan" class="btn btn-warning text-right"><i class="fas fa-sync-alt"></i></a>
                    </div>
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
                                    <th>Jenis</th>
                                    <th>Tahun</th>
                                    <th>Masa Berlaku</th>
                                    <th>Km</th>
                                    <th>Status</th>
                                    <th>Last Status</th>
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
                                        <td><?= $r['no_polisi'] ?></td>
                                        <td><?= $r['type'] ?></td>
                                        <td><?= $r['jenis'] ?></td>
                                        <td><?= $r['tahun'] ?></td>
                                        <td><?= date('d M y', strtotime($r['masa_berlaku'])) ?></td>
                                        <td><?= number_format($r['km'], 1) ?></td>
                                        <td class="text-<?= $text ?> font-weight-bold judul"><?= $status ?></td>
                                        <td><?= $r['jam'] ?></td>
                                        <td class="judul">
                                            <a href="#" class="btn btn-dark btn-sm qrcodeModal" data-toggle="modal" data-target="#modalKendaraan" data-mobil="<?= $r['id_mobil']; ?>"><i class="fas fa-qrcode"></i></a>
                                            <a href="#" class="btn btn-primary btn-sm detailModal" data-toggle="modal" data-target="#modalKendaraan" data-mobil="<?= $r['id_mobil']; ?>"><i class="fas fa-fw fa-eye"></i></a>
                                            <a href="<?= BASEURL ?>/kendaraan/edit/<?= $r['id_mobil'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                            <form action="<?= BASEURL ?>/kendaraan" method="POST" class="d-inline">
                                                <input type="hidden" value="DELETE" name="_method">
                                                <input type="hidden" value="<?= $csrftoken ?>" name="csrftoken">
                                                <input type="hidden" value="<?= $r['id_mobil']; ?>" name="id_mobil">
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


</div>
<!-- /.container-fluid -->

</div>

<!-- Modal -->
<div class="modal fade" id="modalKendaraan" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="judulModal"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-lg text-center" id="qr-modal-content">
                        <!-- Genereate QR Code Here -->

                    </div>
                </div>
			</div>
			<div class="modal-footer" id="qr-modal-footer">
                <!-- Footer Modal  -->
			</div>

		</div>
	</div>
</div>