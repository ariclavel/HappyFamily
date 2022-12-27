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

<div class="footer">&copy; Smart Home group - Smarthome.com</div>

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