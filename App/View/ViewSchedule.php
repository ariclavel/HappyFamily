<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';

session_start();
$user= $_SESSION['id'];
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
  <style type="text/css">
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
<?php
include("Dashboard_header.php");
?>

 
  <div class="container">
  <?php
include("Dashboard_left_menu.php");
?>
   

<div class="main-body">
   
<div class="content">
<div class="table-wrapper">
        <table class="fl-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Room</th>
                                            <th>Device</th>
                                            <th>Duration</th>
                                            <th>Timer</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
                                          $user= $_SESSION['id'];
                                            $i=1;
                                            $tbl_schedule = display_schedule($db, $user);
											while($fetch=$tbl_schedule->fetch_array()){ 
										?>
											<tr>
												<td><?php echo $i++?></td>
                                                
												<td><?php echo $fetch['room_name']?></td>
												<td><?php echo $fetch['device_name']?></td>
												<td><?php echo $fetch['duration']?></td>
												<td>
                                                <div class="container timeBar ys1" data=<?php echo $fetch['duration']?> ></div>
                                                </td>
                                                <td>
                                                <a href="editSchedule.php?id=<?php echo $fetch['scheduler_id']?>"><i class="fa-solid fa-pen-to-square"></i></a><a onclick="return checkDelete()" href="deleteSchedule.php?id=<?php echo $fetch['scheduler_id']?>"><i class="fa-sharp fa-solid fa-delete-left"></i></a>
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


  </div>
  
    <!-- delete account-->
    <div class="modal">
               <div class="modal-content">
                   <span class="close-button">×</span>
                   <h3>Update profile photo</h3>
                
               </div>
              
										
                   
           </div>

           


<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete this schedule?');
}
</script>

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
