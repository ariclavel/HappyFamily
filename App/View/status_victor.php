<?php
session_start();
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $_SESSION['Did']=$id ;
}



require_once'../Model/rooms.php';
require '../vendor/autoload.php';


$result = select_status($db,  $id);
$fetch=$result->fetch_array();
$status =$fetch['device_status'];

$_SESSION['device_status'] = $status;
echo ($status) ? 'checked' : '';


?>




