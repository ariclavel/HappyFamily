<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>
  <link rel="stylesheet" href="../css/user_profile_victor.css">
  
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
   

   <div class="content">
   
   
    
    <div class="profile">
       
        

    
    <div class="middle_part">
        <section class="footer_get_touch_outer">
            <div class="container">
              <div class="footer_get_touch_inner grid-70-30">
                <div class="colmun-70 get_form">
                  <div class="get_form_inner">
                    <div class="get_form_inner_text">
                      <h3>Get In Touch</h3>
                    </div>
                    <form action="#">
                      <div class="grid-50-50">
                        <input type="text" placeholder="First Name">
                        <input type="text" placeholder="Last Name">
                        <input type="email" placeholder="Email">
                        <input type="tel" placeholder="Phone/Skype">
                      </div>
                      <div class="grid-full">
                        <textarea placeholder="About Your Project" cols="30" rows="10"></textarea>
                        <input type="submit" value="Submit">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="colmun-30 get_say_form">
                  <h5>Say Hi!</h5>
                  <ul class="get_say_info_sec">
                    <li>
                      <i class="fa fa-envelope"></i>
                      <a href="mailto:">info@Happyhome.com</a>
                    </li>
                    <li>
                      <i class="fa fa-whatsapp"></i>
                      <a href="tel:">+339602381997</a>
                    </li>
                    <li>
                      <i class="fa fa-skype"></i>
                      <a href="#">Stackfindover</a> 
                    </li>
                  </ul>  
                  <ul class="get_say_social-icn">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>          
                </div>        
              </div>
            </div>
          </section>
            
    </div>


























       
        </div>
        </div>

    </div>




</div>



</div>
  

<script>

var modal = document.querySelector(".modal");
var trigger = document.querySelector(".update_pet");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);
</script>
</body>
</html>
