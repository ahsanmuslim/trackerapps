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
    $('.qrcodeModal').on('click',function(){

        const id = $(this).data('mobil');
        $('#qrcode').remove();
        $('#tombolPrint').remove();
        $('.tombolClose').remove();
        $('#judulModal').html('QR Code Kendaraan');

        $.ajax({

            url: url + 'kendaraan/getQRCode',
            data: {id : id},
            method: 'post',
            success: function(data) {
                $('#qr-modal-content').html(data);
                $('#qr-modal-footer').append('<button class="btn btn-dark tombolClose" type="button" data-dismiss="modal">Close</button><a href="'+ url + 'kendaraan/print/' + id +'" target="_blank" class="btn btn-warning px-3" id="tombolPrint">Print QR Code</a>');
            }
    
        });

    });

    
    //function modal Tampil Detail
    $('.detailModal').on('click',function(){

        const id = $(this).data('mobil');
        $('#qrcode').remove();
        $('#tombolPrint').remove();
        $('.tombolClose').remove();
        $('#judulModal').html('Detail Kendaraan');

        $.ajax({

            url: url + 'kendaraan/detail',
            data: {id : id},
            method: 'post',
            success: function(data) {
                $('#qr-modal-content').html(data);
                $('#qr-modal-footer').append('<button class="btn btn-dark tombolClose" type="button" data-dismiss="modal">Close</button>');
            }
    
        });

    });

    //fungsi untuk menampilka nama file ynag di upload
    $('.custom-file-input').on('change', function () {

        var size =(this.files[0].size);

        if(size > 2000000) {
            //disabled tomol submit
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
            $(':input[type="submit"]').prop('disabled', true);
            //menampilkan sweet alert jika file terlalu besar
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'File yang Anda upload lebih dari 2Mb !!',
            })
        } else {
            //merubah value field dengan nama file
            $(':input[type="submit"]').prop('disabled', false);
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        }


    });


    // Konfirmasi tombol hapus Sweetalert
    const tombolHapus = document.querySelectorAll('.tombol-hapus-form');
    tombolHapus.forEach(tbl => {
        tbl.addEventListener('click', function(e) {
            var form =  this.closest("form");

            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin ?',
                text: "Data yang Anda hapus tidak dapat di Recovery !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Saya yakin !'
            }).then((willDelete) => {
                if (willDelete.value) {
                    form.submit();
                    Swal.fire(
                        'Deleted!',
                        'Your data has been deleted.',
                        'success'
                    )
                }
            });
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