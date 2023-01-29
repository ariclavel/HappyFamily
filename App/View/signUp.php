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

<link rel="stylesheet" href="../css/success.css">
<!-- <link rel="stylesheet" href="../css/dashboard.css"> -->
<body>

<div class="card">
      <div class="hed">
            <div class="log"><img id="img" src="../img/logo5.png" width="100px" height="100px"/></div>
            <div class="log"><span id="title">Registration Page</span></div>
            
            
         </div>
         <form method="POST" action="../Controller/userController.php">
            
            <input type="text" placeholder ="First name" class="txtbox" id="fname" name="fname"></br>
            <input type="text" placeholder ="Last name" class="txtbox" id="lname" name="lname"></br>
             <input type="email" placeholder ="Email" class="txtbox" id="email" name="email"></br>
               
             <input type="password" placeholder ="Password"id="password" class="txtbox" name="password"></br>
         
             <input type="password" placeholder ="Retype password" class="txtbox" id="cpassword" name="cpassword"></br>
   
           
          
               <div class="loggin"><a href="signUp.php"><button name="Register" type="submit">Register</button></a></div><br/>
             <a href="login.php">Click to sign-in</a>
           <br/>
           <?php 
                         
                         if(ISSET($_GET['msg'])){
                          echo "<center><label>".$_GET['msg']."</label></center>";
                        }
                       ?>
           </form>
           <br/>
       </div>
      </div><br/>



</body>
</html> 