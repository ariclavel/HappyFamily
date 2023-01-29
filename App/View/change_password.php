<?php


?>



<!DOCTYPE html>
<html>
<head>
<title>Happy Family</title>
<style type="text/css">
   .text-danger{
    color:red;
   }
   .alert-info{
    color:green;
   }
   .alert-success
   {
    color:green;
   }
  </style>
</head>
    
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/success.css">
   
    <body>
      <div class="card">
      <div class="hed">
            <div class="log"><img id="img" src="../img/logo5.png" width="100px" height="100px"/></div>
            <div class="log"><span id="title">Change Password Page</span></div>
            
            
         </div>
      <form  method="POST" id="form" action="../Controller/userController.php">
        
        <input type="password" placeholder ="enter new password" class="txtbox"  name="password"><br>
        <input type="password" placeholder =" confirm new password" class="txtbox"  name="confirm-password"><br/>
       
        
        <div class="loggin"><button type="submit" name="change_password" >Reset</button></div><br/>
        
        <?php 
										
                    if(ISSET($_GET['msg'])){
                      echo "<center><label>".$_GET['msg']."</label></center>";
                    }
                  ?>
      </form>
        <p>Back to! <a href="login.php">Login</a>.</p>
      </div><br/>
        
 


  
    

      
    


</body>
</html> 