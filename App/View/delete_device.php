<?php 

require_once'../Model/rooms.php';
 if(isset($_GET['id']))
 {
    $id =$_GET['id'];

 
    $result =delete_device($db,$id);
    if($result)
    {
      header("Location:admin_device_list.php?msg=device deleted successfully");
    }
    else
    {
        echo "Failed: ". mysqli_error($db);
    }
 }
?>