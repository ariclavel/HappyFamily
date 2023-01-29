<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';

session_start();


unset($_SESSION['message']);
$apart_id=$_GET['id'];
$user_id=$_SESSION['id'];
$getApart=display_apartment($db, $apart_id);
$fetch=$getApart->fetch_array();
$number_of_rooms = $fetch['number_of_rooms'];


$count = get_total_rooms($db, $apart_id);
$roomsLeft =$number_of_rooms - $count;
 if(isset($_POST['submit']))
 {
    
     $roomName= clean($_POST['roomName']);
     $roomNumber=clean($_POST['roomNumber']);
   
    
    
        

        if($count < $number_of_rooms)
        {
          $result =add_room($db,$roomName,$roomNumber,$apart_id,$user_id);
          $roomsLeft = $number_of_rooms - 1;
          //$_SESSION['room_left']= $roomsLeft;
        
        if($result)
        {
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            
        $_SESSION['message'] = "<div class='alert alert-info'>Room successful added to this apartment.</div>";
        header("Location:  $actual_link");  
        }
        else
        {
          $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $_SESSION['message'] = "<div class='alert alert-danger'>Error adding room. Please try again.</div>";
            header("Location:  $actual_link");  
          }
        }
        else
        {

          
          $_SESSION['message'] = "<div class='alert alert-danger'>Hello! cannot add any more rooms!.</div>";
          
        }
        
        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>

  
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/user_profile_victor.css">
  <style type="text/css">

    .main-body{
        display:flex;
        gap: 2em;
    }
    .fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */
.main-body{
    margin-right: 230px;
   }
@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
        
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }

   
}

.text-danger{
    color:red;
   }
   .alert-info{
    color:green;
   }
   .main-body{
    margin-right: 230px;
   }
   .side_navbar{
    background-color:#fff;
   }
   #imm{
    padding: 15px;
   }
   .btnn, #btnn{
    background: #f85508;
    border:none;
    color:white;
   }
   .settings
   {
    background:red;
    
   }
   #count{
    color:red;
   }
 
  </style>
</head>
<body>
<?php
include("Dashboard_header.php");
?>

 
  <div class="container">
  <?php
include("Dashboard_left_menu.php");
?>
   

<div class="main-body">
   
<div class="content">

<form method="POST">
         <table>
         <tr>
               <th><h4 class="text-right">ADD ROOMS  TO APARTMENT->((<span id="count"><?php echo $roomsLeft ?>) Rooms Left)</span></h4></th>
        </tr>
                <tr>
                            <td> 
                            <input type="text" id="roomName" placeholder="room name like (master bedroom)" class="form-control" name="roomName"   required>
                            </td>
                           
                
                </tr>
                <tr>
                <td>
                <select name="roomNumber" class="form-control">
                            <option value="" selected="selected">Room number</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                   
                                                </select> </td>
                </tr>
                
                <tr>
               
                <td>
                  <?php 
                         
                         if(ISSET($_SESSION['message'])){
                           echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
                         }
                       ?></td>
                

               

                <tr>
                    
                    <td> 
                    <button type="submit" name="submit" class="btnn">Submit</button>
                    </td>
                   <td>
                   
                    </td>
                    <td> 
                   
                    <br/>
                    
                    </td>
                    
                </tr>
               
          </table> <br/>
                           
                        
        </form>
       

        
</div>
  
 <div class="apart_view">
  <h4>LIST OF ROOMS ADDED</h4>
 <div class="table-wrapper">
        <table class="fl-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Room Name</th>
                                            <th>Room No</th>
                                           
                                
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                           $apartID=$_GET['id'];
                                           $_SESSION['aptid']=$apartID;
                                          $stmt1 = "SELECT * FROM rooms WHERE apartment_id='$apartID'";
                                                  $result=mysqli_query($db,$stmt1);
                                                  if(mysqli_num_rows($result)<=0)
                                                  {
                                              ?>
                                              <tr ><td id="empty">There are no rooms belonging to this apartment</td></tr>
                                                <?php
                                                  }

                                                  ?>
										<?php
                                          
                                            $i=1;
                                           
                                            $tbl_schedule = display_apart_room($db, $apartID);
											                    while($fetch=$tbl_schedule->fetch_array()){ 
										?>
											<tr>
												<td><?php echo $i++?></td>
                                                
												<td><?php echo $fetch['room_name']?></td>
												<td><?php echo $fetch['room_number']?></td>
												
												
                                            
                                                <td>
                                                <a href="editRoom.php?id=<?php echo $fetch['room_id']?>"><i class="fa-solid fa-pen-to-square"></i> <a onclick="return checkDelete()" href="delete_room.php?id=<?php echo $fetch['room_id']?>"><i class="fa-sharp fa-solid fa-delete-left"></i></a>
                                                </td>
                                            </tr>
										
										<?php
											}
										?>
                                    </tbody>
                                </table>
                               
    
 
              
</div>

</div>

   


    </div>


  </div>

  <script language="JavaScript" type="text/javascript">
</script>

</body>
</html>

