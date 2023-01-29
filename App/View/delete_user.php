<?php 

require_once'../Model/user.query.php';
 if(isset($_GET['id']))
 {
    $id =$_GET['id'];

 
    $result =delete_user($db,$id);
    if($result)
    {
      header("Location:UsersAdmin.php?msg=user deleted successfully");
    }
    else
    {
        echo "Failed: ". mysqli_error($db);
    }
 }
?>