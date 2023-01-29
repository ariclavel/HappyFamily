<?php 

require_once'../Model/rooms.php';
 if(isset($_GET['id']))
 {
    $id =$_GET['id'];

 
    $result =delete_pet($db,$id);
    if($result)
    {
      header("Location:Add_pet.php?msg=pet deleted successfully");
    }
    else
    {
        echo "Failed: ". mysqli_error($db);
    }
 }
?>