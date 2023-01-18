<?php 
date_default_timezone_set("Etc/GMT+8");

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once'../Model/conn.php';
if(isset($_SESSION['id']))
{
   header("Location:home.php");
   die();
}

require '../vendor/autoload.php';
include 'Filter_string.php';
$msg = "";

if(isset($_POST['Submit']))
 {
  $email=clean($_POST['email']);
  $code =  clean(md5(rand()));

  $query1 = "SELECT * FROM Registration WHERE email='{$email}'";
  $result1 = $db->query($query1);
  if($result1->num_rows>0)
  {
          $row=mysqli_fetch_assoc($result1);
          $name=$row['first_name'];

      $query2="UPDATE Registration SET activation_code= '{$code}' WHERE email='{$email}'";
      $result2 = $db->query($query2);
      if($result2)
      {
         
         
          //Create an instance; passing `true` enables exceptions
          $mail = new PHPMailer(true);

          try {
          //Server settings
          //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'viqroy@gmail.com';                     //SMTP username
          $mail->Password   = 'joqmllfhsrsoioby';                               //SMTP password
      // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
          $mail->SMTPSecure = 'ssl'; 
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          //Recipients
          $mail->setFrom('viqroy@gmail.com', 'Mailer');
          $mail->addAddress($email);     //Add a recipient            //Name is optional
      // $mail->addReplyTo('info@nwrikd.edu.ng', 'Information');
          
      

          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'Happy Home Reset Password';
          
          $mail->Body    = '
          <html>
              <body style="width: 50%; margin: 0 auto; box-shadow: 0 0 50px #ccc; padding-top: 25px; padding-right: 15px; padding-left: 15px; border-style:ridge; border-width:5px; border-color:blue; border-radius:6px;">
                  <h2>Dear '.$name.',</h2>
                      <p style="style="color:#080;font-size:18px;"><a href="http://localhost/HappyFamily/Victor/View/change_password.php?reset-code='.$code.'" style=" padding:4px 7px 4px 7px; border-radius:5px; background-color:#0099FF; color:#ffffff; float:center; text-decoration:none;">Click to reset password</a>.</p>

                      <p style="style="color:#080;font-size:18px;">Or copy and paste this link on your browser to reset your password<a href="http://localhost/HappyFamily/Victor/View/change_password.php?reset-code='.$code.'">http://localhost/HappyFamily/Victor/View//Change_password.php?reset-code='.$code.'</a></p>
                  
              </body>
          </html>
              
              ';
          

          $mail->send();
      
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
      $_SESSION['message'] = "<div class='alert alert-info'>we've sent a reset password link to your email address.</div>";
      } 
          }
  else
  {
      $_SESSION['message'] = "<div class='alert alert-danger'>Sorry! email address ($email) does not exist</div>";
  }
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
      <form method="POST" class="user">
        
        <input type="email" placeholder ="enter email" class="txtbox"  name="email"><br>
        
        <div class="loggin"><button type="submit" name="Submit" >Login</button></div><br/>
        <?php 
											if(ISSET($_SESSION['message'])){
												echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
											}
                                            unset($_SESSION['message']);
										?>
      </form>
      
      <a href="login.php">Back To Login</a><br/>
        
      </div><br/>
        
 


  
    

      
    


</body>
</html> 