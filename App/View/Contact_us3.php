<?php 
date_default_timezone_set("Etc/GMT+8");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once'../Model/user.query.php';
if(isset($_SESSION['id']))
{
   header("Location:Contact_us2.php");
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
    $message=clean($_POST['messages']);
    $date_created=date("Y-m-d H:i:s");

   
        
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
    $mail->Username   = 'ktadjouddine@gmail.com';                     //SMTP username
    $mail->Password   = 'joqmllfhsrsoioby';                               //SMTP password
   // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
    $mail->SMTPSecure = 'ssl'; 
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ktadjouddine@gmail.com', 'Mailer');
    $mail->addAddress($email);     //Add a recipient            //Name is optional
   // $mail->addReplyTo('info@nwrikd.edu.ng', 'Information');
    
  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Message From '.$name.'';
    
    $mail->Body    = '
     <html>
        <body style="width: 50%; margin: 0 auto; box-shadow: 0 0 50px #ccc; padding-top: 25px; padding-right: 15px; padding-left: 15px; border-style:ridge; border-width:5px; border-color:pink; border-radius:5px;">
            <h2>Dear '.$name.',</h2>

                <p style="style="color:#080;font-size:18px;"><a href="http://localhost/HAPPYFAMILY/App/View/Mail.php" style=" padding:4px 7px 4px 7px; border-radius:5px; background-color:#0099FF; color:#ffffff; float:center; text-decoration:none;">Click here to verify account</a>.</p>

                <p style="style="color:#080;font-size:18px;">Or copy and paste this link on your browser to activate account <a href="http://localhost/HAPPYFAMILY/App/View/Mail.php">http://localhost/HappyFamily/App/View/verify_success.php?verification='.$code.'</a></p>

            
        </body>
    </html>
        
        ';
    

    $mail->send();
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

                   
                    
$_SESSION['message'] = "<div class='alert alert-info'>Your message is sent</div>";
        }
        else
        {
            $_SESSION['message'] = "<div class='alert alert-danger'> Somthing went wrong.</div>";
        }
    }
    else
     {
        $_SESSION['message'] = "<div class='alert alert-danger'></div>";
     }

        
        



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>
  <link rel="stylesheet" href="../css/contact_victor.css">
  
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/contact_victor.css">
  <style type="text/css">a
   .text-danger{
    color:red;
   }
   .alert-info{
    color:green;
   }
   .main-body{
    margin-right: 230px;
   }
   .side_navbar{
    background-color:#fff;
   }
   #imm{
    padding: 15px;
   }
   .btnn, #btnn{
    background: #f85508;
    border:none;
    color:white;
   }
   .user_email
   {
    margin-left:30px;
   }

   .both{
    display:flex;
   }
 
  </style>
</head>
<body>
<?php
include("Dashboard_header.php");
?>

 
  <div class="container">
  <?php
include("Dashboard_left_menu.php");
?>
   

   <div class="content">
   
   
    
    <div class="profile">
       
        

    
    <div class="middle_part">
        <section class="footer_get_touch_outer">
            <div class="container">
              <div class="footer_get_touch_inner grid-70-30">
                <div class="colmun-70 get_form">
                  <div class="get_form_inner">
                    <div class="get_form_inner_text">
                      <h3>Get In Touch</h3>
                    </div>
                    <form action="#">
                      <div class="grid-50-50">
                        <input type="text" placeholder="First Name">
                        <input type="text" placeholder="Last Name">
                        <input type="email" placeholder="Email">
                        <input type="tel" placeholder="Phone/Skype">
                      </div>
                      <div class="grid-full">
                        <textarea placeholder="About Your Project" cols="30" rows="10"></textarea>
                        <input type="submit" value="Submit">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="colmun-30 get_say_form">
                  <h5>Say Hi!</h5>
                  <ul class="get_say_info_sec">
                    <li>
                      <i class="fa fa-envelope"></i>
                      <a href="mailto:">info@Happyhome.com</a>
                    </li>
                    <li>
                      <i class="fa fa-whatsapp"></i>
                      <a href="tel:">+339602381997</a>
                    </li>
                    <li>
                      <i class="fa fa-skype"></i>
                      <a href="#">Stackfindover</a> 
                    </li>
                  </ul>  
                  <ul class="get_say_social-icn">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>          
                </div>        
              </div>
            </div>
          </section>
            
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
