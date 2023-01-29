<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';

session_start();


unset($_SESSION['message']);

 if(isset($_POST['submit']))
 {
    
     $room_id= clean($_POST['room']);
     $device_id=clean($_POST['device']);
     $from=clean($_POST['from']);
     $to=clean($_POST['to']);
     $user= $_SESSION['id'];
     $schedule_time=date("H:i:s");
     $arr1=[];
     $arr2=[];
   
     $arr1 = explode (":", $from);
     
     $arr2 = explode (":", $to);
     
     $hours = $arr2[0] - $arr1[0];

     $min =   $arr2[1] - $arr1[1];
     
     $totalSec = ($hours * 3600) + ($min * 60);

     $duration = abs($totalSec);
   
   
    $Hrs;$Min;$Sec;
    $Hrs = floor($duration / 3600);
    $Min = floor(($duration /60)%60);
    $Sec = $duration %60;

    $setTime = $Hrs."hour: ".$Min."Min: ".$Sec."Secs ";

  
        $result =add_schedule($db,$from,$to,$duration,$setTime,$device_id,$room_id,$user,$schedule_time);
        
        
        if($result)
        {
                
                    
      $_SESSION['message'] = "<div class='alert alert-info'>Schedule successful.</div>";
        }
        else
        {
            $_SESSION['message'] = "<div class='alert alert-danger'>Invalid Schedule, somthing went wrong.</div>";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>

  
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/user_profile_victor.css">
  <link rel="stylesheet" href="../css/scheduler_form.css">
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

<form method="POST">
         <table>
         <tr>
               <th><h4 class="text-right">DEVICE SCHEDULER</h4></th>
        </tr>
                <tr>
                            <td> 
                            <select class="form-control" name="room" id="subject">
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
                            <td>
                                        <select class="form-control" name="device" id="subject">
                                            <option value="" selected="selected">Select Device</option>
                                            <?php
                                             
                                             $tbl_ltype = display_device($db);
                                             while($row=$tbl_ltype->fetch_array()){
                                     ?>
                                     
                                 <option value="<?php echo $row['device_id']?>"><?php echo $row['device_name']?></option>
                                     <?php
                                        }
                                     ?>
                        
                                        </select>
                            </td>
                
                </tr>
                <tr>
                    
                        <td>
                        <input type="time" id="appt" class="form-control" name="from"   required>
                        
                    
                       </td>
                   
                       <td>
                    <input type="date" name="sdate" class="form-control" id="start-date"/>
                    </td>
                </tr>

                <tr>
                    <td>

                    <input type="time" id="appt" class="form-control" name="to"   required></td>
                   
                    <td> 
                    <input type="date" name="edate" class="form-control" id="end-date"/>
                    </td>
                </tr>

                <tr>
                    
                    <td> 
                    <button type="submit" name="submit" class="btnn">Schedule</button>
                    </td>
                   <td>
                   <a href="ViewSchedule.php">View all Schedules</a><i class="fa-solid fa-arrow-right"></i>
                    </td>
                    <td> 
                   
                    <br/>
                    <?php 
                         
                         if(ISSET($_SESSION['message'])){
                           echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
                         }
                       ?>
                    </td>
                    
                </tr>
               
                                    </table> <br/><br/>
                        
        </form>
     
</div>

    </div>

  </div>
  

<script src="https://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script src="countdown.js"></script>
<script type="text/javascript">
    $(function(){
        $(".timeBar").each(function () {
            $(this).countdownsync({
                dayTag: "",
                hourTag: "<label class='tt hh dib vam'>00</label><span> hours </span>",
                minTag: "<label class='tt mm dib vam'>00</label><span> minutes </span>",
                secTag: "<label class='tt ss dib vam'>00</label><span> seconds </span>",
                dayClass: ".dd",
                hourClass: ".hh",
                minClass: ".mm",
                secClass: ".ss",
                isDefault: false,
                showTemp:1

            }, function () {
                location.reload();
            });
        });
    });
    
</script>


<script src="../js/count_down.js"></script>
</body>
</html>
