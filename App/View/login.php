<?php
session_start();
date_default_timezone_set("Etc/GMT+8");

unset($_SESSION['message']);
if(isset($_SESSION['id']))
{
   header("Location:../View/Dashboard.php");
   die();
}
require_once'../Model/user.query.php';
$msg = "";
$activationStatus=1;
if(isset($verify))
{
  $result2 = check_activation_status($db,$verify);
    if($result2->num_rows>0)
    {
        
        $result3= email_verification($db,$activationStatus,$verify);
        if($result3)
        {
            $msg = "<div class='alert alert-success'>Account verification have been successfully completed.</div>";
            $_SESSION['message']= $msg;
        }
    }
    else
    {
      header("Location:login.php");
    }
   } 

   if(isset($_POST['login']))
   {

    $email = $_POST['email'];
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	 if(preg_match($pattern,$_POST['email'])){
	     //$email = $_POST['email'];
	    }else{
            $_SESSION['message'] = '<div class="alert alert-danger text-center">Please type correct Email</div>';
	            	
	    }
    $password=clean(md5($_POST['password']));

    $result4= user_login($db,$email,$password);
    if(($result4->num_rows)>0)
    {
      
        $row=mysqli_fetch_assoc($result4);
        if($row['activation_status']==1)
        {

               $_SESSION['id']= $row['reg_id'];
               $_SESSION['userEmail']= $row['email'];
               $_SESSION['name']= $row['first_name'];
               $_SESSION['surname']= $row['last_name'];
               $_SESSION['type']= $row['type'];
               if( $_SESSION['type'] == "user")
               {
                header("Location:Dashboard.php");
               }
               else
               {
                header("Location:Admin_Dashboard.php");
               }

             
        }
        else
        {
            $_SESSION['message']= "<div class='alert alert-info'>First verify your account and try again.</div>";
        }
    }
    else
    {
        $_SESSION['message'] = "<div class='alert alert-danger'>Email or password do not match.</div>";
    }
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Happy Family</title>
<script src="../js/checkvalue.js" type="text/javascript"></script>
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
      <form  method="POST" id="form">
        
        <input type="email" placeholder ="Email" id="nnn" class="txtbox"  name="email" onblur="IsEmaillog()"><br>
        <span id = "nnnSpan"  style="color:red"></span>
        <input type="password" placeholder ="Password" class="txtbox" id="mmm" name="password" onblur="IsPasswordlog()"><br/>
        <span id = "mmmSpan"  style="color:red"></span>
        <div class="loggin"><button type="submit" name="login" >Login</button></div><br/>
        <?php 
										
                    if(ISSET($_SESSION['message'])){
                      echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
                    }

                                          unset($_SESSION['message']);
                  ?>
      </form>
        
        New User?<a href="signUp.php">Click To Register</a><br/>
        <a href="forgotpass.php">Forgot Password?</a>
      </div><br/>
        
 


  
    

      
    


</body>
</html> 