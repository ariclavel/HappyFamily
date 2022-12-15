<?php
include("header.php");
include("../Model/device.query.php");
require '../Model/conn.php';
?>
<body ng-controller="testCtrl">
  <div class="container">
 <img class="logo_image" src="../img/logo5.png">
   <div class="header">Smart Home 
	 <a href="logout.php"><button class="logout_button">Logout</button></a>
	 <button class="logout_button">Contact Us</button> 
	  </div>
   
    <?php
       include("side_menu.php");
       
    ?>

    <div class="content">
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
    
    $_POST["productos"] = device_get($db,"3");
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

<div class="footer">&copy; Smart Home group - Smarthome.com</div>

</div>
</body>
</html>