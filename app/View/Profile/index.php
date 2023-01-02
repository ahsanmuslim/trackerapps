<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Geo Location</title>
    <script src="https://polyfill.io/v3/polyfill.js?features=default"></script>
    <style>
        .map {
            height: 400px; /* The height is 400 pixels */
            width: 50%; /* The width is the width of the web page */
        }
    </style>
</head>
<body>
    <h3>Access Geo LOcation User Using HTML5 with Permission</h3>
    <button onclick="getLocation()">Get Location</button>
    <p id="lat"></p>
    <p id="long"></p>
    <div class="map" id="maps1"></div>

    <h3>Access Geo LOcation Using IP Address</h3>
    <button onclick="getLocationByIP()">Get Location IP</button>
    <p id="latip"></p>
    <p id="longip"></p>
    <div class="map" id="maps2"></div>
    
    <p id="hasilscan"></p>

    <button onclick="Scanner()">Scan Barcode</button>
    <button onclick="printResult()">Cetak Hasil</button>

    <script>
        const hasil = document.getElementById('hasilscan');
        var lastResult = '';

        function Scanner() {
            Android.Scanner();
            setTimeout(function(){
                printResult();
            }, 3000);
        };
        
        function printResult() {
            var scanResult = Android.scanResult();
            
            if(!scanResult) {
                Android.showToast("Proses scanning gagal");
            } else if(scanResult == lastResult) {
                Android.showToast("Data sudah ada");
            } else {
                lastResult = scanResult;
                hasil.innerHTML = scanResult;
            }
        }
   
        //Get location by HTML5 Geo Location
        const getLocation = () => {
            //get location from user 
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geo Location is not supported by this browser");
            }
        };
        
        const showPosition = (position) => {
            let lat = position.coords.latitude;
            let long = position.coords.longitude;
            
            const latitude = document.getElementById('lat');
            const longitude = document.getElementById('long');
            
            latitude.innerHTML = 'Latiitude : ' + lat;
            longitude.innerHTML = 'Longitude : ' + long;
            console.log(lat, long);
            initMap(lat, long, 'maps1');
        };
    
        const showError = (error) => {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation");
                    break;
    
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable");
                    break;
    
                case error.TIMEOUT:
                    alert("An unknown error ocurred");
                    break;
                    
                case error.UNKNOWN_ERROR:
                    alert("An unknown error ocurred");
                    break;
    
                default:
                    alert("An unknown error occured");
            };
        };
    
        //Get Location BY IP Address
        const getLocationByIP = () => {
            // fetch('https://ipapi.co/json/')
            fetch('https://api.ipgeolocation.io/ipgeo?apiKey=3e35688af9bd45d78b0d77ea8e5e7a47')
                .then((respon) => respon.json())
                .then((data) => {
                    console.log(typeof Number(data.latitude));
                    const lat2 = document.getElementById('latip');
                    const long2 = document.getElementById('longip');
    
                    lat2.innerHTML = `Latiitude :  ${data.latitude}`;
                    long2.innerHTML = `Longitude : ${data.longitude}`;
                    initMap(parseFloat(data.latitude), parseFloat(data.longitude), 'maps2');
                })
        };
    
        //Generate Maps to Element HtmL
        function initMap(latitude, longitude, elm) {
            // The location of Uluru
            const uluru = { lat: latitude, lng: longitude };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById(elm), {
                zoom: 15,
                center: uluru,
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });
        }
    
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
        defer
    ></script>

</body>

</html>