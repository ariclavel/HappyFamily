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
        ?>
        <div class="main-body">
            <h2>Devices</h2>
            <p>Do not forget to asign the device to an existant room!</p>
            <div class="promo_card">
              <form action = "../Model/addDevice.php" method="POST">
                  <input type="text" placeholder ="Enter Device name" class="txtbox" id="sname" name="sname"></br>
                  <input type="text" placeholder ="Enter Device mode" class="txtbox" id="mode" name="mode"></br>
                  <input type="text" placeholder ="Enter description optional" class="txtbox" id="ds" name="ds"></br>
                  <input type="text" placeholder ="Enter type" id="type" class="txtbox" name="type"></br>
                  <input type="text" placeholder ="Enter room id" class="txtbox" id="roomid" name="roomid"></br>
                  <button type= "submit" class= "Add_button">Add</button>
                  <br/>
              </form>
              <?php 

                  $rows = [];
                  $_POST["productos"] = device_get("3");
                 
                  while($row = mysqli_fetch_array($_POST["productos"])) {
                    $rows[] = $row;
                  }
                  //$resultado = '<html><h2>Productos:</h2><p><b>'.implode("<b></b>", $_POST["productos"])'</b></p></html>';
                  /*Inicializar variable sobre la cual se irá concatenando*/
                  $resultado = '<html><h2>Devices:</h2><p>';

                  for ($i=0; $i<count($rows); $i++){
                      $m = $i+1;
                      
                      $resultado.='<a href="devicesManage.php?click='.$m.'" class="btn">delete    </a><a class="btn">'.$rows[0][$i].'</a>';
                      //echo $rows[i];
                  }

                  $resultado.='</p></html>';
                  if($_GET['click']??=""){
                    device_delete("3");
                    
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

  
    




