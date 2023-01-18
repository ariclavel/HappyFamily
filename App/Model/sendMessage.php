
<?php
    


    //require_once'../Model/user.query.php';
    include '../View/fake.php';
    $reply= $_POST['idmsg']??="";
    $idmessage= $_POST['idsens']; 
    if($reply == ""){
        echo "<script>alert(\"Message empty\")</script>";
        echo "<script> location.replace('../View/fake.php'); </script>";

    }
    $res = get_email($idmessage,$reply);
  
    //$mail = new PHPMailer(true);
    //SEND MAIL
/*
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

                <p style="style="color:#080;font-size:18px;"><a href="http://localhost/HAPPYFAMILY/App/View/verify_success.php?verification='.$code.'" style=" padding:4px 7px 4px 7px; border-radius:5px; background-color:#0099FF; color:#ffffff; float:center; text-decoration:none;">Click here to verify account</a>.</p>

                <p style="style="color:#080;font-size:18px;">Or copy and paste this link on your browser to activate account <a href="http://localhost/HAPPYFAMILY/App/View/verify_success.php?verification='.$code.'">http://localhost/HappyFamily/App/View/verify_success.php?verification='.$code.'</a></p>

            
        </body>
    </html>
        
        ';
    

    $mail->send();
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}*/
   
   
    echo "<script>alert(\"Answer sended! $email\")</script>";
    echo "<script> location.replace('../View/fake.php'); </script>";
    
    //echo "<script> location.replace('../View/devicesManage.php'); </script>";
   
   
?>