<!DOCTYPE html>
<html lang="en">
<?php
include("header.php");
?>
<body>
  <div class="container">
 <img class="logo_image" src="../img/Logo.jpeg">
   <div class="header">Smart Home 
	 <a href="logout.php"><button class="logout_button">Logout</button></a>
	 <button class="logout_button">Contact Us</button> 
	  </div>
   
    <?php
       include("side_menu.php");
        ?>

   <div class="content">
    <a href="room.html"><button class= "Add_button">Add</button></a>
    <button class= "Remove_button">Remove</button>
    <button class= "Device1_button">Device 1</button>
    <button class= "Device2_button">Device 2</button>
    <button class= "Device3_button">Device 3</button>

</div>

<div class="footer">&copy; Smart Home group - Smarthome.com</div>

</div>
</body>
</html>