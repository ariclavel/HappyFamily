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
   
<div class="content">

    <h2 class="h2">Light system</h2>


  <script>
function switch0() {
document.getElementById('changeimg0').src=(document.getElementById('check0').checked)? 
   '../img/lightbulb.png': '../img/kitchen.png'
}
function switch1() {
document.getElementById('changeimg1').src=(document.getElementById('check1').checked)? 
   '../img/lightbulb.png': '../img/office.png'
}
function switch2() {
document.getElementById('changeimg2').src=(document.getElementById('check2').checked)? 
   '../img/lightbulb.png': '../img/gym.jpg'
}
function switch3() {
document.getElementById('changeimg3').src=(document.getElementById('check3').checked)? 
   '../img/lightbulb.png': '../img/garage.png'
}
function switch4() {
document.getElementById('changeimg4').src=(document.getElementById('check4').checked)? 
   '../img/lightbulb.png': '../img/bathroom.png'
}
function switch5() {
document.getElementById('changeimg5').src=(document.getElementById('check5').checked)? 
   '../img/lightbulb.png': '../img/bedroom.png'
}
</script>
<div class="wrap">
  <div class="box">
	<div class="box_header">Kitchen</div>
	<img class="box_content" src="../img/kitchen.png" id="changeimg0">
	  <label class="switch">
  <input type="checkbox" id="check0" onclick="switch0()">
  <span class="slider round"></span>
</label>
	</div>
	  
	 <div class="box">
	<div class="box_header">Office</div>
	<img class="box_content" src="../img/office.png" id="changeimg1">
	  <label class="switch">
  <input type="checkbox" id="check1" onclick="switch1()">
  <span class="slider round"></span>
</label>
	</div>
	 <div class="box">
	<div class="box_header">Gym</div>
	<img class="box_content" src="../img/gym.jpg" id="changeimg2">
	  <label class="switch">
  <input type="checkbox" id="check2" onclick="switch2()">
  <span class="slider round"></span>
</label>
	</div>
	 <div class="box">
	<div class="box_header">Garage</div>
	<img class="box_content" src="../img/garage.png" id="changeimg3">
	  <label class="switch">
  <input type="checkbox" id="check3" onclick="switch3()">
  <span class="slider round"></span>
</label>
	</div>
	 <div class="box">
	<div class="box_header">Bathroom</div>
	<img class="box_content" src="../img/bathroom.png" id="changeimg4">
	  <label class="switch">
  <input type="checkbox" id="check4" onclick="switch4()">
  <span class="slider round"></span>
</label>
	</div>
 <div class="box">
	<div class="box_header">Bedroom</div>
	<img class="box_content" src="../img/bedroom.png" id="changeimg5">
	  <label class="switch">
  <input type="checkbox" id="check5" onclick="switch5()">
  <span class="slider round"></span>
</label>
	</div>
	<button class="add_button">+</button> 
	  
	   </div>
</div>

</div>
</div>
</div>
</body>
</html>