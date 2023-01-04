<?php 

require_once'../Model/rooms.php';
 if(isset($_GET['id']))
 {
    $id =$_GET['id'];

 
    $result =delete_schedule($db,$id);
    if($result)
    {
      header("Location:ViewSchedule.php?msg=schedule deleted successfully");
    }
    else
    {
        echo "Failed: ". mysqli_error($db);
    }
 }
?>