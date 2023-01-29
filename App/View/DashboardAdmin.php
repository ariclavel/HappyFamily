<?php
require_once'../Model/rooms.php';


 $countUsers = get_total_users($db, "user");
 $countDevices = get_total_devices($db);
 $countPets = get_total_pets($db);
 $countMessages = get_total_messages($db);





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
                  
                           <h1>WELCOME TO ADMIN DASHBOARD</h1>
						  
						   <div class="row">
						
	<div class="col-lg-3 col-xs-6">
						<div class="rad-info-box rad-txt-success">
							<i class="fa fa-user"></i>
							<span class="heading">Users</span>
							<span class="value"><span><?php echo $countUsers ?></span></span>
						</div>
					</div>
					<div class="col-lg-3 col-xs-6">
						<div class="rad-info-box rad-txt-primary">
						<i class="fa fa-shield-dog"></i>
							<span class="heading">All Pets</span>
							<span class="value"><span><?php echo $countPets ?></span></span>
						</div>
					</div>
					<div class="col-lg-3 col-xs-6">
						<div class="rad-info-box rad-txt-danger">
							<i class="fa fa-computer"></i>
							<span class="heading">Control devices</span>
							<span class="value"><span><?php echo $countDevices ?></span></span>
						</div>
					</div>
					<div class="col-lg-3 col-xs-6">
						<div class="rad-info-box">
							<i class="fa fa-message"></i>
							<span class="heading">Msg</span>
							<span class="value"><span><?php echo $countMessages ?></span></span>
						</div>
					</div>
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
</body>
</html>