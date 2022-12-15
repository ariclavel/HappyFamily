<?php date_default_timezone_set("Etc/GMT+8");

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once'../Model/user.query.php';
if(isset($_SESSION['id']))
{
   header("Location:home.php");
   die();
}

 
 $msg="";
 $notActivated=0;
 $activated=1;
 
 unset($_SESSION['message']);
 if(isset($_POST['submit']))
 {
    
     $name= clean($_POST['fname']);
     $lname=clean($_POST['lname']);
     $email=clean($_POST['email']);
     $password=clean($_POST['password']);
     $confirm_password=clean($_POST['cpassword']);
     $date_created=date("Y-m-d H:i:s");
     $code =  md5(rand());
    //this code would verify he existence of the mail
     $result2 = check_email($db,$email);
   
        if($result2->num_rows>0)
        {
            $_SESSION['message'] = "<div class='alert alert-danger'>Sorry email already exist</div>";

        }
        else
        {
     if($password==$confirm_password)
            {

        $final_password= md5($_POST['password']);
        $result =add_user($db,$name,$lname,$email,$final_password,$code,$notActivated,$date_created);
        
        
        if($result)
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
    $mail->Subject = 'Happy Family Verify account';
    
    $mail->Body    = '
     <html>
        <body style="width: 50%; margin: 0 auto; box-shadow: 0 0 50px #ccc; padding-top: 25px; padding-right: 15px; padding-left: 15px; border-style:ridge; border-width:5px; border-color:pink; border-radius:5px;">
            <h2>Dear '.$name.',</h2>

                <p style="style="color:#080;font-size:18px;"><a href="http://localhost/HAPPYFAMILY/Victor/View/verify_success.php?verification='.$code.'" style=" padding:4px 7px 4px 7px; border-radius:5px; background-color:#0099FF; color:#ffffff; float:center; text-decoration:none;">Click here to verify account</a>.</p>

                <p style="style="color:#080;font-size:18px;">Or copy and paste this link on your browser to activate account <a href="http://localhost/HAPPYFAMILY/Victor/View/verify_success.php?verification='.$code.'">http://localhost/HappyFamily-main/src/View/verify_success.php?verification='.$code.'</a></p>

            
        </body>
    </html>
        
        ';
    

    $mail->send();
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

                   
                    
$_SESSION['message'] = "<div class='alert alert-info'>we've sent a verification link to your email address.</div>";
        }
        else
        {
            $_SESSION['message'] = "<div class='alert alert-danger'>Invalid registration, somthing went wrong.</div>";
        }
    }
    else
     {
        $_SESSION['message'] = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
     }

        
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

<link rel="stylesheet" href="../css/success.css">
<body>

<div class="card">
      <div class="hed">
            <div class="log"><img id="img" src="../img/logo5.png" width="100px" height="100px"/></div>
            <div class="log"><span id="title">Registration Page</span></div>
            
            
         </div>
         <form method="POST">
            
            <input type="text" placeholder ="Enter first name" class="txtbox" id="fname" name="fname"></br>
            <input type="text" placeholder ="Enter last name" class="txtbox" id="lname" name="lname"></br>
             <input type="email" placeholder ="Enter email" class="txtbox" id="email" name="email"></br>
               
             <input type="password" placeholder ="Enter password"id="password" class="txtbox" name="password"></br>
         
             <input type="password" placeholder ="Retype password" class="txtbox" id="cpassword" name="cpassword"></br>
   
           
          
               <div class="loggin"><a href="signUp.php"><button name="submit" type="submit" >Register</button></a></div><br/>
             <a href="login.php">Click to sign-in</a>
           <br/>
           <?php 
                         
                         if(ISSET($_SESSION['message'])){
                           echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
                         }
                       ?>
           </form>
           <br/>
       </div>
      </div><br/>



</body>
</html> 