<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No SJ</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">No SO</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach($data['sj'] as $j): ?>
                <tr style="white-space: nowrap;">
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $j['kd_barangkeluar'] ?></td>
                    <td><?= $j['nama_barang'] ?></td>
                    <td><?= $j['qty_kirim'] ?></td>
                    <td><?= $j['jenis_kirim'] ?></td>
                    <td><?= $j['tgl_kirim'] ?></td>
                    <td><?= $j['no_salesorder'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>