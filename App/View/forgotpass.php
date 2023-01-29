<?php 
session_start();

if(isset($_SESSION['id']))
{
   header("Location:home.php");
   die();
}  
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
  </style>
</head>
    
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/success.css">
    <!-- <link rel="stylesheet" href="../css/dashboard.css"> -->
   
    <body>
      <div class="card">
      <div class="hed">
            <div class="log"><img id="img" src="../img/logo5.png" width="100px" height="100px"/></div>
            <div class="log"><span id="title">Forgot Password</span></div>
            
            
         </div>
      <form method="POST" class="user" action="../Controller/userController.php">
        
        <input type="email" placeholder ="enter email" class="txtbox"  name="email"><br>
        
        <div class="loggin"><button type="submit" name="Forgot_Password" >Login</button></div><br/>
        <?php 
											if(ISSET($_GET['msg'])){
                                    echo "<center><label>".$_GET['msg']."</label></center>";
                                  }
										?>
      </form>
      
      <a href="login.php">Back To Login</a><br/>
        
      </div><br/>
        
 


  
    

      
    


</body>
</html> 