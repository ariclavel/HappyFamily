<?php
include("header.php");
?>

 <body>

  <div class="container">
 <img class="logo_image" src="../img/logo11.png">
   <div class="header">Smart Home 
   <a href="logout.php"><button class="logout_button">Logout</button></a>
     <a href="Contact_us.php"><button class="logout_button">Contact Us</button></a>
	  </div>
   
      <?php
       include("side_menu.php");
        ?>

   <div class="content">
    <div class="profile">
       
        <div class="profile_px">
        <img class="image" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><br/><span class="User_name">Edogaru</span><br/><span class="user_email">edogaru@mail.com.my</span>
        <div ><button type="button" class="update_photo">change photo</button></div>
    </div>

    
    <div class="middle_part">
        <div class="settings">
            <h4 class="text-right">Profile Settings</h4>
        </div>

        <form name="form1" id="form1" action="/action_page.php">
            <div class="both">
                  <div class="both_1">
                    <div class="col-md-12"><input type="text" class="form-control" placeholder="first name" value=""></div>
                    <div class="col-md-12"><input type="text" class="form-control" value="" placeholder="surname"></div>
                    <div class="col-md-12"><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                    <div class="col-md-12"><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                       
                  
                </div>

                  <div class="both_2">
                    <div class="col-md-12"><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><input type="text" class="form-control" placeholder="enter email id" value=""></div> 
                    <div class="col-md-12"><input type="text" class="form-control" placeholder="enter phone number" value=""></div>      
                    <div class="col-md-12"><select class="form-control" name="subject" id="subject">
                        <option value="" selected="selected">Select country</option>
                        <option value="" >Nigeria</option>
                        <option value="" >France</option>
                        <option value="" >UK</option>
                      </select></div>  
                
                      <div class="col-md-12"><select class="form-control" name="subject" id="subject">
                        <option value="" selected="selected">Select State/region</option>
                        <option value="" >Paris</option>
                        <option value="" >Touluese</option>
                        <option value="" >Samtel</option>
                      </select></div>  
                  
        
        <div class="mt-5 text-center"><button class="btnn" type="button">Save Profile</button></div>
                  </div>
                  </div>
        </form>
            </div>
           
            <div class="modal">
                <div class="modal-content">
                    <span class="close-button">×</span>
                    <h1>Update profile photo</h1>
                    <form action="/action_page.php">
                        <input type="file" id="myFile" name="filename">
                        <input type="submit">
                    </form>
                </div>
            </div>
            
    </div>


























       
        </div>
        </div>

    </div>




</div>

<div class="footer">&copy; Smart Home group - Smarthome.com</div>

</div>



<script>

var modal = document.querySelector(".modal");
var trigger = document.querySelector(".update_photo");
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