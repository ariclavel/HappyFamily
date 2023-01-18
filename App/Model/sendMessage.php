
<?php

include '../View/fake.php';



    $reply= $_POST['idmsg']??="";
    $idmessage= $_POST['idsens']; 
    if($reply == ""){
        echo "<script>alert(\"Message empty\")</script>";
        echo "<script> location.replace('../View/fake.php'); </script>";

    }
    $res = get_email($idmessage);
    $email = "";
    while($row = $res->fetch_assoc()) {
        $email = $row;
    }
    /*$email = json_encode($email["email"]);
    $mail = new PHPMailer();
    //SEND MAIL
    $mail->addAddress($email);     
    
  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Happy Family Answer to your problems!';
    
    $mail->Body    = '
     <html>
        <body style="width: 50%; margin: 0 auto; box-shadow: 0 0 50px #ccc; padding-top: 25px; padding-right: 15px; padding-left: 15px; border-style:ridge; border-width:5px; border-color:pink; border-radius:5px;">
            <h2>Dear '.$email.',</h2>
                <p style="style="color:#080;font-size:18px;">'.$reply.'</p>

            
        </body>
    </html>
        
        ';
    

    $mail->send();
   */
    echo "<script>alert(\"Answer sended! $email\")</script>";
    echo "<script> location.replace('../View/fake.php'); </script>";
    
    //echo "<script> location.replace('../View/devicesManage.php'); </script>";
   
   
?>