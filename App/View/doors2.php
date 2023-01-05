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

<h2 class="h2">Door system</h2>

<div class="wrap">


  
 <div class="box">
<div class="box_header">Entrance Door</div>
<img class="box_content" src="../img/entry_door.png">
  <label class="switch">
<input type="checkbox">
<span class="slider round"></span>
</label>
</div>
 <div class="box">
<div class="box_header">Back Door</div>
<img class="box_content" src="../img/back_door.png">
  <label class="switch">
<input type="checkbox">
<span class="slider round"></span>
</label>
</div>
 <div class="box">
<div class="box_header">Garage Gates</div>
<img class="box_content" src="../img/garage_gates.jpg">
  <label class="switch">
<input type="checkbox">
<span class="slider round"></span>
</label>
</div>
 <div class="box">
<div class="box_header">Door for Pet</div>
<img class="box_content" src="../img/pet_door.jpg">
  <label class="switch">
<input type="checkbox">
<span class="slider round"></span>
</label>
</div>


  
   </div>
   

</div>
</div>
</div>
</body>
</html>