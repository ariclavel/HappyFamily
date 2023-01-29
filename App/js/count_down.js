
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
    






