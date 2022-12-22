<?php

use Teckindo\TrackerApps\Helper\Flasher;
use Teckindo\TrackerApps\Services\Security;

$csrftoken = Security::csrfToken();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">User</h1>
    

        <div class="card mb-2">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Data User</h6>
                <div class="d-inline">
                    <a href="<?= BASEURL ?>/user/add" class="btn btn-dark text-right"><i class="fas fa-plus"></i></a>
                    <a href="<?= BASEURL ?>/user" class="btn btn-warning text-right"><i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-8">
                    <?php Flasher::flash(); ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover" id="tbluser">
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
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>Alias</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Register</th>
                                <th>Last Activity</th>
                                <th class="judul"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $text = '';
                        foreach ($data['user'] as $r) : 
                        ?>
                            <tr>
                                <td class="judul"><?= $no++ ?></td>
                                <td><?= $r['nama_user'] ?></td>
                                <td><?= $r['username'] ?></td>
                                <td><?= $r['alias'] ?></td>
                                <td><?= $r['role'] ?></td>
                                <td><?= ($r['is_active'] == 1) ? "Aktif" : "Tidak Aktif" ?></td>
                                <td><?= date('d M y', strtotime($r['tgl_register'])) ?></td>
                                <td><?= $r['last_activity'] ?></td>
                                <td class="judul">
                                    <?php
                                    if($r['role'] == 'admin'){ ?>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-user-shield"></i></button>
                                    <?php } else { ?>
                                    <a href="<?= BASEURL ?>/user/edit/<?= $r['id_user'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                    <form action="<?= BASEURL ?>/user" method="POST" class="d-inline">
                                        <input type="hidden" value="DELETE" name="_method">
                                        <input type="hidden" value="<?= $csrftoken ?>" name="csrftoken">
                                        <input type="hidden" value="<?= $r['id_user']; ?>" name="id_user">
                                        <button class="btn btn-sm btn-danger tombol-hapus-form"><i class="fas fa-fw fa-trash"></i></button>
                                    </form>
                                    <?php } ?>
                                </td>
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