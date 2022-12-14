<?php
session_start();
date_default_timezone_set("Etc/GMT+8");


if(isset($_SESSION['id']))
{
   header("Location:../home.php");
   die();
}
require_once'../Model/user.query.php';
$msg = "";
$verify=$_GET['verification'];
$activationStatus=1;
if(isset($verify))
{
  $result2 = check_activation_status($db,$verify);
    if($result2->num_rows>0)
    {
        
        $result3= email_verification($db,$activationStatus,$verify);
      
        
    }
    else
    {
      header("Location:login.php");
    }
   } 

?>


<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/success.css">
</head>
   
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>Please click the link below to login;<br/> <a href="login.php">Proceed to login</a></p>
      </div>
    </body>
</html>