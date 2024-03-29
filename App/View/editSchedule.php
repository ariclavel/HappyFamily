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
     $user= $_GET['id'];
     $arr1=[];
     $arr2=[];
   
     $arr1 = explode (":", $from);
     
     $arr2 = explode (":", $to);
     
     $hours = $arr2[0] - $arr1[0];

     $min =   $arr2[1] - $arr1[1];
     
     $totalSec = ($hours * 3600) + ($min * 60);

     $duration = abs($totalSec);
   
   
       
  
        $result =update_schedule($db,$from,$to,$duration,$device_id,$room_id,$user);
        
        
        if($result)
        {
                
                    
      $_SESSION['message'] = "<div class='alert alert-info'>Schedule updated successful.</div>";
        }
        else
        {
            $_SESSION['message'] = "<div class='alert alert-danger'>Invalid Schedule update, somthing went wrong.</div>";
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
  <style type="text/css">a
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
               <th><h4 class="text-right">EDIT SCHEDULER PAGE</h4></th>
        </tr>
                <tr>
                            <td> 
                            <?php
                                            $id = $_GET['id'];
                                            $tbl_ltype = get_schedule($db,$id);
                                            $fetch2=$tbl_ltype->fetch_array();
                                    ?>
                            <select class="form-control" name="room" id="subject">
                            <option selected="selected" value="<?php echo $fetch2['room_id']?>"><?php echo $fetch2['room_name']?></option>
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
                            <?php
                                            $id = $_GET['id'];
                                            $tbl_ltype = get_schedule($db,$id);
                                            $fetch2=$tbl_ltype->fetch_array();
                                    ?>
                                        <select class="form-control" name="device" id="subject">
                                            <option selected="selected" value="<?php echo $fetch2['device_id']?>"><?php echo $fetch2['device_name']?></option>
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
                        <?php
                                            $id = $_GET['id'];
                                            $tbl_ltype = get_schedule($db,$id);
                                            $fetch2=$tbl_ltype->fetch_array();
                                    ?>
                        <input type="time" id="appt" value="<?php echo $fetch2['from']?>" class="form-control" name="from"   required>
                        
                    
                       </td>
                    <td> <select name="time" class="form-control">
                                    <option value="" selected="selected">Time period</option>
                                                    <option value="AM">AM</option>
                                                    <option value="PM">PM</option>
                                                </select></td>
                    
                </tr>

                <tr>
                    <td>

                    <input type="time" id="appt" value="<?php echo $fetch2['to']?>" class="form-control" name="to"   required></td>
                    <td> 
                        <select name="time" class="form-control">
                        <option value="" selected="selected">Time period</option>
                                <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                        </select>
                    </td>
                    
                </tr>

                <tr>
                    <td>
                    <input type="date" name="sdate" class="form-control" id="start-date"/>
                    </td>
                    <td> 
                    <input type="date" name="edate" class="form-control" id="end-date"/>
                    </td>
                    
                </tr>

                <tr>
                    
                    <td> 
                    <button type="submit" name="submit" class="btnn">update Schedule</button>
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


<script type="text/javascript">
 /** 
 * Plugin
 * @author Tungse
 * @param dayTag           show day html
 * @param hourTag          show hour html
 * @param minTag           show minutes html
 * @param secTag           show second html
 * @param dayClass         bind day tag ClassName
 * @param hourClass        bind hours tag ClassName
 * @param minClass         bind minutes tag ClassName
 * @param secClass         bind seconds tag ClassName
 * @param isDefault        whether use default tagTemp
 * @param showTemp         show template 0：(day hour min sec) 1：(hour min sec)
 * @param backfun          finish callback
 */
(function ($) {
      $.fn.countdownsync = function (tagTemp, backfun) {
        var data = "";
        var _DOM = null;
        var _defaultTag = _TempTag = {
            dayTag: "<li class='countdownday'></li><li class='split'>day</li>",
            hourTag: "<li class='countdownhour'></li><li class='split'>:</li>",
            minTag: "<li class='countdownmin'></li><li class='split'>:</li>",
            secTag: "<li class='countdownsec'></li><li class='split'>:</li>",
            dayClass: ".countdownday",
            hourClass: ".countdownhour",
            minClass: ".countdownmin",
            secClass: ".countdownsec",
            isDefault: false,
            showTemp:0
        };
        var _temp = $.extend(_TempTag, tagTemp);
        var TIMER;
        createdom = function (dom) {
            _DOM = dom;
            data = Math.round($(dom).attr("data"));
            var htmlstr = (_temp.showTemp == 0 ? _temp.dayTag : "") + _temp.hourTag + _temp.minTag + _temp.secTag;
            if (_temp.isDefault) {
                htmlstr = (_temp.showTemp == 0 ? _defaultTag.dayTag : "") + _defaultTag.hourTag + _defaultTag.minTag + _defaultTag.secTag;
                htmlstr = "<ul class='countdown'>" + htmlstr + "</ul>";
                $("head").append("<style type='text/css'>.countdown {list-style:none;}.countdown li{float:left;background:#000;color:#fff;border-radius:50%;padding:10px;font-size:14px; font-weight:bold;margin:10px;}.countdown li.split{background:none;margin:10px 0;padding:10px 0;color:#000000;}</style>");
            }
            $(_DOM).html(htmlstr);
            reflash();
        };
        reflash = function () {
            var range = data,
                        secday = 86400, sechour = 3600,
                        days = parseInt(range / secday),
                        hours = _temp.showTemp == 0 ? parseInt((range % secday) / sechour) : parseInt(range / sechour),
                        min = parseInt(((range % secday) % sechour) / 60),
                        sec = ((range % secday) % sechour) % 60;
            data--;
            if (range < 0) {
                window.clearInterval(TIMER); //clear timer
            } else {
                $(_DOM).find(_temp.dayClass).html(nol(days));
                $(_DOM).find(_temp.hourClass).html(nol(hours));
                $(_DOM).find(_temp.minClass).html(nol(min));
                $(_DOM).find(_temp.secClass).html(nol(sec));
            }
            if ((range - 1) == 0) {
                undefined == backfun ? function () { } : backfun();
            }
        };
        TIMER = setInterval(reflash, 1000);
        nol = function (h) {
            return h > 9 ? h : '0' + h;
        };
        return this.each(function () {
            var $box = $(this);
            createdom($box);
        });
    };
   
})(jQuery);
    
</script>
</body>
</html>
