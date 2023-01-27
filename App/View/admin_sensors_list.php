<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';
session_start();
$name =$_SESSION['name'];
$lastname=$_SESSION['surname'];
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
		.rad-info-box {
    margin-bottom: 16px;
    box-shadow: 1px 1px 2px 0 #CCCCCC;
    padding: 20px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
    background: white !important;
  }
  
  .rad-info-box i {
    display: block;
    background-clip: padding-box;
    margin-right: 15px;
    height: 60px;
    width: 60px;
    border-radius: 100%;
    line-height: 60px;
    text-align: center;
    font-size: 4.4em;
    position: absolute;
  }
  
  .rad-info-box .value,
  .rad-info-box .heading {
    display: block;
    position: relative;
    color: #515d6e;
    text-align: right;
    z-index: 10;
  }
  
  .rad-info-box .heading {
    font-size: 1.2em;
    font-weight: 300;
    text-transform: uppercase;
  }
  
  .rad-info-box .value {
    font-size: 2.1em;
    font-weight: 600;
    margin-top: 5px;
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

      
   .text-danger{
    color:red;
   }
   .alert-info{
    color:green;
   }
   
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
			<section class="hbox stretch"> 
				<!-- .aside --> 
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
                  
                           <h1>LIST OF ALL SENSORS</h1>
						  
						   
	                       <div class="table-wrapper">
        <table class="fl-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>SENSOR NAME</th>
                                            <th>MODE</th>
                                            <th>DESCRIPTION</th>
                                            <th>TYPE</th>
                                            <th>DATE CREATED</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                    $stmt1 = "SELECT * FROM sensor";
                                            $result=mysqli_query($db,$stmt1);
                                            if(mysqli_num_rows($result)<=0)
                                            {
                                        ?>
                                        <tr ><td id="empty">There are no registered sensors recorded at the moment</td></tr>
                                          <?php
                                            }
                                            ?>
										<?php
                                         // $user= $_SESSION['id'];
                                            $i=1;
                                            $tbl_users = AllSensors($db);
											while($fetch=$tbl_users->fetch_array()){ 
										?>
											<tr>
												<td><?php echo $i++?></td>
                                                
												<td><?php echo $fetch['sensor_name']?></td>
												<td><?php echo $fetch['mode']?></td>
												<td><?php echo $fetch['s_desc']?></td>
											
												<td> <?php echo $fetch['type']?> </td>
                                                <td> <?php echo $fetch['date']?> </td>
                                               
                                                <td>
                                                <a href="editSensor.php?id=<?php echo $fetch['sensor_id']?>"><i class="fa-solid fa-pen-to-square"></i></a><a onclick="return checkDelete()" href="delete_sensor.php?id=<?php echo $fetch['sensor_id']?>"><i class="fa-sharp fa-solid fa-delete-left"></i></a>
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
    return confirm('Are you sure you want to delete this device?');
}
</script>
</body>

</html>