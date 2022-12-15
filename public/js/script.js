$(document).ready(function () {

    const url = window.location.origin + '/';

    var print = '';
    const tglawal = $("input[name='tglawal']").val();
    const tglakhir = $("input[name='tglakhir']").val();

    if(tglakhir == ""){
        print = 'All';
    } else {
        print = "Periode " + moment(tglawal).format('D-MMM-YY') + " s/d " + moment(tglakhir).format('D-MMM-YY');
    }

    //function modal Generate QR Code
    $('.tampilModal').on('click',function(){

        const id = $(this).data('mobil');
       
        $.ajax({

            url: url + 'kendaraan/getQRCode',
            data: {id : id},
            method: 'post',
            success: function(data) {
                $('#qrcode').html(data);
            }
    
        });

    });


    //fungsi untuk memanggil datatable Library dengan metode Client Side PRocessing
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

    //fungsi untuk memanggil datatable Library dengan metode Client Side PRocessing
    $('#tblkendaraan').DataTable({
        columnDefs: [{
            "searchable": false,
            "orderable": false,
            "targets": [6]
        }],
        "order": [0, "asc"],

        "lengthMenu": [50, 75, 100],

        dom: 'Bfrtip',
        dom: 
            "<'row mb-2'<'col-lg-6'B><'col-lg-6'f>>" +
            "<'row'<'col-lg-12'tr>>" +
            "<'row mb-3 mt-t'<'col-lg-6'i><'col-lg-6'p>>",
        buttons: [{
                extend: 'pdf',
                orientation: 'landscape',
                pageSize: 'A4',
                title: 'Data Kendaraan operasional',
                download: 'open'
            },
            'excel', 'print', 'copy'
        ]

    });
    
});