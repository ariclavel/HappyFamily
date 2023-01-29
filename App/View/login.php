<?php
session_start();

unset($_SESSION['message']);
if(isset($_SESSION['id']))
{
   if($_SESSION['type']=="Admin") header("Location:../View/DashboardAdmin.php");
   else header("Location:../View/DashboardUser.php");
   die();
}


?>

<!DOCTYPE html>
<html lang="en">
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
   
    <body>
      <div class="card">
      <div class="hed">
            <div class="log"><img id="img" src="../img/logo5.png" width="100px" height="100px"/></div>
            <div class="log"><span id="title">Login Page</span></div>
            
            
         </div>
      <form  method="POST" id="form" action="../Controller/userController.php">
        
        <input type="email" placeholder ="Email" id="nnn" class="txtbox"  name="email"><br>
        <input type="password" placeholder ="Password" class="txtbox"  name="password"><br/>
       
        
        <div class="loggin"><button type="submit" name="login" >Login</button></div><br/>
        
        <?php 
										
                    if(ISSET($_GET['msg'])){
                      echo "<center><label>".$_GET['msg']."</label></center>";
                    }
                  ?>
      </form>
        
        New User?<a href="signUp.php">Click To Register</a><br/>
        <a href="forgotpass.php">Forgot Password?</a>
      </div><br/>
</body>
</html> 