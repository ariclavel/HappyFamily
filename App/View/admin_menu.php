
<?php
require_once'../Model/rooms.php';
 $countMessages = get_total_messages($db);





?>
<section class="w-f scrollable"> 
							<div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
								<!-- nav -->
								<nav class="nav-primary hidden-xs"> 
									<ul class="nav"> 
										<li class="active"> <a href="DashboardAdmin.php" class="active"> <i class="fa fa-dashboard icon"> <b class="bg-danger"></b> </i> <span>ADMIN PANEL</span> </a> </li> 
										<li> 
											<a href="#layout" > <i class="fa fa-columns icon"><b class="bg-warning"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i><i class="fa fa-angle-up text-active"></i></span> <span>Manage users</span> </a> 
											<ul class="nav lt"> 
												<li> 
													<a href="UsersAdmin.php"> 
														<i class="fa fa-angle-right"></i> 
														<span>View Users</span> 
													</a> 
												</li> 
												
											</ul>
										</li> 
										<li>
											<a href="" > 
												<i class="fa fa-flask icon"> <b class="bg-success"></b> </i> 
												<span class="pull-right"> 
													<i class="fa fa-angle-down text"></i>
													<i class="fa fa-angle-up text-active"></i> 
												</span> 
												<span>Manage devices</span> 
											</a> 
											<ul class="nav lt"> 
												<li> 
													<a href="DevicesAddAdmin.php">
														<i class="fa fa-angle-right"></i> <span>Add devices</span> 
													</a> 
												</li> 
												
												
												
											<li > <a href="admin_device_list.php" > <i class="fa fa-angle-right"></i> <span>View deviecs</span> </a> </li> 
											
										</ul> 
									</li> 
									<li > 
										<a href="#pages" > <i class="fa fa-file-text icon"><b class="bg-primary"></b></i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span><span>Manage pets</span> </a> 
										<ul class="nav lt"> 
											<li > <a href="manage_pets.php" > <i class="fa fa-angle-right"></i> <span>Manage pets</span> </a> </li> 
											
							
										</ul> 
									</li> 


									<li > 
										<a href="#pages" > <i class="fa fa-file-text icon"><b class="bg-primary"></b></i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span><span>Manage Sensors</span> </a> 
										<ul class="nav lt"> 
											<li > <a href="manage_sensor.php" > <i class="fa fa-angle-right"></i> <span>Add sensors</span> </a> </li> 
											<li > <a href="admin_sensors_list.php" > <i class="fa fa-angle-right"></i> <span>View senors</span> </a> </li> 
							
										</ul> 
									</li> 
									<li > <a href="mail.html" > <b class="badge bg-danger pull-right"><?php echo $countMessages ?></b> <i class="fa fa-envelope-o icon"> <b class="bg-primary dker"></b> </i> <span>Message</span> </a> </li> 
									
								</ul>
							</nav> <!-- / nav --> 
						</div> 
					</section> 