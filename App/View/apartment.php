<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';

session_start();


unset($_SESSION['message']);

 if(isset($_POST['submit']))
 {
    
     $apartName= clean($_POST['apartmentName']);
     $apartType=clean($_POST['apartmentType']);
     $no_of_rooms=clean($_POST['room_no']);
   
     $user= $_SESSION['id'];
    

     if($apartName !=" " &&  !empty($apartType) && !empty($no_of_rooms))
     {
        $result =add_apartment($db,$apartName,$apartType,$no_of_rooms,$user);
        
        
        if($result)
        {
                
                    
      $_SESSION['message'] = "<div class='alert alert-info'>Apartment successful created.</div>";
        }
        else
        {
            $_SESSION['message'] = "<div class='alert alert-danger'>Error creating apartment. Please try again.</div>";
        }
    }
    else
    {
        $_SESSION['message'] = "<div class='alert alert-danger'>Error! invalid data not allowed.</div>";
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
               <th><h4 class="text-right">NEW APARTMENT</h4></th>
        </tr>
                <tr>
                            <td> 
                            <input type="text" id="apartmentName" placeholder="Apartment name like (city home)" class="form-control" name="apartmentName"   required>
                            </td>
                           
                
                </tr>
                <tr>
                <td>
                <select name="apartmentType" class="form-control">
                            <option value="" selected="selected">Apartment type</option>
                                                    <option value="Duplex/Triplex">Duplex/Triplex</option>
                                                    <option value="Railroad Apartment">Railroad Apartment</option>
                                                    <option value="Wing Two Bedroom">Wing Two Bedroom</option>
                                                    <option value="Studio">Studio</option>
                                                    <option value="Convertible">Convertible</option>
                                                   
                                                </select> </td>
                </tr>
                
                <tr>
                    
                        
                    <td> <select name="room_no" class="form-control">
                                    <option value="" selected="selected">Number of rooms</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select></td>
                    
                </tr>

                

               

                <tr>
                    
                    <td> 
                    <button type="submit" name="submit" class="btnn">Submit</button>
                    </td>
                   <td>
                   
                    </td>
                   
                </tr>
                <tr>
                    
                   
                   <td>
                   <?php 
                         
                         if(ISSET($_SESSION['message'])){
                           echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
                         }
                       ?>
                    </td>
                   
                    
                </tr>
               
                                    </table> 
                           
                        
        </form>
       


        

 
        
</div>
  
 <div class="apart_view">
  
 <div class="table-wrapper">
        <table class="fl-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Apartment Name</th>
                                            <th>Apartment Type</th>
                                
                                            <th>Number of Rooms</th>
                                            <th>Add Rooms</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                           $u_id= $_SESSION['id'];
                                          $stmt1 = "SELECT * FROM apartment WHERE reg_id='$u_id'";
                                                  $result=mysqli_query($db,$stmt1);

                                                  if(mysqli_num_rows($result)<=0)
                                                  {
                                              ?>
                                              <tr ><td id="empty">There are no any apartments recorded at the moment</td></tr>
                                                <?php
                                                  }

                                                  ?>
										<?php
                                          
                                            $i=1;
                                            $tbl_schedule = display_Customers_AllApartments($db, $u_id );
											while($fetch=$tbl_schedule->fetch_array()){ 
										?>
											<tr>
												<td><?php echo $i++?></td>
                                                
												<td><?php echo $fetch['apartment_name']?></td>
												<td><?php echo $fetch['apartment_type']?></td>
												
												<td>
                                                <?php echo $fetch['number_of_rooms']?>
                                               
                                                </td>
                                                <td>
                                                <a href="room.php?id=<?php echo $fetch['apartment_id']?>">Add Rooms</a>
                                               
                                                </td>
                                                <td>
                                                <a href="editApartment.php?id=<?php echo $fetch['apartment_id']?>"><i class="fa-solid fa-pen-to-square"></i> <a onclick="return checkDelete()" href="deleteApartment.php?id=<?php echo $fetch['apartment_id']?>"><i class="fa-sharp fa-solid fa-delete-left"></i></a>
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
function checkDelete(){
    return confirm('Are you sure you want to delete this apartment?');
}
</script>

</body>
</html>
