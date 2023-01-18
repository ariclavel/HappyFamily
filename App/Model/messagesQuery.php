<?php

include '../vendor/phpmailer/phpmailer/src/Exception.php';
include '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
include '../vendor/phpmailer/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'connectionreturn.php';

function get_user($id){
    //WHERE userid='$email'
    $dbb = connection();
    //$query=$dbb->prepare("SELECT `message` FROM messages JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id={$userid};") or die($this->conn->error);
    $query=$dbb->prepare("SELECT `first_name`,`last_name` FROM registration WHERE reg_id = $id;") or die($this->conn->error);
       
    if($query->execute()){
            $result=$query->get_result();
            
            return $result;
            
    }

}
function removeslashes($string)
{
    $string=implode("",explode("\\",$string));
    return stripslashes(trim($string));
}
function get_email($id, $reply){
    //WHERE userid='$email'
    $dbb = connection();
    //$query=$dbb->prepare("SELECT `message` FROM messages JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id={$userid};") or die($this->conn->error);
    $query=$dbb->prepare("SELECT `email` FROM registration WHERE reg_id = $id;") or die($this->conn->error);
       
    if($query->execute()){
            $result=$query->get_result();
            
            //return $result;
            //$res = get_email($idmessage);
            $email = "";
            while($row = $result->fetch_assoc()) {
                $email = $row;
            }
            $s = json_encode($email["email"]);
            $a = trim($s,'"');
            echo $a;
            $email = $a;
            //$email = implode('/', $email['email']);
           
            echo $email;
            $mail = new PHPMailer(true);
            $mail->addAddress($email);     
            //mail
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
                       <h2>Dear '.$email.',</h2>
                           <p style="style="color:#080;font-size:18px;">'.$reply.'</p>
           
                       
                   </body>
               </html>
                   
                   ';;
                
            
                $mail->send();
               
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
  

           
                    
    }

}


function message_get(){
    //WHERE userid='$email'
    $dbb = connection();
    //$query=$dbb->prepare("SELECT `message` FROM messages JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id={$userid};") or die($this->conn->error);
    $query=$dbb->prepare("SELECT `message`,`id_user`,`id_message` FROM messages;") or die($this->conn->error);
       
    if($query->execute()){
            $result=$query->get_result();
            
            return $result;
            
    }
}



function message_delete($id){
    $dbb = connection();
    $query=$dbb->prepare("DELETE FROM `messages` WHERE id_message=$id");
        if($query->execute()){ 
            return true;
        }
        else{ 
            return false;
           
        }
}
function message_post($user_id, $message){
    $conn = connection();
    if($conn){
      

        $request = "INSERT INTO `messages`( `message`, `id_user`) VALUES ('$message','$user_id')";
        $statement = $conn->prepare($request);
     
        if($statement->execute()){
           
            return true;
           
        } else{
            echo "ERROR: Could not able to execute $request. " 
                                                . $conn->error;
            return false;
            //header('Location: ../View/devicesManage.php');
        }
    }else{
        echo "no connection!";
    }
    
    
    
}

?>