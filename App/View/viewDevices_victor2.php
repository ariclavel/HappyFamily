
<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';

session_start();

$Did=$_GET['deviceID'];
if(isset($_GET['xxx']))
{
  $keyValue=$_GET['xxx'];
}

 $deviceIDD= $_SESSION['Did'];
 //this code will run on page load
 $result2 = select_status($db,  $Did);
$fetch=$result2->fetch_array();
$status =$fetch['device_status'];
 if ($status) {//status = 1 (on)
     $status_str = "on";
     $checked_status = "checked";
 } else {
     $status_str = "off";
     $checked_status = "";
 }

 if (isset($_POST['form_submit'])) {//Form was submitted
     (isset($_POST['machine_state'])) ? $status = 1 : $status = 0;
     //Update DB
     $result = display_device_status($db,$Did,$status);
     //this will run after update load
     $result2 = select_status($db,  $Did);
     $fetch=$result2->fetch_array();
     $status =$fetch['device_status'];
      if ($status) {//status = 1 (on)
          $status_str = "on";
          $checked_status = "checked";
      } else {
          $status_str = "off";
          $checked_status = "";
      }





 } else {//Page was loaded
     $status = $_SESSION['device_status'];
 }

 

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | Happy Family</title>

  
  <!-- Font Awesome Cdn Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/user_profile_victor.css">
 
  
  
  
  <style type="text/css">
    
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
   .cont {
  width: 950px;
  margin: 1em auto;
  background: #fff;
  padding: 30px;
  border-radius: 5px;
  
}

 .productcont { 
  display: flex;
  align-items:center;
  
}
.product {
  padding: 1em;
  border: 1px solid #e0e4cc;
  margin-right: 1em;
  border-radius: 5px;
}

button,
input[type="submit"] {
  border: 1px solid #fa6900;
  color: #fff;
  background: #f38630;
  padding: 0.6em 1em;
  font-size: 1em;
  line-height: 1;
  border-radius: 1.2em;
  transition: color 0.2s ease-in-out, background 0.2s ease-in-out,
    border-color 0.2s ease-in-out;
}
button:hover,
button:focus,
button:active,
input[type="submit"]:hover,
input[type="submit"]:focus,
input[type="submit"]:active {
  background: #a7dbd8;
  border-color: #69d2e7;
  color: #000;
  cursor: pointer;
}



/* toggle button style*/
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.productname{
    font-weight:bold;
}
.imgg{
    margin-left:30px;
}
  .timeBar{
    width: 300px;
    font-size:50px;
    color:blue;
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

<div class="cont"> 
   <h1>CONTROL DEVICES PAGE</h1>
<div class="productcont">
                      <?php
                         
                      
                        $tbl_schedule = display_ONEDevice($db,$Did);
						            $fetch=$tbl_schedule->fetch_array();
                          $deviceID = $fetch['device_id'];
                          $deviceStatus = $fetch['device_status'];
                        
                        
                         
						?>



                        <div class="product">
                              
                        <form method="POST" id="toggleForm">
                        <img class="imgg"  id="imm" width="200px" height="200px" src="../img/device_pic/<?php if($deviceStatus==0){ echo $fetch['device_image1'];}else{ echo $fetch['device_image2'];} ?>"><br/>
                      
                            <table>
                               <tr>
                                <td>
                                Name:
                                </td>
                                <td>
                                <p class="productname"><?php echo $fetch['device_name']; ?></p>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                Category:
                                </td>
                                <td>
                                <p><?php echo $fetch['device_category']; ?></p>
                                </td>
                                </tr>
                            
                                <tr>
                                <td>
                                Room name:
                                </td>
                                <td>
                                <p><?php echo $fetch['room_name']; ?></p>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                Last update:
                                </td>
                                <td>
                                <p class="text-center" id="updatedAt">Last updated at: </p>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                <label class="switch" id="statusText" for="customSwitch<?php echo $deviceID; ?>">
                                    <input type="checkbox" class="custom-control-input"  id="customSwitch<?php echo $deviceID; ?>" name='machine_state'<?php echo $checked_status; ?>>
                                    <span class="slider round"></span>
                                    
                                    </label> 
                                </td>
                                <td>
                                <button type="submit" class="addtocart" name="form_submit">Update</button>
                                </td>
                                </tr>

                                <tr>
                                <td>
                        
                                <span>Currently: </span>
                                </td>
                                <td>
                                <span><?php echo $status_str; ?></span>
                                </td>
                                </tr>
                            </table>
                            <input type="hidden" name="submit" value="">
                            
                            </form>

                       
                                                
                            </div>

                            <?php 
                              $Did=$_GET['deviceID'];
                              $count_rows = get_total_rows($db,$Did);
                              if($count_rows > 0)
                              {
                                $Totalduration = get_duration($db,$Did);
                                $fetch2=$Totalduration->fetch_array();
                                $duration= $fetch2['duration'];
                               ?>
                           
  
                                
                              <div class="product">
                                  <div class="container timeBar ys1" data=<?php echo $duration?>></div>
                              </div>
                              <?php 
                              }
                              ?>
                              
                           
        </div>
        
  
</div>

   


    </div>


  </div>
  <script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "status_victor.php?id=<?php echo $Did;?>",
                data: {"id":<?php echo $Did;?>},
                success: function (data) {
                    console.log(data)
                }
            });
        });
    </script>
  
<script src="https://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script src="countdown.js"></script>
<script type="text/javascript">
    $(function(){
        $(".timeBar").each(function () {
            $(this).countdownsync({
                dayTag: "",
                hourTag: "<label class='tt hh dib vam'>00</label><span>: </span>",
                minTag: "<label class='tt mm dib vam'>00</label><span>: </span>",
                secTag: "<label class='tt ss dib vam'>00</label><span></span>",
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
            if(hours ==00 && min ==00 && sec == 00)
            {
              var timerData={};
               timerData.hour =  hours;
               timerData.minutes =  min;
               timerData.seconds =  sec;

               console.log(timerData)
               $.ajax({

                   url:"viewDevices_victor2.php",
                   method:"post",
                   data:timerData,
                   success:function(res){
                    console.log(res);
                   }
               })
              $("#customSwitch<?php echo $deviceID; ?>").on('change', function() {
                    
                      
               
                // $(this).is(':checked');
                        
                    
            });

           
          }
             


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
