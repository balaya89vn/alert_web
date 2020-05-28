<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script async defer src="https://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=false&key={{ env('GOOGLE_API_KEY') }}&callback=initialize" type="text/javascript"></script>
    <title>Google map alert</title>
  </head>
  <body>
    <div class="container">
        <h1>Google map</h1>
        <div class="row">
            <div class="col-lg" id="map-content" style="height: 500px">
            </div>
        </div>
    </div>


    <script>
        function initialize() {
            var map = new google.maps.Map(document.getElementById('map-content'), {
                center: {
                    lat: 10.9705925,
                    lng: 106.8931107
                },
                zoom: 10
            });

            var encoded_data = '_pjaA{~sjShE}QbGwWj@sCp@yCf@uBlCiLzAuGZyA\\gBb@iB~@qEZiCRoEJ{FLaLJiEHsEX}Ch@oCXcAj@{A`AkBvAwBx@gAlAkArAeAnA{@`Ak@|Aw@lBaA`B{@tA{@p@Mj@@r@PZRVXLTLv@ARMp@U^_@^c@VYFa@B_@Ie@WQIYo@Q]kA}BgBqDk@gAmCkFo@qAiD}GeA_Cs@sAy@}AQe@yDeHcA_B}A{BkB}ByA_B_B}A}@u@aFsDwDqCuCkBaEiCsIwFmAq@mAu@}CsBgBkAg@e@sE}CsCoBiJeG_TaNmFqD{@k@cFkDyA_AuBqAmH}EkJsGyFsDoBkAaDuBiCqBgAgAkBqBuAeBo@_A{AeCa@u@kAwCgAgDeBoGeDoL_BeGmAiFgEiPmG_VaBwGa@{AaBaGg@mBmBiFiBoDcEqGeBwB{DcE{AyA[c@mBqBwBoBsHsH_K_KyCwCaBaBi@q@i@}@{BaBmBmByCaDuMwMqCyCaD_DcFaFiFoFeC{BeD}B}A}@wBcAsBu@oCy@oBc@oF_AcFY}BAeIAiSQeJKs@?EBC?oNGqDAyJEeKIeBG_AG_E]wB[oAW}Cu@g@Qu@]wAy@WCSIsBgA}KcHqG{DcBiAc@c@kA_AaBsAoB_B}AuA}@}@eDaDsCuCmFcFiDeDkBcBiBkBqBmByBqBeA_AwEoEcHyGoAoA{AaBaEeG}CqEwIoMsBsC}A}BOAwAwBg@mA]w@]qA]iCCg@K?OFGFi@dB_@nA';

            var decode = google.maps.geometry.encoding.decodePath(encoded_data);

            var marker = new google.maps.Marker({
            position: new google.maps.LatLng(55.570, 9.000),
            map: map,
            });

            var line = new google.maps.Polyline({
                path: decode,
                strokeColor: '#00008B',
                strokeOpacity: 1.0,
                strokeWeight: 4,
                zIndex: 3
            });

            line.setMap(map);
        }
    </script>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>