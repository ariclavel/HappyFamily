<?php

session_start();
if(!isset($_SESSION['id']))
{
   header("Location:../home.php");
   die();
}
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
  <link rel='stylesheet' type='text/css' href='../css/clock.css'>
  
  <style type="text/css">
 

  .middle_part{
    margin-right:200px;
    
  }
  
  .row{
    display:flex;
    align-items:center;
    gap:3em;
  }
  .wrap{
    
    margin-left:50px;
    border-radius:7px;
    background:#5B2C6F;
    box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.1);
    width: 200px;
    
  }

  .image2{
    border-radius:50px;
    margin-left:130px;
    margin-top:20px;
    
  }
  .main-body{
    margin-right: 230px;
   
   
   }

   .tit{
    margin-left:20px;
    color:white;
    position:absolute;
    top:150px;
    font-weight:bold;
    font-size:20px;
   } 
    #wead{
        cursor:grab;
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

         <table>
        
                <tr>
                    <td>
                    <div class="box">
            <div class="box_container">
                <div class="box_btn" onClick='alarmStart()'>
                    <svg class="box_btn_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                        <g>
                            <g>
                    <path d="M443.86,196.919L141.46,10.514C119.582-2.955,93.131-3.515,70.702,9.016c-22.429,12.529-35.819,35.35-35.819,61.041    v371.112c0,38.846,31.3,70.619,69.77,70.829c0.105,0,0.21,0.001,0.313,0.001c12.022-0.001,24.55-3.769,36.251-10.909    c9.413-5.743,12.388-18.029,6.645-27.441c-5.743-9.414-18.031-12.388-27.441-6.645c-5.473,3.338-10.818,5.065-15.553,5.064    c-14.515-0.079-30.056-12.513-30.056-30.898V70.058c0-11.021,5.744-20.808,15.364-26.183c9.621-5.375,20.966-5.135,30.339,0.636    l302.401,186.405c9.089,5.596,14.29,14.927,14.268,25.601c-0.022,10.673-5.261,19.983-14.4,25.56L204.147,415.945    c-9.404,5.758-12.36,18.049-6.602,27.452c5.757,9.404,18.048,12.36,27.452,6.602l218.611-133.852    c20.931-12.769,33.457-35.029,33.507-59.55C477.165,232.079,464.729,209.767,443.86,196.919z"/>
                        </svg>
                        
                </div>
               
            </div>
        </div>
                    </td>
                </tr>
    
                <tr>
                            <td> 
                            <div id='main-container'>
			<h2 id='clock'></h2>
		</div>

		<div id='alarm-container'>
			<h3>Set Alarm Time</h3>
				<label>
					<div>
					<select id='alarmhrs' ></select>
					</div>
				</label>
				<label>
					<div>
					<select id='alarmmins' ></select>
					</div>
				</label>
				<label>
					<div>
					<select id='alarmsecs' ></select>
					</div>
				</label>
				<label>
					<div>
						<select id="ampm">
							<option value="AM">AM</option>
							<option value="PM">PM</option>
						</select>
					</div>
				</label>
				</div>
		</div>

		<div id='buttonHolder'>
			<div>
				<button  id='setButton' onClick='alarmSet()'>Set Alarm</button>
			</div>
          

			<div>
				<button  id='clearButton' onClick='alarmClear()'>Stop</button>
			</div>
		</div>
                            </td>
                          
                
                </tr>

                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
               

                

                
                
               
                                    </table> <br/><br/>
                           
                        
       
       
        

           

  


  </div>


  
<script type='text/javascript' src='../js/clock.js'></script>
</body>
</html>
