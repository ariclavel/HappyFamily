<?php 
session_start();
require_once'../Model/rooms.php';
 if(isset($_GET['id']))
 {
    $id =$_GET['id'];
    
 
    $result =delete_room($db,$id);
    if($result)
    {
    $idd=$_SESSION['aptid'];
      header("Location:room.php?id=$idd");
    }
    else
    {
        echo "Failed: ". mysqli_error($db);
    }
 }
?>