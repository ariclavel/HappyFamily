<?php
include("header.php");
?>

 <body>

  <div class="container">
 <img class="logo_image" src="assets/img/logo11.png">
   <div class="header">Smart Home 
   <a href="logout.php"><button class="logout_button">Logout</button></a>
     <a href="Contact_us.php"><button class="logout_button">Contact Us</button> </a>
	  </div>

      <?php
       include("side_menu.php");
        ?>

   <div class="content">

    
    <div class = "col-md-8 mt-1">
        <div class ="card mb-3 content">
            <h2 class ="m-3_pt-3">User Profile </h2>
            <div class = "profile_pic">
                <img src ="image.jpg">
            </div>
            <div class = "card-body">
                <div class = "row">
                    <div class = "col-md-3">
                        <h2 class ="subheading">First name</h2>
                    </div>
                    <div class = "col-md-9 text secondary">
                        Callum
                    </div>
                </div>
                <hr>
                <div class = "row">
                    <div class = "col-md-3">
                        <h2 class ="subheading">Last name</h2>
                    </div>
                    <div class = "col-md-9 text secondary">
                        Lock
                    </div>
                </div>
                <hr>
                <div class = "row">
                    <div class = "col-md-3">
                        <h2 class ="subheading">Email</h2>
                    </div>
                    <div class = "col-md-9 text secondary">
                        abc@gmail.com 
                    </div>
                </div>
                <hr>
                <div class = "row">
                    <div class = "col-md-3">
                        <h2 class ="subheading">Phone Number</h2>
                    </div>
                    <div class = "col-md-9 text secondary">
                        072765427
                    </div>
                </div>
                <hr>
                <div class = "row">
                    <div class = "col-md-3">
                        <h2 class ="subheading">Address</h2>
                    </div>
                    <div class = "col-md-9 text secondary">
                        street number, dwgg
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <button class= "User_button">Update</button>

</div>

<div class="footer">&copy; Smart Home group - Smarthome.com</div>

</div>


</body>
</html>