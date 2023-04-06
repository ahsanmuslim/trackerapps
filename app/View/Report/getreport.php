<table class="table table-hover" id="tblreport">
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
            <th>Sopir</th>
            <th>Kenek</th>
            <th>Divisi</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Kilometer</th>
            <th>User</th>
            <th>ID Perjalanan</th>
            <th>Keterangan</th>
            <th class="judul"><i class="fas fa-cog"></i></th>
        </tr>
    </thead>
    <tbody id="tblreport-content">
        <?php
        $no = 1;
        $text = '';
        foreach ($data['report'] as $r) : 
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
                <td><?= $r['nama'] ?></td>
                <td><?= $r['kenek'] ?></td>
                <td><?= $r['nama_divisi'] ?></td>
                <td class="text-<?= $text ?> font-weight-bold judul"><?= $r['status'] ?></td>
                <td><?= $r['jam'] ?></td>
                <td><?= number_format($r['km'], 1) ?></td>
                <td><?= $r['username'] ?></td>
                <td><?= $r['id_perjalanan'] ?></td>
                <td><?= $r['keterangan'] ?></td>
                <td class="judul">
                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                    <a href="#" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-fw fa-trash-alt"></i></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
var print = '';
const tglawal = $("input[name='tglawal']").val();
const tglakhir = $("input[name='tglakhir']").val();

if(tglakhir == ""){
    print = 'All';
} else {
    print = "Periode " + moment(tglawal).format('D-MMM-YY') + " s/d " + moment(tglakhir).format('D-MMM-YY');
}

$('#tblreport').DataTable({
    columnDefs: [{
        "searchable": false,
        "orderable": false,
        "targets": [11]
    }],
    "order": [0, "asc"],

    "lengthMenu": [50, 75, 100],

    dom: 'Bfrtip',
    dom: 
        "<'row mb-2'<'col-lg-6'B><'col-lg-6'f>>" +
        "<'row'<'col-lg-12'tr>>" +
        "<'row mb-3 mt-3'<'col-lg-6'i><'col-lg-6'p>>",
    buttons: [{
            extend: 'pdf',
            orientation: 'landscape',
            pageSize: 'A4',
            title: 'Report Keluar Masuk Kendaraan ' + print,
            download: 'open'
        },
        'excel', 'print', 'copy'
    ]

});
</script>