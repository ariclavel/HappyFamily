<?php
$cache_file = 'data.json';

  $api_url = 'https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
  $data = file_get_contents($api_url);
  file_put_contents($cache_file, $data);
  $data = json_decode($data);
// }

$current = $data->results->current[0];
$forecast = $data->results->seven_day_forecast;

?>
<style>

  .aqi-value{
    font-family : "Noto Serif","Palatino Linotype","Book Antiqua","URW Palladio L";
    font-size:30px;
    font-weight:bold;
  }
  h1{
    text-align: center;
    font-size:3em;
  }
  .forecast-block{
  	background-color: #fff!important;
  	width:20% !important;
  }
  .title{
  	background-color:#1b262c;
  	width: 100%;
  	color:#fff;
  	margin-bottom:0px;
  	padding-top:10px;
  	padding-bottom: 10px;
  }
  .bordered{
  	border:1px solid #000;
  }
  .weather-icon{
  	width:40%;
  	font-weight: bold;
  	background-color: #1b262c;
  	padding:10px;
  	border: 1px solid #000;
  }
</style>

<?php
  function convert2cen($value,$unit){
    if($unit=='C'){
      return $value;
    }else if($unit=='F'){
      $cen = ($value - 32) / 1.8;
      	return round($cen,2);
      }
  }
?>

  <br>
  
  <div>
    
   
    <table>
    <tr>
             <td>
             <h3 class="titlee" style="border-bottom:1px solid black;">Weather Report for:

                
             </h3>
             
             </td>

             <td>
             <h3 style="border-bottom:1px solid black;"> <?php echo $current->city.' ('.$current->country.')';?></h3>
             </td>
          </tr>


          <tr>
             <td>
             <p class="aqi-value"><?php echo convert2cen($current->temp,$current->temp_unit);?> °C</p>
             </td>
          </tr>

          <tr>
             <td>
             <img style="margin-left:-10px;" src="<?php echo $current->image;?>">
             </td>
             <td>
             <?php echo $current->description;?>
             </td>
          </tr>

          <tr>
             <td>
             <p>Wind Speed :</p>
             </td>

             <td>
             <p><?php echo $current->windspeed;?> <?php echo $current->windspeed_unit;?></p>
             </td>
          </tr>

          <tr>
             <td>
             <p>Pressue :</p>
             </td>
             <td>
             <p><?php echo $current->pressure;?> <?php echo $current->pressure_unit;?></p>
             </td>
             
          </tr>

          <tr>
             <td>
             <p>Visibility:</p>
             </td>
             <td>
             <p><?php echo $current->visibility;?> <?php echo $current->visibility_unit;?></p>
             </td>
             
          </tr>

        </table>
  </div>



  <br><br>
  
