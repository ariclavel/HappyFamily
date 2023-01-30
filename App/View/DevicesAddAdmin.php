<?php





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HappyHome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/admin_dash.css">

	<style type="text/css">

.form-control{
  width: 300px;
  height:40px;
  display: inline-block;
  font-size: 14px;
  background: transparent;
  border: 2px solid;
  font-weight: 500;
  padding: 10px 20px;
  outline: 0;
  cursor: pointer;
  color: #103e65;

  outline: 0;
  transition: box-shadow .15s ease;
  border: 0;
  padding: 5px;
  box-shadow: 0 1px 3px rgb(50 50 93 / 15%), 0 1px 0 rgb(0 0 0 / 2%);
  
  
}

button{
  display: inline-block;
      font-size: 12px;
      background: rgb(216, 95, 2);
      border: 1px solid;
      width:100px;
      border-radius: 6px;
      font-weight: 500;
      padding: 10px 10px;
      outline: 0;
      cursor: pointer;
      color: #fefefe;
      transition: all 0.3s cubic-bezier(0.55, 0.055, 0.675, 0.19);
      -webkit-transition: all 0.3s cubic-bezier(0.55, 0.055, 0.675, 0.19);
      -moz-transition: all 0.3s cubic-bezier(0.55, 0.055, 0.675, 0.19);
      -ms-transition: all 0.3s cubic-bezier(0.55, 0.055, 0.675, 0.19);
      -o-transition: all 0.3s cubic-bezier(0.55, 0.055, 0.675, 0.19);
}
button:hover {
  background-color: #f85508;
      border-color: #f85508;
      color: #fff;
}
   
table {
  border-collapse: separate;
  border-spacing: 0 15px;
}

th {
  background-color: #4287f5;
  color: white;
}

th,
td {
  width: 150px;
  text-align: center;
  border: 1px solid black;
  padding: 5px;
}

h2 {
  color: #4287f5;
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
	<section class="vbox"> 
		<!-- header file -->
		<?php
            include("admin_dashboard_header.php");
            ?>
               
		<!-- end header file -->
		
		<section> 
			<section class="hbox stretch"> <!-- .aside --> 
				<aside class="bg-dark lter aside-md hidden-print" id="nav"> 
					<section class="vbox"> 
						
						 <!-- side menu items -->

					<?php
						include("admin_menu.php");
						?>

                  <!-- side menu items -->
						
						<footer class="footer lt hidden-xs b-t b-dark"> <div id="chat" class="dropup"> <section class="dropdown-menu on aside-md m-l-n"> <section class="panel bg-white"> <header class="panel-heading b-b b-light">Active chats</header> <div class="panel-body animated fadeInRight"> <p class="text-sm">No active chats.</p> <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p> </div> </section> </section> </div> <div id="invite" class="dropup"> 
							<section class="dropdown-menu on aside-md m-l-n"> <section class="panel bg-white"> <header class="panel-heading b-b b-light"> John <i class="fa fa-circle text-success"></i> </header> <div class="panel-body animated fadeInRight"> <p class="text-sm">No contacts in your lists.</p> <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p> </div> </section> </section> </div> <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon"> <i class="fa fa-angle-left text"></i> <i class="fa fa-angle-right text-active"></i> </a> 
							<div class="btn-group hidden-nav-xs"> <button type="button" title="Chats" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#chat"><i class="fa fa-comment-o"></i></button> <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#invite"><i class="fa fa-facebook"></i></button> </div> </footer> </section> </aside> <!-- /.aside --> <section id="content"> <section class="vbox"> 
								
								
								
								
								
								
								
								<section class="scrollable padder"> 
									
									
								<div style="height:800px;">
                  
                           <h1>ADD DEVICES</h1>
						  
						   
	                       <div class="table-wrapper">
        
                           <form method="POST" action="../Controller/deviceController.php" enctype="multipart/form-data">
         <table>
        
                <tr>
                            <td> 
                            <select class="form-control" name="category" id="subject">
                            <option value="" selected="selected">Select Category</option>
                                    
                                    
                                 <option>Blinds</option>
                                 <option>Cameras</option>
                                 <option>Doors</option>
                                 <option>Windows</option>
                                 <option>lights</option>
                                 <option>Feeder</option>
                                    
                                 </select>
                            </td>

							            <td>
                            <input type="text" placeholder ="Device name" class="form-control"  name="device_name">
                            </td>

							            <td>
                        <select class="form-control" name="sensor">
                                            <option value="" selected="selected">Select sensor type</option>
                                            <?php
                                             
                                             $tbl_ltype = display_sensors($db);
                                             while($row=$tbl_ltype->fetch_array()){
                                     ?>
                                     
                                 <option value="<?php echo $row['sensor_id']?>"><?php echo $row['sensor_name']?></option>
                                     <?php
                                        }
                                     ?>
                        
                                        </select>
                        
                    
                       </td>

					          
                           
                
                </tr>
              

                  <tr>
                      <td> 

                      <select class="form-control" name="user" id="id_user" onchange="getApartmentByUsername();">
                                           <option value="" selected="selected">Select User Name</option>
                                           <?php
                                            
                                            $tbl_ltype = display_users($db);
                                            while($row=$tbl_ltype->fetch_array()){
                                    ?>
                                    
                                <option value="<?php echo $row['reg_id']?>"><?php echo $row['last_name']." ".$row['first_name']?></option>
                                    <?php
                                       }
                                    ?>
                       
                                       </select>
                      </td>

                      <td> 

                      <select class="form-control" name="apartment" id="id_apartment" onchange="getRoomByApartment();" >
                                           <option value="" selected="selected">Select Apartment</option>
                                          
                                    
                                       </select>
                      </td>

                      <td> 

                      <select class="form-control" name="room" id="id_room">
                                           <option value="" selected="selected">Select Room</option>
                                          
                               
                                   
                       
                                       </select>
                      </td>


                  </tr>






                <tr>
                <td> 

                Divice pic1: <input type="file" id="myFile" name="device_pic1">
                </td>

				
                   
                    <td> 
                    Divice pic2: <input type="file" id="myFile" name="device_pic2">
                    </td>
					        
                   
                    <td> 
                   
                    <button type="submit" name="Add_Device" class="btnn">Add device</button>
                  
                    </td>

					
                </tr>


                <tr>
				
				          <td>
						
                   <a href="admin_device_list.php">View all devices</a><i class="fa-solid fa-arrow-right"></i>
                    </td>

                    <td>
						
                    <?php 
                         
                         if(ISSET($_GET['msg'])){
                           echo "<center><label>".$_GET['msg']."</label></center>";
                         }
                        


                  
                       ?>
                    </td>
                    
                </tr>
               
        </table>
          <br/><br/>
                           
                        
        </form>
       
                  </div>
					
				            </div>

             				 </div>
								
 
						</section> 
					</section> 
					<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> 
				</section> 
				<aside class="bg-light lter b-l aside-md hide" id="notes"> 
					<div class="wrapper">Notification</div> 
				</aside> 
			</section> 
		</section> 
	</section> <!-- Bootstrap --> <!-- App --> 
	<script type='text/javascript' src='../js/admin.js'></script>
    <script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete this schedule?');
}
</script>



<script>
    function getApartmentByUsername() {
        var userId = $("#id_user").val();
        $.post("../Controller/deviceController.php",{getApartmentByUsername:'getApartmentByUsername',userId:userId},function (response) {
            var data = response.split('^');
            $("#id_apartment").html(data[1]);
        });
    }
    function getRoomByApartment() {
        var apartmentId = $("#id_apartment").val();
        $.post("../Controller/deviceController.php",{getRoomByApartment:'getRoomByApartment',apartmentId:apartmentId},function (response) {
            var data = response.split('^');
            $("#id_room").html(data[1]);
        });
    }
</script>
</body>

</html>