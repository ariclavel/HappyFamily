<?php
include("header.php");
?>

 <body>

  <div class="container">
 <img class="logo_image" src="../img/logo11.png">
   <div class="header">Smart Home 
   <a href="logout.php"><button class="logout_button">Logout</button></a>
     <a href="Contact_us.php"><button class="logout_button">Contact Us</button> </a>
	   
	  </div>
	   <div class="shadow">
	   </div>
   
  

	   <?php
       include("side_menu.php");
        ?>





   <div class="content">

    <h2 class="h2">Doors system</h2>

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

<div class="footer">&copy; Smart Home group - Smarthome.com</div>

</div>
	</body>
</html>