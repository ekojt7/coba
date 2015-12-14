<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
      #map-canvas {
        width: 100%;
        height: 500px;
      }
    </style>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

  <script>
function initialize() {
  var myLatlng = new google.maps.LatLng(-6.982010, 110.422968);
  var mapOptions = {
    zoom: 12,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
 
  
  <?php
 include "koneksi.php";
 $id = $_GET['id'];
 $sql = "SELECT * FROM lokasi where idlokasi=$id";

 $result = $mysqli->query($sql);
 
 while($row=$result->fetch_assoc()){
  $nama = $row['nama'];
  $lon  = $row['lon'];
  $lat  =$row['lat'];
  $keterangan =$row['keterangan'];
  $gambar =$row['gambar'];


  echo "var latlng1 = new google.maps.LatLng($lat, $lon);";
  echo "var marker = new google.maps.Marker({    
      position: latlng1,
      map: map,
      title: '$nama'
  });";
  
 }

 $mysqli->close();
?>  
  
}
 
google.maps.event.addDomListener(window, 'load', initialize);
 
    </script>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Starter Template</h1>
      <div class="row center">
        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
      </div>
      
    </div>
  </div>


  <div class="container">
    <div class="section">
  <div class="row center">
       <div id="map-canvas"></div>
      </div>
     
    <div class="section">
      
      <img src="gambar/<?php echo $gambar ?>" alt="<?php echo $gambar ?>">
      <br>
      <h5 class="header col s12 light"><?php echo $keterangan ?></h5>
       
       <form action="rute.php" method="POST">
        <input type="hidden" name="lat" value="<?php echo $lat; ?>">
        <input type="hidden" name="lon" value="<?php echo $lon; ?>">
        
        
        <button class="btn waves-effect waves-light" type="submit" name="action">Rute
    
  </button>
      </form>


    </div>




  </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../../bin/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
