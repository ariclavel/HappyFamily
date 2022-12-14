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
        <div class="settings">
            <h4 class="text-right">Edit pet</h4>
        </div>

        <form name="form1" id="form1" action="/action_page.php">
            <div class="both">
                  <div class="both_1">
                    <div class="col-md-12"><select class="form-control" name="subject" id="subject">
                        <option value="" selected="selected">Select category</option>
                        <option value="" >Dogs</option>
                        <option value="" >Cats</option>
    
                      </select></div>  
                  
                    <div class="col-md-12"><input type="text" class="form-control" placeholder="Pet name" value=""></div>
                    
                    <div class="col-md-12"><label class="labels">Description</label><br/><textarea id="w3review" name="w3review" rows="4" cols="50">
                       
                        </textarea></div>
                        <div class="both_2">
             
                            <div class="mt-5 text-center"><button class="btnn" type="button">Update</button></div>
        
                  
                        </div>

                 
                  </div>
                  </div>
        </form>
            </div>
            <div class="profile_pxx">
                <img class="image2" width="150px" height="150px" src="../img/pet2.png"><br/><br/><span class="pet_name">Name: Nanny-p</span>
                <div ><button type="button" class="update_pet">change photo</button></div>
            </div>
           
            <div class="modal">
                <div class="modal-content">
                    <span class="close-button">×</span>
                    <h1>Update pet photo</h1>
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