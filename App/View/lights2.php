<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>
  <link rel="stylesheet" href="../css/style_doors_mark.css">
  
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

<div class="wrap">
	
  <div class="box">
	<div class="box_header">Kitchen</div>
	<img class="box_content" src="../img/kitchen.png">
	  <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
	</div>
	  
	 <div class="box">
	<div class="box_header">Office</div>
	<img class="box_content" src="../img/office.png">
	  <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
	</div>
	 <div class="box">
	<div class="box_header">Gym</div>
	<img class="box_content" src="../img/gym.jpg">
	  <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
	</div>
	 <div class="box">
	<div class="box_header">Garage</div>
	<img class="box_content" src="../img/garage.png">
	  <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
	</div>
	 <div class="box">
	<div class="box_header">Bathroom</div>
	<img class="box_content" src="../img/bathroom.png">
	  <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
	</div>
 <div class="box">
	<div class="box_header">Bedroom</div>
	<img class="box_content" src="../img/bedroom.png">
	  <label class="switch">
  <input type="checkbox">
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