const scanner = document.getElementById('scanner').innerHTML;
var controller = "";

if(scanner == "SCAN IN"){
    controller = "transaksi/scanin";
} else if(scanner == "SCAN OUT") {
    controller = "transaksi/scanout";
} else {
    controller = "home";
}

function onScanSuccess(decodedText, decodedResult) {

    const url = window.location.origin + '/';
    const id_mobil = decodedText;

    playAudio();
    html5QrcodeScanner.clear();

    $.ajax({
        url: url + controller,
        data: {id_mobil : id_mobil},
        method: 'post',
        success: function(data) {
            $('.scanner-card').hide();
            $('.hasil-scan').html(data);
        }

    });

}

let x = document.getElementById('myaudio');

function playAudio() { 
    x.play(); 
} 

var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);

