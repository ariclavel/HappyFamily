<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>
  <link rel="stylesheet" href="../css/style_doors&lights_mark.css">
  
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">
  
  <style type="text/css">a
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
   .user_email
   {
    margin-left:30px;
   }

   .both{
    display:flex;
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
<script>
function switch0() {
document.getElementById('changeimg0').src=(document.getElementById('check0').checked)? 
   '../img/entry_door.png': '../img/entrancedoorclosed.png'
}
function switch1() {
document.getElementById('changeimg1').src=(document.getElementById('check1').checked)? 
   '../img/back_door.png': '../img/closeddoor.png'
}
function switch2() {
document.getElementById('changeimg2').src=(document.getElementById('check2').checked)? 
   '../img/garage.png': '../img/garage_gates.jpg'
}
function switch3() {
document.getElementById('changeimg3').src=(document.getElementById('check3').checked)? 
   '../img/pet_door.jpg': '../img/closedpetdoor.png'
}
</script>

<div class="content">

<h2 class="h2">Door system</h2>

<div class="wrap">


  
 <div class="box">
<div class="box_header">Entrance Door</div>
<img class="box_content" src="../img/entrancedoorclosed.png" id="changeimg0">
  <label class="switch">
<input type="checkbox" id="check0" onclick="switch0()">
<span class="slider round"></span>
</label>
</div>
 <div class="box">
<div class="box_header">Back Door</div>
<img class="box_content" src="../img/closeddoor.png" id="changeimg1">
  <label class="switch">
<input type="checkbox" id="check1" onclick="switch1()">
<span class="slider round"></span>
</label>
</div>
 <div class="box">
<div class="box_header">Garage Gates</div>
<img class="box_content" src="../img/garage_gates.jpg" id="changeimg2">
  <label class="switch">
<input type="checkbox" id="check2" onclick="switch2()">
<span class="slider round"></span>
</label>
</div>
 <div class="box">
<div class="box_header">Door for Pet</div>
<img class="box_content" src="../img/closedpetdoor.png" id="changeimg3">
  <label class="switch">
<input type="checkbox" id="check3" onclick="switch3()">
<span class="slider round"></span>
</label>
</div>


  
   </div>
   

</div>
</div>
</div>
</body>
</html>