<?php
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
						
						<section class="w-f scrollable"> 
							<div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
								<!-- nav -->
								<nav class="nav-primary hidden-xs"> 
									<ul class="nav"> 
										<li class="active"> <a href="index-2.html" class="active"> <i class="fa fa-dashboard icon"> <b class="bg-danger"></b> </i> <span>ADMIN PANEL</span> </a> </li> 
										<li> 
											<a href="All_Users.php" > <i class="fa fa-columns icon"><b class="bg-warning"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i><i class="fa fa-angle-up text-active"></i></span> <span>Manage users</span> </a> 
											<ul class="nav lt"> 
												<li> 
													<a href="All_Users.php"> 
														<i class="fa fa-angle-right"></i> 
														<span>All Users</span> 
													</a> 
												</li> 
												<li> 
													<a href="layout-r.html"> 
														<i class="fa fa-angle-right"></i> 
														<span>Right nav</span> 
													</a> 
												</li> 
												<li> 
													<a href="layout-h.html"> 
														<i class="fa fa-angle-right"></i> 
														<span>H-Layout</span> 
													</a> 
												</li> 
											</ul>
										</li> 
										<li>
											<a href="#uikit" > 
												<i class="fa fa-flask icon"> <b class="bg-success"></b> </i> 
												<span class="pull-right"> 
													<i class="fa fa-angle-down text"></i>
													<i class="fa fa-angle-up text-active"></i> 
												</span> 
												<span>Manage devices</span> 
											</a> 
											<ul class="nav lt"> 
												<li> 
													<a href="buttons.html">
														<i class="fa fa-angle-right"></i> <span>Buttons</span> 
													</a> 
												</li> 
												<li> 
													<a href="icons.html" >
														<b class="badge bg-info pull-right">369</b> 
														<i class="fa fa-angle-right"></i> <span>Icons</span> 
													</a> 
												</li> 
												<li> 
													<a href="grid.html" > 
														<i class="fa fa-angle-right"></i> <span>Grid</span> 
													</a> 
												</li> 
												<li>
													<a href="widgets.html" > 
														<b class="badge pull-right">8</b> 
														<i class="fa fa-angle-right"></i> 
														<span>Widgets</span> 
													</a> 
												</li> 
												<li > 
													<a href="components.html" > 
														<i class="fa fa-angle-right"></i> 
														<span>Components</span> 
													</a> 
												</li> 
												<li > 
													<a href="list.html" > 
														<i class="fa fa-angle-right"></i> 
														<span>List group</span> 
													</a> 
												</li> 
												<li > 
													<a href="#table" > 
														<i class="fa fa-angle-down text"></i> 
														<i class="fa fa-angle-up text-active"></i> 
														<span>Table</span> 
													</a> 
													<ul class="nav bg"> 
														<li > 
															<a href="table-static.html" > 
																<i class="fa fa-angle-right"></i> <span>Table static</span> 
															</a> 
														</li> 
														<li >
															<a href="table-datatable.html" > 
																<i class="fa fa-angle-right"></i> <span>Datatable</span> 
															</a> 
														</li> 
														<li > 
															<a href="table-datagrid.html" > 
																<i class="fa fa-angle-right"></i> <span>Datagrid</span> 
															</a> 
														</li> 
													</ul> 
												</li> 
												<li > 
													<a href="#form" > 
														<i class="fa fa-angle-down text"></i> 
														<i class="fa fa-angle-up text-active"></i> 
														<span>Form</span>
													</a> 
													<ul class="nav bg"> 
														<li > 
															<a href="form-elements.html" > 
																<i class="fa fa-angle-right"></i> 
																<span>Form elements</span> 
															</a> 
														</li> 
														<li > 
															<a href="form-validation.html" > 
																<i class="fa fa-angle-right"></i> 
																<span>Form validation</span> 
															</a> 
														</li> 
														<li > 
															<a href="form-wizard.html" > 
																<i class="fa fa-angle-right"></i>
																<span>Form wizard</span> 
															</a> 
														</li> 
													</ul> 
												</li> 
											<li > <a href="chart.html" > <i class="fa fa-angle-right"></i> <span>Chart</span> </a> </li> 
											<li > <a href="fullcalendar.html" > <i class="fa fa-angle-right"></i> <span>Fullcalendar</span> </a> </li> 
											<li > <a href="portlet.html" > <i class="fa fa-angle-right"></i><span>Portlet</span> </a> </li> 
											<li > <a href="timeline.html" > <i class="fa fa-angle-right"></i> <span>Timeline</span> </a></li> 
										</ul> 
									</li> 
									<li > 
										<a href="#pages" > <i class="fa fa-file-text icon"><b class="bg-primary"></b></i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span><span>Manage pets</span> </a> 
										<ul class="nav lt"> 
											<li > <a href="gallery.html" > <i class="fa fa-angle-right"></i> <span>Gallery</span> </a> </li> 
											<li > <a href="profile.html" > <i class="fa fa-angle-right"></i> <span>Profile</span> </a> </li> 
											<li > <a href="invoice.html" > <i class="fa fa-angle-right"></i> <span>Invoice</span> </a> </li> 
											<li > <a href="intro.html" > <i class="fa fa-angle-right"></i> <span>Intro</span> </a> </li> 
											<li > <a href="master.html" > <i class="fa fa-angle-right"></i> <span>Master</span> </a> </li> 
											<li > <a href="gmap.html" > <i class="fa fa-angle-right"></i> <span>Google Map</span> </a> </li> 
											<li > <a href="jvectormap.html" > <i class="fa fa-angle-right"></i> <span>Vector Map</span> </a> </li> 
											<li > <a href="signin.html" > <i class="fa fa-angle-right"></i> <span>Signin</span> </a> </li> 
											<li > <a href="signup.html" > <i class="fa fa-angle-right"></i> <span>Signup</span> </a> </li> 
											<li > <a href="404.html" > <i class="fa fa-angle-right"></i> <span>404</span> </a> </li> 
										</ul> 
									</li> 
									<li > <a href="mail.html" > <b class="badge bg-danger pull-right">3</b> <i class="fa fa-envelope-o icon"> <b class="bg-primary dker"></b> </i> <span>Message</span> </a> </li> 
									
								</ul>
							</nav> <!-- / nav --> 
						</div> 
					</section> 
						
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
							<span class="value"><span>10</span></span>
						</div>
					</div>
					<div class="col-lg-3 col-xs-6">
						<div class="rad-info-box rad-txt-primary">
						<i class="fa fa-shield-dog"></i>
							<span class="heading">All Pets</span>
							<span class="value"><span>12</span></span>
						</div>
					</div>
					<div class="col-lg-3 col-xs-6">
						<div class="rad-info-box rad-txt-danger">
							<i class="fa fa-computer"></i>
							<span class="heading">Control devices</span>
							<span class="value"><span>5</span></span>
						</div>
					</div>
					<div class="col-lg-3 col-xs-6">
						<div class="rad-info-box">
							<i class="fa fa-message"></i>
							<span class="heading">Msg</span>
							<span class="value"><span>11</span></span>
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