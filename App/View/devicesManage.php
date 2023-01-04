<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>
 
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">
  </head>
    <body>
      <?php
        include("Dashboard_header.php");
        include("../Model/device.query.php");
      ?>
      <div class="container">
        <?php
          include("Dashboard_left_menu.php");
          session_start(); // this would start session
          $user= $_SESSION['id']; // this would store the session in a variable call $user
          $rooms = room_get_all($user);
          $myRooms=[];
          while($row1 = $rooms->fetch_assoc()) {
                $myRooms[] = $row1;
          }
          for ($i=0; $i<count($myRooms); $i++){
            //echo $rooms[$i];
            //echo $myRooms[$i];
            
          } 
          
          
          
        ?>
        <div class="main-body">
            <h2>Devices</h2>
            <p>Do not forget to asign the device to an existant room!</p>
            <div class="promo_card">
              <form action = "../Model/addDevice.php" method="POST">
                  <input type="hidden" placeholder ="Enter new Device name" class="txtbox" id="user" name="user" value = {$user} ></br>
                  <input type="text" placeholder ="Enter Device name" class="txtbox" id="sname" name="sname"></br>
                  <input type="text" placeholder ="Enter Device mode" class="txtbox" id="mode" name="mode"></br>
                  <input type="text" placeholder ="Enter description optional" class="txtbox" id="ds" name="ds"></br>
                  
                  
                  <select name="customer" id="customer_id">
                      <option value="">-- Select Type -- </option>
                      <option value="For Pet">For pet</option>
                      <option value="Clean">Cleanning</option>
                      <option value="Air conditionner">Air conditionner</option>
                      <option value="Heating">Heating</option> 
                      <option value="Door">Door</option>                              
                  </select>

                  
                  <select name="roomid" id="roomid">
                      <option value="">-- Select Room -- </option>
                      <?php
                        $r ="";
                        for ($i=0; $i<count($myRooms); $i++){
                            //echo $rooms[$i]["room_name"];
                            $r.='<option value='.json_encode($myRooms[$i]["room_id"]).'>'.json_encode($myRooms[$i]["room_name"]).'</option>';
                            
                        }
                        echo $r;
                      ?>
                                                    
                  </select>
                  <button type= "submit" class= "Add_button">Add</button>
                  <br/>
              </form>
              <?php 
                  
                  $result = device_get($user);
                  $myArray=[];
                  while($row = $result->fetch_assoc()) {
                      $myArray[] = $row;
                  }
                 
                    //$resultado = '<html><h2>Productos:</h2><p><b>'.implode("<b></b>", $_POST["productos"])'</b></p></html>';
                  /*Inicializar variable sobre la cual se irá concatenando*/
                  $resultado = '<html><h2>Devices:</h2><p>';
                  
                  for ($i=0; $i<count($myArray); $i++){
                      $m = $i+1;
                      
                      $resultado.='<a href="devicesManage.php?click='.json_encode($myArray[$i]["sensor_id"]).'" class="btn">delete &nbsp;&nbsp;&nbsp;&nbsp;</a><a class="btn">'.json_encode($myArray[$i]["sensor_name"]).': ROOM: '.json_encode($myArray[$i]["room_id"]).'</a><a href="devicesManage.php?click2='.json_encode($myArray[$i]["sensor_id"]).'" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;details</a><br>';
                      //echo $rows[i];
                  }

                  $resultado.='</p></html>';
                  if($_GET['click']??=""){

                    if(device_delete($_GET['click'])==true){ 
                        echo '<script type="text/javascript">
            
                                window.onload = function () { alert("Your device has been deleted!"); }
            
                        </script>';
                        header('Location: ../View/devicesManage.php');
                        
                    }
                    else{ 

                        echo '<script type="text/javascript">
            
                                window.onload = function () { alert("Your device COULD NOT being deleted!"); }
            
                        </script>';
                        header('Location: ../View/devicesManage.php');
                    }
                    
                    
                  }
                  if($_GET['click2']??=""){
                    $res = device_details($_GET['click2']);
                    //echo(json_encode(device_details($_GET['click2'])));
                    echo
                    '<form action = "../Model/editDevice.php" method="POST">
                        
                        <input type="hidden" placeholder ="Enter new Device name" class="txtbox" id="idsens" name="idsens" value = '.$_GET['click2'].'></br>
                       
                        <p> Name : '.$res["name"].'</p><input type="text" placeholder ="Enter new Device name" class="txtbox" id="newname" name="newname"></br>
                        <p> Mode : '.$res["mode"].'</p><input type="text" placeholder ="Enter new Device mode" class="txtbox" id="newmode" name="newmode"></br>
                        <p> Description : '.$res["Description"].'</p><input type="text" placeholder ="Enter new description" class="txtbox" id="newds" name="newds"></br>
                        <p> Type : '.$res["type"].'</p><input type="text" placeholder ="Enter new type" id="newtype" class="txtbox" name="newtype"></br>
                        <button type= "submit" class= "Add_button">Edit</button>
                        <button type= "submit" class= "Add_button"><a href="devicesManage.php" class="Add_button"></a>Cancel</button>
                        
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

  
    




