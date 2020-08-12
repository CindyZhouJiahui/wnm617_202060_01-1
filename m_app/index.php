<?php

session_start();
if(!isset($_SESSION['username'])){
    header('Location:sign_in.html');
}

include "./phps.php";

$phps = new phps();
$search = isset($_GET["search"])?$_GET["search"]:"";
$result = $phps->search($search);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>map</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4zubQw0QLwgLxE-2BXc3g_EjPPdPPD94&callback=initMap"></script>
  </head>
  <body>
    <div class="mapWrap">
        <div class="search">
            <input name="search" value="" placeholder="Search for products">
            <img src="./images/search.png" onclick="search()">
        </div>

      <div class="content" id="googleMap"></div>
      <div class="bottom">
        <a href="#"><img src="images/map.png" alt="" /></a>
        <a href="list.php"><img src="images/list.png" alt="" /></a>
        <a href="user.php"><img src="images/user.png" alt="" /></a>
      </div>
    </div>
  </body>
  <script src="./js/jquery-3.4.1.min.js"></script>
  <script src="./js/function.js"></script>
<script>
    function initialize()
    {

        var mapProp = {
            center: new google.maps.LatLng(41.892713,-87.616152),
            zoom:5,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);


        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo 'var marker'.$row["id"].'=new google.maps.Marker({
                        position: new google.maps.LatLng('.$row["coordinate"].')
                    });
                    marker'.$row["id"].'.setMap(map);
                    var infowindow'.$row["id"].' = new google.maps.InfoWindow({
                        content:"'.$row["title"].'"
                    });
                    infowindow'.$row["id"].'.open(map,marker'.$row["id"].');';
            }
        }
        ?>
    }



    google.maps.event.addDomListener(window, 'load', initialize);

</script>

</html>
