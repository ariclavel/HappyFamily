<?php 

require_once'../Model/rooms.php';
 if(isset($_GET['id']))
 {
    $id =$_GET['id'];

 
    $result =delete_pet($db,$id);
    if($result)
    {
      header("Location:manage_pets.php?msg=pet deleted successfully");
    }
    else
    {
        echo "Failed: ". mysqli_error($db);
    }
 }
?>