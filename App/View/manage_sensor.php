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
  border: 1px solid grey;
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
                  
                           <h1>ADD NEW SENSOR</h1>
						  
						   
	                       <div class="table-wrapper">
        
                           <form method="POST" action="../Controller/sensorController.php" enctype="multipart/form-data">
         <table>
        
                <tr>
                            <td> 
                            <input type="text" placeholder ="Sensor name" class="form-control"  name="sensor_name">
                            </td>

							<td>
                            <input type="text" placeholder ="Sensor mode" class="form-control"  name="sensor_mode">
                            </td>
                    
                </tr>
                  
                <tr>
                <td>
                           
                           <textarea id="w3review" placeholder="Describe sensor here..." name="sensor_desc" rows="4" cols="50"></textarea>
                   
                      </td>

                      <td>
                      <select class="form-control" name="sensortype">
                                          <option value=" " selected="selected">Select type</option>
                                          <option value="Position" >Position</option>
                                          <option value="Temperature" >Temperature</option>
                                          <option value="Motion" >Motion</option>
                                          <option value="Light" >Light</option>
                                          
                      
                                      </select>
                      
                  
                     </td>
                </tr>

                <tr>
               
					<td> 
                   
                    </td>
                   
                    <td> 
                    <button type="submit" name="Add_sensor" class="btnn">Add sensor</button>
                  
                    </td>

					
                </tr>
                <tr>
               
                   
                   
					<td> 
                    
                    </td>
                   
                    <td> 
                   
                   
                    <?php 
                         
                         if(ISSET($_GET['msg'])){
                          echo "<center><label>".$_GET['msg']."</label></center>";
                        }
                    
                       ?>
                    </td>

					
                </tr>

                
				
               

                <tr>
				
				<td>
						
                   <a href="admin_sensors_list.php">View all devices</a><i class="fa-solid fa-arrow-right"></i>
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
    return confirm('Are you sure you want to delete this sensor?');
}
</script>
</body>

</html>