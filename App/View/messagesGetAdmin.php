<?php
//require_once'../Model/sendMessage.php';
require_once'../Model/messagesQuery.php';
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

								<div class="main-body">
            
            
            <div class="promo_card">
             
              <?php 
                  
                  $result = message_get();
                  $myArray=[];
                  while($row = $result->fetch_assoc()) {
                      $myArray[] = $row;
                  }
                 
                    //$resultado = '<html><h2>Productos:</h2><p><b>'.implode("<b></b>", $_POST["productos"])'</b></p></html>';
                  /*Inicializar variable sobre la cual se irá concatenando*/
                  $resultado = '<html><h2>MESSAGES:</h2><p>';
                  
                  for ($i=0; $i<count($myArray); $i++){
                      $m = $i+1;
                      $username = get_user($myArray[$i]["id_user"]);
                      $name = "";
                      while($row = $username->fetch_assoc()) {
                        $name = $row;
                      }
					  $resultado.='
					   <div class="table-wrapper">
        <table class="fl-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           
                                            <th>id message</th>
                                            <th>Message</th>
                                            <th>From:</th>
											<th>Send your answer here</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
										
											<tr>
												
                                                
												<td>'.json_encode($myArray[$i]["id_message"]).'</td>
												<td>'.json_encode($myArray[$i]["message"]).'</td>
												<td>'.json_encode($name["first_name"])." ".json_encode($name["last_name"]).'</td>
												
                                               
												<td><a href="messagesGetAdmin.php?click2='.json_encode($myArray[$i]["id_user"]).'" class="Add_button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Answer</a><br>
												</td>
                                            </tr>
										
										
                                    </tbody>
                                </table>';
                     
                  }

                  $resultado.='</p></html>';
                  if($_GET['click']??=""){

                    if(message_delete($_GET['click'])==true){
                        echo "<script>alert(\"Your message has been deleted!\")</script>"; 
                        echo "<script> location.replace('../View/messagesGetAdmin.php'); </script>";
                    }
                    else{ 

                      echo "<script>alert(\"Your message could not being deleted!\")</script>"; 
                      echo "<script> location.replace('../View/messagesGetAdmin.php'); </script>";
                    }
                    
                    
                  }
                  if($_GET['click2']??=""){
                  
                    //echo(json_encode(device_details($_GET['click2'])));
                    echo
                    '<form action = "../Model/sendMessage.php" method="POST">
                    <input type="hidden" placeholder ="Enter new Device name" class="txtbox" id="idsens" name="idsens" value = '.$_GET['click2'].'></br>
                        
                       
                        <p> Answer</p><input type="text" placeholder ="Enter your answer" class="form-control" id="idmsg" name="idmsg"></br>
                        <button type= "submit" class= "Add_button">Send Answer</button>
                      
                        <br/>
                    </form>';
                   
                    

                    
                  }
      
                  /*Imprimimos la variable*/
                  echo $resultado;

              ?>
              
              
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