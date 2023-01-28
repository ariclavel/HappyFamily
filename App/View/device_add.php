<?php
session_start();
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';



$name =$_SESSION['name'];
$lastname=$_SESSION['surname'];

unset($_SESSION['message']);
if (ISSET($_POST['submit']))
  {
    //for image1
 $pic1 = $_FILES['device_pic1'];
 $picName1 = $pic1['name'];
 $picTmpName1 = $pic1['tmp_name'];
 $picError1 = $pic1['error'];
 $picExt1 = explode('.', $picName1);
 $picActualExt1 = strtolower(end($picExt1));


  //for image2
  $pic2 = $_FILES['device_pic2'];
  $picName2 = $pic2['name'];
  $picTmpName2 = $pic2['tmp_name'];
  $picError2 = $pic2['error'];
  $picExt2 = explode('.', $picName2);
  $picActualExt2 = strtolower(end($picExt2));


 $allowed = array('jpg','jpeg','png');
 
 if(in_array($picActualExt1, $allowed) && in_array($picActualExt2, $allowed))
 {
  



   if($picError1 === 0  && $picError2 === 0)
   {
     //pic1
    
     $randomm1=rand(10,999999);
     $picNameNew1 = $pic1.$randomm1.".".$picActualExt1;
     $picDestination = "../img/device_pic/".$picNameNew1;
     move_uploaded_file($picTmpName1, $picDestination);

     //pic2
     $randomm2=rand(99,888888888);
     $picNameNew2 = $pic2.$randomm2.".".$picActualExt2;
     $picDestination = "../img/device_pic/".$picNameNew2;
     move_uploaded_file($picTmpName2, $picDestination);

    //form data
     $category= clean($_POST['category']);
     $deviceName=clean($_POST['device_name']);
     $sensorID=clean($_POST['sensor']);
     $roomID=clean($_POST['room']);
     $user=clean($_POST['user']);
     $date_created=date("Y-m-d H:i:s");
     
     if(!empty($category) && $deviceName !=" " && !empty($sensorID) && !empty($roomID))
     {
     $result =add_device($db,$category,$deviceName,$sensorID,$picNameNew1,$picNameNew2,0,$roomID,$user,$date_created);
     if($result)
     {
       
       
       $_SESSION['message'] = "<div class='alert alert-info'>Device added successfully.</div>";
       
       //header("Location: device_add.php");
     }
     else
     {
       //die("bad");
       $_SESSION['message'] = " <div class='alert alert-danger'>There was an error in uploading your devie Image! Please Try again!</div>";
      
        //header("Location: device_add.php");
     }
    }
    else
    {
      $_SESSION['message'] = "<div class='alert alert-danger'>Error! invalid data not allowed.</div>";
    }
   }
   else
   {
     $_SESSION['message'] = "<div class='alert alert-danger'>There was an error in uploading your device image! Please Try again!</div>";
      ////header("Location: device_add.php");
   }
 }
 else
 {
   $_SESSION['message'] = "<div class='alert alert-danger'>You cannot upload files with this extension</div>";
   //header("Location: device_add.php");
 }
}
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
		<header class="bg-dark dk header navbar navbar-fixed-top-xs"> 
			<div class="navbar-header aside-md"> 
				<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"><i class="fa fa-bars"></i></a> 
        <a href="../Home.php" class="navbar-brand" data-toggle="fullscreen"><img class="logo_image" src="../img/logo5.png">HappyHome</a> 
       
				<a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"><i class="fa fa-cog"></i></a> 
			</div> 
			<ul class="nav navbar-nav hidden-xs"> 
				<li class="dropdown"> 
					
					<section class="dropdown-menu aside-xl on animated fadeInLeft no-borders lt">
						<div class="wrapper lter m-t-n-xs">
							<a href="#" class="thumb pull-left m-r"></a> 
							<div class="clear"> 
								<a href="#"><span class="text-white font-bold">@Mike Mcalidek</span> </a>
								<small class="block">Art Director</small> 
								
							</div> 
						</div> 
						<div class="row m-l-none m-r-none m-b-n-xs text-center">
							<div class="col-xs-4"> 
								<div class="padder-v">
									<span class="m-b-xs h4 block text-white">245</span> 
									<small class="text-muted">Followers</small> 
								</div> 
							</div> 
							<div class="col-xs-4 dk"> 
								<div class="padder-v"> 
									<span class="m-b-xs h4 block text-white">55</span> 
									<small class="text-muted">Likes</small>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="padder-v">
									<span class="m-b-xs h4 block text-white">2,035</span>
									<small class="text-muted">Photos</small>
								</div>
							</div>
						</div>
					</section> 
				</li> 
				<li>
					<div class="m-t m-l">
						<a href="price.html" class="dropdown-toggle btn btn-xs btn-primary" title="Upgrade"><i class="fa fa-long-arrow-up"></i></a>
					</div>
				</li>
			</ul> 
			
			<ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
				<li class="hidden-xs"> 
					<a href="#" class="dropdown-toggle dk" data-toggle="dropdown">
						<i class="fa fa-bell"></i> 
						<span class="badge badge-sm up bg-danger m-l-n-sm count">2</span> 
					</a>
					<section class="dropdown-menu aside-xl">
						<section class="panel bg-white">
							<header class="panel-heading b-light bg-light">
								<strong>You have <span class="count">2</span> notifications</strong>
							</header>
							<div class="list-group list-group-alt animated fadeInRight">
								<a href="#" class="media list-group-item">
									<span class="pull-left thumb-sm"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span>
									<span class="media-body block m-b-none"> Use awesome animate.css<br>
										<small class="text-muted">10 minutes ago</small>
									</span>
								</a> 
								<a href="#" class="media list-group-item"> 
									<span class="media-body block m-b-none">1.0 initial released<br><small class="text-muted">1 hour ago</small></span>
								</a>
							</div>
							
							<footer class="panel-footer text-sm"> 
								<a href="#" class="pull-right"><i class="fa fa-cog"></i></a> 
								<a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
							</footer>
						</section>
					</section>
				</li>
				<li class="dropdown hidden-xs">
					<a href="#" class="dropdown-toggle dker" data-toggle="dropdown"><i class="fa fa-fw fa-search"></i></a>
					<section class="dropdown-menu aside-xl animated fadeInUp">
						<section class="panel bg-white">
							<form role="search">
								<div class="form-group wrapper m-b-none">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-info btn-icon"><i class="fa fa-search"></i></button> 
										</span> 
									</div> 
								</div> 
							</form> 
						</section>
					</section> 
				</li> 
				<li class="dropdown"> 
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
            <span class="thumb-sm avatar pull-left">  &nbsp; &nbsp;<i class="fa fa-cog"></i></span> <?php echo $name." ".$lastname?> <b class="caret"></b> 
					</a> 
					<ul class="dropdown-menu animated fadeInRight"> <span class="arrow top"></span> 
						<li> <a href="#">Settings</a> </li> 
						<li> <a href="profile.html">Profile</a> </li> 
						<li> <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a> </li> 
						<li> <a href="docs.html">Help</a> </li> <li class="divider"></li> 
						<li> <a href="logout.php" >Logout</a> </li> 
					</ul> 
				</li> 
			</ul> 
		</header> 
		
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
        
                           <form method="POST" enctype="multipart/form-data">
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

					   <td>
                       <select class="form-control" name="room">
                                           <option value="" selected="selected">Select Room</option>
                                           <?php
                                            
                                            $tbl_ltype = display_rooms($db);
                                            while($row=$tbl_ltype->fetch_array()){
                                    ?>
                                    
                                <option value="<?php echo $row['room_id']?>"><?php echo $row['room_name']?></option>
                                    <?php
                                       }
                                    ?>
                       
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
                    <select class="form-control" name="user">
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
                   
                    <button type="submit" name="submit" class="btnn">Add device</button>
                  
                    </td>

					
                    
					
                </tr>

                
				
               

                <tr>
				
				          <td>
						
                   <a href="admin_device_list.php">View all devices</a><i class="fa-solid fa-arrow-right"></i>
                    </td>

                    <td>
						
                    <?php 
                         
                         if(ISSET($_SESSION['message'])){
                           echo "<center><label>".$_SESSION['message']."</label></center>";
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
</body>

</html>