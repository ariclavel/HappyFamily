<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';

session_start();


 

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | Happy Family</title>

  
  <!-- Font Awesome Cdn Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/user_profile_victor.css">
 
  
  
  
  <style type="text/css">
    
   .text-danger{
    color:red;
   }
   .alert-info{
    color:green;
   }
   .main-body{
    margin-right: 230px;
   }
   .side_navbar{
    background-color:#fff;
   }
   #imm{
    padding: 15px;
   }
   .btnn, #btnn{
    background: #f85508;
    border:none;
    color:white;
   }
   .settings
   {
    background:red;
    
   }
   .cont {
  width: 950px;
  margin: 1em auto;
  background: #fff;
  padding: 30px;
  border-radius: 5px;
  
}

  
 
  </style>
</head>

<body>
<?php
include("Dashboard_header.php");
?>

 
  <div class="container">
  <?php
include("Dashboard_left_menu.php");
?>
   

<div class="main-body">
   
<div class="content">

<div class="cont"> 
   <h1>TRACK YOUR PET</h1>
   <div id="details"></div>
   <div id="map"></div>
   <script>
    
navigator.geolocation.getCurrentPosition((position) => {
  const{latitude, longitude}= position.coords;
  map.innerHTML = '<iframe width="700" height="300" src="https://maps.google.com/maps?q='+latitude+','+longitude+'&amp;z=15&amp;output=embed"></iframe>';
});
    </script>
<script>


var reqcount = 0;

navigator.geolocation.watchPosition(successCallback, errorCallback, options);

function successCallback(position) {
	const { accuracy, latitude, longitude, altitude, heading, speed } = position.coords;
    // Show a map centered at latitude / longitude.
    reqcount++;
    details.innerHTML = "Accuracy: "+accuracy+"<br>";
    details.innerHTML += "Latitude: "+latitude+" | Longitude: "+longitude+"<br>";
    // details.innerHTML += "Altitude: "+altitude+"<br>";
    // details.innerHTML += "Heading: "+heading+"<br>";
    // details.innerHTML += "Speed: "+speed+"<br>";
    // details.innerHTML += "reqcount: "+reqcount;
}
function errorCallback(error) {
    alert(`ERROR(${error.code}): ${error.message}`);
}
var options = {
	enableHighAccuracy: false,
	timeout: 5000,
	maximumAge: 0
};
</script>

   


    </div>


  </div>
 
  


</body>
</html>
