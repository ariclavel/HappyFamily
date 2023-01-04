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

<div class="footer">&copy; Smart Home group - Smarthome.com</div>

</div>
	</body>
</html>