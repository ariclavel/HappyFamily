<?php
session_start();
require_once'../Model/rooms.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>
  <link rel="stylesheet" href="../css/user_profile_victor.css">
  
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">
  
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
   .user_email
   {
    margin-left:30px;
   }

   .both{
    display:flex;
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
   
   
<div class="profile">
      
      
     


  <div class="middle_part">
        <div class="settings">
            <h4 class="text-right">ADD NEW PET</h4>
        </div>

    <form method="POST" action="../Controller/petController.php" enctype="multipart/form-data">
      
        <div class="both">
             <div class="both_1">

             <table>
             <tr>
                    
                    <td>
                    <select class="form-control" name="Category" id="Category">
                        <option value="" selected="selected">Select category</option>
                        <option value="Dogs" >Dogs</option>
                        <option value="Cats" >Cats</option>
                        <option value="Snakes" >Snakes</option>
                        <option value="Pigs" >Pigs</option>
    
                      </select>
                    
                
                   </td>
               
                   <td>
                 
                </td>
            </tr>
            <tr>
                    
                        <td>
                        <input type="text" id="pet_name" placeholder="Pet name" class="form-control" name="pet_name"   required>
                        
                    
                       </td>
                   
                       <td>
                   
                    </td>
                </tr>

                <tr>
                    
                        <td>
                       
                        <input type="file" id="myFile" name="pet_Pic">
                    
                       </td>
                     
                       <td>
                       
                    </td>
                    </tr>

                    <tr>
                    
                    <td>
                   
                    <textarea id="desc" placeholder="Pet description" name="desc" rows="4" cols="50"></textarea>
                
                   </td>
                  
                   
                </tr>

                <tr>
                    
                    <td>
                   
                   
                    <button type="submit" class="btnn" name ="ADDPET">Add</button>
                
                   </td>
                  
                   
                </tr>

                <tr>
                    
                    <td>
                   
                   
                                <?php 
										
                                        if(ISSET($_GET['msg'])){
                                            echo "<center><label>".$_GET['msg']."</label></center>";
                                          }
                                      ?>
                
                   </td>
                  
                   
                </tr>

                
            </table>


</div>
</form>
           
                   
                    
            <div class="both_2">
            <div class="table-wrapper">
        <table class="fl-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Category</th>
                                            <th>Pet Name</th>
                                            
                                            <th>Image</th>
                                
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                       
                                          //session_start();
                                          
                                            $UID = $_SESSION['id'];
                                          $stmt1 = "SELECT * FROM pet WHERE reg_id='$UID '";
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
                                            //session_start();
                                          
                                            $UID = $_SESSION['id'];
                                            $tbl_schedule = display_pet($db,$UID);
											                    while($fetch=$tbl_schedule->fetch_array()){ 
										?>
											<tr>
												<td><?php echo $i++?></td>
                                                
												<td><?php echo $fetch['category']?></td>
												<td><?php echo $fetch['name']?></td>
												<td><img class="imgg"  id="imm" width="60px" height="60px" src="../img/pet_pic/<?php echo $fetch['image'];?>"></td>
												
                                            
                                                <td>
                                                <a href="editPets.php?id=<?php echo $fetch['pet_id']?>"><i class="fa-solid fa-pen-to-square"></i> <a onclick="return checkDelete()" href="deletePet.php?id=<?php echo $fetch['pet_id']?>"><i class="fa-sharp fa-solid fa-delete-left"></i></a>
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


                
       
         

            </div>
           
           
           
            
    </div>


       </div>
       </div>

   </div>


</div>
  
 

   


    </div>


  </div>
  <script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete this Pet?');
}
</script>

<script>

var modal = document.querySelector(".modal");
var trigger = document.querySelector(".update_pet");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);
</script>
</body>
</html>
