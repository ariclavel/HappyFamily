<!DOCTYPE html>
<html lang="en">
<?php
include("header.php");
?>
<body>
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
    <a href="room.html"><button class= "Add_button">Add</button></a>
    <button class= "Remove_button">Remove</button>

    <?php 
    $_POST["productos"] = array('hola','mundo','con','implode');
    //$resultado = '<html><h2>Productos:</h2><p><b>'.implode("<b></b>", $_POST["productos"])'</b></p></html>';
    /*Inicializar variable sobre la cual se irá concatenando*/
    $resultado = '<html><h2>Devices:</h2><p>';

    for ($i=0; $i<count($_POST["productos"]); $i++){
        $resultado.='<button class= "Device1_button">'.$_POST["productos"][$i].'</button><br>';

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