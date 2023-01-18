<?php
date_default_timezone_set("Etc/GMT+8");
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
            <h2>MESSAGES</h2>
            
            <div class="promo_card">
             
              <?php 
                  
                  $result = message_get();
                  $myArray=[];
                  while($row = $result->fetch_assoc()) {
                      $myArray[] = $row;
                  }
                 
                    //$resultado = '<html><h2>Productos:</h2><p><b>'.implode("<b></b>", $_POST["productos"])'</b></p></html>';
                  /*Inicializar variable sobre la cual se irá concatenando*/
                  $resultado = '<html><h2>MESSAGES:</h2><p>';
                  
                  for ($i=0; $i<count($myArray); $i++){
                      $m = $i+1;
                      $username = get_user($myArray[$i]["id_user"]);
                      $name = "";
                      while($row = $username->fetch_assoc()) {
                        $name = $row;
                      }
                      $resultado.='<a href="fake.php?click='.json_encode($myArray[$i]["id_message"]).'" class="btn">delete &nbsp;&nbsp;&nbsp;&nbsp;</a><a class="btn">'.json_encode($name["first_name"])." ".json_encode($name["last_name"]).': MESSAGE: '.json_encode($myArray[$i]["message"]).'</a><a href="fake.php?click2='.json_encode($myArray[$i]["id_user"]).'" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;answer</a><br>';
                      //echo $rows[i];
                  }

                  $resultado.='</p></html>';
                  if($_GET['click']??=""){

                    if(message_delete($_GET['click'])==true){
                        echo "<script>alert(\"Your message has been deleted!\")</script>"; 
                        echo "<script> location.replace('../View/fake.php'); </script>";
                    }
                    else{ 

                      echo "<script>alert(\"Your message could not being deleted!\")</script>"; 
                      echo "<script> location.replace('../View/fake.php'); </script>";
                    }
                    
                    
                  }
                  if($_GET['click2']??=""){
                  
                    //echo(json_encode(device_details($_GET['click2'])));
                    echo
                    '<form action = "../Model/sendMessage.php" method="POST">
                    <input type="hidden" placeholder ="Enter new Device name" class="txtbox" id="idsens" name="idsens" value = '.$_GET['click2'].'></br>
                        <input type="hidden" placeholder ="Enter new Device name" class="txtbox" id="idmsg" name="idmsg" value = '.$_GET['click2'].'></br>
                       
                        <p> Answer</p><input type="text" placeholder ="Enter your answer" class="form-control" id="newname" name="newname"></br>
                        <button type= "submit" class= "Add_button">Send Answer</button>
                      
                        <br/>
                    </form>';
                   
                    

                    
                  }
      
                  /*Imprimimos la variable*/
                  echo $resultado;

              ?>
              
              
            </div>

            
        </div>

          <?php
            include("Dashboard_right_menu.php");
          ?>
      </div>
  </body>
</html>

  
    




