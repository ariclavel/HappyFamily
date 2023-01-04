<?php
include("header.php");
?>
<body>
  <div class="container">
 <img class="logo_image" src="Logo.jpeg">
   <div class="header">Smart Home 
   <a href="logout.php"><button class="logout_button">Logout</button></a>
     <a href="Contact_us.php"><button class="logout_button">Contact Us</button> </a> 
	  </div>
   
    <?php
       include("side_menu.php");
        ?>

   <div class="content">
    <h2>Adding a device</h2>
    <h3>Which room the device is placed?</h3>
    <li><a href = "#">room</a>
        <ul>
            <li><a href = "#">bedroom</a></li>
            <li><a href = "#">bathroom</a></li>
            <li><a href = "#">dining room</a></li>
            <li><a href = "#">living room</a></li>
            <li><a href = "../happyh/lights.html">kitchen</a></li>
        </ul>
    </li>


</div>

<div class="footer">&copy; Smart Home group - Smarthome.com</div>

</div>
</body>
</html>