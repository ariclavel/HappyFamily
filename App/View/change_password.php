<?php
session_start();
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/user.query.php';
$msg="";
unset($_SESSION['message']);
if(isset($_GET['reset-code']))
{
    $query1 = "SELECT * FROM Registration WHERE activation_code='{$_GET['reset-code']}'";
    $result1 = $db->query($query1);
    if($result1->num_rows>0)
    {
       if(isset($_POST['submit']))
       {
         $password=clean(md5($_POST['password']));
         $confirm_password=clean(md5($_POST['confirm-password']));
          if($password==$confirm_password)
          {
               $query2="UPDATE Registration SET password='{$password}' WHERE activation_code='{$_GET['reset-code']}'";
               $result2 = $db->query($query2);
               if($result2)
               {
                $_SESSION['message'] = "<div class='alert alert-success'>Password reset successfully.</div>";
                  //header("Location:login.php");

               }
          }
          else
          {
            $_SESSION['message'] = "<div class='alert alert-danger'>Error! Password and confirm password do not match.</div>";
          }
       }
    }
    else
    {
        $_SESSION['message'] = "<div class='alert alert-danger'>Sorry! your reset password link do not match.</div>";
        
    }

}
else
{
    header("Location:forgotpass.php");
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
      <form  method="POST" id="form">
        
        <input type="password" placeholder ="enter new password" class="txtbox"  name="password"><br>
        <input type="password" placeholder =" confirm new password" class="txtbox"  name="confirm-password"><br/>
       
        
        <div class="loggin"><button type="submit" name="submit" >Reset</button></div><br/>
        
        <?php 
										
                    if(ISSET($_SESSION['message'])){
                      echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
                    }

                                          unset($_SESSION['message']);
                  ?>
      </form>
        <p>Back to! <a href="login.php">Login</a>.</p>
      </div><br/>
        
 


  
    

      
    


</body>
</html> 