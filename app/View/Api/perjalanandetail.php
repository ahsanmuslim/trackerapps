<div class="row">
    <div class="col-lg-12">
    <table class="table table-hover" id="tblapifirman">
        <thead class="thead-light">
            <style>
                th.judul,
                td.judul {
                    text-align: center;
                }
            </style>
            <tr>
                <th class="judul">No.</th>
                <th>No Transaksi</th>
                <th>Tujuan</th>
                <th>Berangkat</th>
                <th>Tiba</th>
                <th>Toll</th>
                <th>Parkir</th>
                <th>Lainnya</th>
                <th>Keterangan</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $text = '';
        foreach ($data['api']['data'][0]['PerjalananSupirDetail']['data'] as $r) : 
        ?>
            <tr>
                <td class="judul"><?= $no++ ?></td>
                <td><?= $r['no_transaksi'] ?></td>
                <td><?= $r['tujuan'] ?></td>
                <td><?= $r['wkt_berangkat'] ?></td>
                <td><?= $r['wkt_tiba'] ?></td>
                <td><?= $r['biaya_toll'] ?></td>
                <td><?= $r['biaya_parkir'] ?></td>
                <td><?= $r['biaya_lain'] ?></td>
                <td><?= $r['keterangan'] ?></td>
                <td><?= $r['alamat'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>