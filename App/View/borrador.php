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
      
      <div class="promo_card">
        <h1>Welcome to HappyFamily</h1>
        <span>Experience smart life that is pet friendly.</span>
        <button>Learn More</button>
      </div>
      
    
      
    </div>

    <?php
include("Dashboard_right_menu.php");
?>
  </div>
</body>
</html>

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