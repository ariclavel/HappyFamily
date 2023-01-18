<?php
$name =$_SESSION['name'];
$lastname=$_SESSION['surname'];
?>
<header class="header">
    <div class="logo">
      <a class="titt" href="../home.php">Happyfamily</a>
      <div class="search_box">
        <input type="text" placeholder="Search happyfamily">
        <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
      </div>
    </div>
  
      <a href = "contact_us2.php">Contact Us</a>
   

    <div class="header-icons">
    <p>Welome <?php echo $name." ".$lastname?></p>
      <div class="account">
      <img class="logo_image" src="../img/logo11.png">
      
      </div>
    </div>
  </header>