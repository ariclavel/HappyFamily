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
   
    <?php
       include("side_menu.php");
        ?>

   <div class="content">
    <a href=""><button class= "Camera_button">Camera</button></a>
    <a href="doors.php"><button class= "Door_button">Door</button></a>
      <a href=""><button class= "AirCon_button">One Air Conditioner</button></a>
    <a href="lights.php"><button class= "Light_button">Lights</button></a>
    <a href=""><button class= "Clean_button">Cleaning</button></a>
      <a href=""><button class= "Alarm_button">Alarm</button></a>

</div>

<div class="footer">&copy; Smart Home group - Smarthome.com</div>

</div>
</body>
</html>