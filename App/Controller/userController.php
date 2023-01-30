<?php 
date_default_timezone_set("Etc/GMT+8");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once'../Model/user.query.php';
include ('../View/filter_string.php');

 
 $msg="";
 $notActivated=0;
 $activated=1;
 
 unset($_SESSION['message']);


 if(isset($_POST['Register']))
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
            $msg = "<div class='alert text-danger'>Sorry email already exist</div>";
            header("Location: ../View/signUp.php?msg=$msg");

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

                <p style="style="color:#080;font-size:18px;"><a href="http://localhost/HAPPYFAMILY/App/View/verify_success.php?verification='.$code.'" style=" padding:4px 7px 4px 7px; border-radius:5px; background-color:#0099FF; color:#ffffff; float:center; text-decoration:none;">Click here to verify account</a>.</p>

                <p style="style="color:#080;font-size:18px;">Or copy and paste this link on your browser to activate account <a href="http://localhost/HAPPYFAMILY/App/View/verify_success.php?verification='.$code.'">http://localhost/HappyFamily/App/View/verify_success.php?verification='.$code.'</a></p>

            
        </body>
    </html>
        
        ';
    

    $mail->send();
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

                   
                    
      $msg = "<div class='alert alert-info'>we've sent a verification link to your email address.</div>";
      
      header("Location: ../View/signUp.php?msg=$msg");
        }
        else
        {
          $msg = "<div class='alert text-danger'>Invalid registration, somthing went wrong.</div>";
            
            header("Location: ../View/signUp.php?msg=$msg");
        }
    }
    else
     {
      $msg = "<div class='alert text-danger'>Password and Confirm Password do not match</div>";
        header("Location: ../View/signUp.php?msg=$msg");
     }

        
        }   
 }





 //this code will login user
$activationStatus=1;
if(isset($verify))
{
  $result2 = check_activation_status($db,$verify);
    if($result2->num_rows>0)
    {
        
        $result3= email_verification($db,$activationStatus,$verify);
        if($result3)
        {
            $msg = "<div class='alert alert-info'>Account verification have been successfully completed.</div>";
          
            header("Location: ../View/login.php?msg=$msg");

        }
    }
    else
    {
        header("Location: ../View/login.php");
    }
   } 

   if(isset($_POST['login']))
   {

    $email = $_POST['email'];
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	 if(preg_match($pattern,$_POST['email'])){
	     //$email = $_POST['email'];
	    }else{
        $msg = '<div class="alert text-danger text-center">Please type correct Email</div>';
            header("Location: ../View/login.php?msg=$msg");
	            	
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
                header("Location:../View/DashboardUser.php");
                
               }
               else
               {
                header("Location:../View/DashboardAdmin.php");
               }

             
        }
        else
        {
          $msg= "<div class='alert text-danger'>First verify your account and try again.</div>";
            header("Location: ../View/login.php?msg=$msg");
        }
    }
    else
    {
      $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        header("Location: ../View/login.php?msg=$msg");
    }
   }

    



  //this code will set forgot password
  if(isset($_POST['Forgot_Password']))
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
                      <p style="style="color:#080;font-size:18px;"><a href="http://localhost/HappyFamily/App/View/change_password.php?reset-code='.$code.'" style=" padding:4px 7px 4px 7px; border-radius:5px; background-color:#0099FF; color:#ffffff; float:center; text-decoration:none;">Click to reset password</a>.</p>

                      <p style="style="color:#080;font-size:18px;">Or copy and paste this link on your browser to reset your password<a href="http://localhost/HappyFamily/App/View/change_password.php?reset-code='.$code.'">http://localhost/HappyFamily/App/View//Change_password.php?reset-code='.$code.'</a></p>
                  
              </body>
          </html>
              
              ';
          

          $mail->send();
      
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
      $msg = "<div class='alert alert-info'>we've sent a reset password link to your email address.</div>";
      header("Location: ../View/forgotpass.php?msg=$msg");
      } 
          }
  else
  {
    $msg = "<div class='alert alert-danger'>Sorry! email address ($email) does not exist</div>";
      header("Location: ../View/forgotpass.php?msg=$msg");
  }
 }




 //This code would update user profile image
 if(ISSET($_POST['update_user_photo']))
  {
 $pic = $_FILES['userPic'];
 $picName = $pic['name'];
 $picTmpName = $pic['tmp_name'];
 $picError = $pic['error'];
 $picExt = explode('.', $picName);
 $picActualExt = strtolower(end($picExt));
 $allowed = array('jpg','jpeg','png');
 if(in_array($picActualExt, $allowed))
 {
   if($picError === 0)
   {
     $_SESSION['userPic'] = $_SESSION['id'];
     $userName = $_SESSION['name'];
     $picNameNew = $userName. $_SESSION['id'].".".$picActualExt;
     $picDestination = "../img/profile_pix/".$picNameNew;
     move_uploaded_file($picTmpName, $picDestination);
     $id = $_SESSION['id'];

     $sql = "UPDATE Registration SET profile_pic='$picNameNew' WHERE reg_id='$id';";

     $result = mysqli_query($db, $sql);
     if($result)
     {

   
      $msg = "<div class='alert alert-info'>profile Image Uploaded successfully.</div>";
       header("Location: ../View/userProfile2.php?msg=$msg");
       
     }
     else
     {
       
      $msg = "<div class='alert text-danger'>There was an error in uploading your profile Image! Please Try again!.</div>";
       header("Location: ../View/userProfile2.php?msg=$msg");
     }
   }
   else
   {
     
    $msg = "<div class='alert text-danger'>There was an error in uploading your profile image! Please Try again!.</div>";
     header("Location: ../View/userProfile2.php?msg=$msg");
   }
 }
 else
 {
  $msg = "<div class='alert text-danger'>You cannot upload files with this extension!!!</div>";
   
   header("Location: ../View/userProfile2.php?msg=$msg");
 }
}



//This code would update user profile details
if (ISSET($_POST['update_user_profile']))
  {
    /*if(strlen($_POST['postcode2'])> 5 || strlen($_POST['postcode2'])< 5 ){
      echo "<script>alert(\"Postal code has to be 5 digits\")</script>";
      echo "<script> location.replace('../View/userprofile2.php'); </script>";
    }*/
    $userID = $_SESSION['id'];
     $name= clean($_POST['fname']);
     $lname=clean($_POST['lname']);
     $phoneNumber=clean($_POST['phone_no']);
     $result2 = update_user($db,$userID,$name,$lname,$phoneNumber);

     //for address
     $address1= clean($_POST['address_1']);
     $address2=clean($_POST['address_2']);
     $country=clean($_POST['country']);
     $city=clean($_POST['state']);
     $postCode1=clean($_POST['postcode1']);
     
     $postCode2=clean($_POST['postcode2']);
     
     $arr_postalCode=[];
     $arr_postalCode[0]=$postCode1;
     $arr_postalCode[1]=$postCode2;
     $array_size_post=sizeof($arr_postalCode);

     $arr_address=[];
     $arr_address[0]=$address1;
     $arr_address[1]= $address2;
     
     $array_size=sizeof($arr_address);
     
 
   

    if($address1 !="" && $postCode1!="")
    {
      $result =add_user_address($db,$arr_address[0],$country,$city,$arr_postalCode[0],$userID);
      if($result2)
      {
        
        $msg = "<div class='alert alert-info'>User profile updated successfully.</div>";
        header("Location: ../View/userProfile2.php?msg=$msg");

      }
      else
      {
        $msg = "<div class='alert text-danger'>Sorry! error updating profile</div>";
        header("Location: ../View/userProfile2.php?msg=$msg");
      }
    }
    else
    {
      $msg = "<div class='alert text-danger'>Sorry! error invalid! address and post code.</div>";
      header("Location: ../View/userProfile2.php?msg=$msg");
    }

    if($address1 !=null && $postCode1!=null)
    {
      $result =add_user_address($db,$arr_address[1],$country,$city,$arr_postalCode[1],$userID);
    }
    else
    {
      $msg = "<div class='alert text-danger'>Sorry! error invalid! address and post code.</div>";
        header("Location: ../View/userProfile2.php?msg=$msg");
    }
       
  }





  //this code will reset user password
  if(isset($_GET['reset-code']))
{
    $query1 = "SELECT * FROM Registration WHERE activation_code='{$_GET['reset-code']}'";
    $result1 = $db->query($query1);
    if($result1->num_rows>0)
    {
       if(isset($_POST['change_password']))
       {
         $password=clean(md5($_POST['password']));
         $confirm_password=clean(md5($_POST['confirm-password']));
          if($password==$confirm_password)
          {
               $query2="UPDATE Registration SET password='{$password}' WHERE activation_code='{$_GET['reset-code']}'";
               $result2 = $db->query($query2);
               if($result2)
               {
                $msg = "<div class='alert alert-info'>Password reset successfully.</div>";
                  header("Location:../View/login.php?msg=$msg");

               }
          }
          else
          {
            $msg = "<div class='alert text-danger'>Error! Password and confirm password do not match.</div>";
            header("Location:../View/login.php?msg=$msg");
          }
       }
    }
    else
    {
        $msg = "<div class='alert text-danger'>Sorry! your reset password link do not match.</div>";
        header("Location:../View/login.php?msg=$msg");
    }

}

?>