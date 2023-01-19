<?php

session_start();
if(!isset($_SESSION['id']))
{
   header("Location:../home.php");
   die();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>
 
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/user_profile_victor.css">
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
        include("../Model/messagesQuery.php");
      ?>
      <div class="container">
        <?php
          include("Dashboard_left_menu.php");
          //session_start(); // this would start session
          $user= $_SESSION['id']; // this would store the session in a variable call $user
          $messages = message_get();
          $mymsg=[];
          while($row1 = $messages->fetch_assoc()) {
                $mymsg[] = $row1;
          }
          /*for ($i=0; $i<count($mymsg); $i++){
            echo $mymsg[$i];
            //echo $rooms[$i];
            //echo $myRooms[$i];
            
          } */
          
          
          
        ?>
        <div class="main-body">
        <section class="footer_get_touch_outer">
            <div class="container">
              <div class="footer_get_touch_inner grid-70-30">
                <div class="colmun-70 get_form">
                  <div class="get_form_inner">
                    <div class="get_form_inner_text">
                      <h3>Get In Touch</h3>
                    </div>
                    <form action = "../Model/addMessage.php" method="POST">
                      
                      <div class="grid-full">
                        <textarea placeholder="About Your Project" cols="30" rows="10" id="message" name="message"></textarea>
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

          <?php
            include("Dashboard_right_menu.php");
          ?>
      </div>
  </body>
</html>

  
    




