<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>
  <link rel="stylesheet" href="style.css" />
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
      <div class="promo_card">
        <h1>Welcome to HappyFamily</h1>
        <span>Experience smart life that is pet friendly.</span>
        <button>Learn More</button>
      </div>
      <div class="promo_card">
      <form action = "../Model/addDevice.php" id="form1" method="POST">
          <input type="text" placeholder ="Enter Device name" class="txtbox" id="sname" name="sname"></br>
          <input type="text" placeholder ="Enter Device mode" class="txtbox" id="mode" name="mode"></br>
          <input type="text" placeholder ="Enter description optional" class="txtbox" id="ds" name="ds"></br>
          <input type="text" placeholder ="Enter type" id="type" class="txtbox" name="type"></br>
          <input type="text" placeholder ="Enter room id" class="txtbox" id="roomid" name="roomid"></br>
          <button type= "submit" form="form1" class= "Add_button">Add</button>
          
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
              $resultado.='<button class= "Device1_button">'.$rows[0][$i].'</button><br>';
              //echo $rows[i];
          }

          $resultado.='</p></html>';
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

  
    




