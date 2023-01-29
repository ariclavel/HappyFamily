<?php
require_once'../Model/user.query.php';
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

	<link rel="stylesheet" href="../css/admin_dashboard_table.css">
</head>
<body>
	<section class="vbox"> 

        <!-- header file -->
		<?php
            include("admin_dashboard_header.php");
            ?>
               
		<!-- end header file -->
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
                  
                           <h1>LIST OF ALL USERS</h1>
						  
						   
	                       <div class="table-wrapper">
        <table class="fl-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email Address</th>
                                            <th>Phone number</th>
                                            <th>Date Registered</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
                                         // $user= $_SESSION['id'];
                                            $i=1;
                                            $tbl_users = display_users($db);
											while($fetch=$tbl_users->fetch_array()){ 
										?>
											<tr>
												<td><?php echo $i++?></td>
                                                
												<td><?php echo $fetch['first_name']?></td>
												<td><?php echo $fetch['last_name']?></td>
												<td><?php echo $fetch['email']?></td>
												<td> <?php echo $fetch['phoneNumber']?> </td>
                                                <td>
                                                <?php echo $fetch['date']?>
                                               
                                                </td>
                                                <td>
                                                <a onclick="return checkDelete()" href="delete_user.php?id=<?php echo $fetch['reg_id']?>"><i class="fa-sharp fa-solid fa-delete-left"></i></a>
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
			return confirm('Are you sure you want to delete this user?');
		}
	</script>
</body>

</html>