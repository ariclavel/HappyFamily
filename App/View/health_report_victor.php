<?php
session_start();
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.12.0/d3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.6.9/apexcharts.min.js"></script>
  <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
  
  <style type="text/css">
 

  .middle_part{
    margin-right:200px;
    
  }
  
  .row{
    display:flex;
    align-items:center;
    gap:3em;
  }
  

  
  .main-body{
    margin-right: 230px;
   
   
   }
   .contain{
  display: flex;
  justify-content: center;
  align-items: center;
  
  width:auto;
  height:500px;
  
}

svg{
  background: #2f3b51;
}

line, path{
  stroke: #232e42;
}
text{
  fill:#657d95;
}

#chart {
  width: 1000px;
  margin: 35px auto;
  height: 50vh;
 
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
                <h4 class="text-right">PET DASHBOARD</h4>
                <table>
        
               
    
                            <tr>
                                        <td> 
                                        <div class="contain"></div>
                                        </td>
                                        
                            </tr>
       

        

        
        
       
                            </table>
                            <br/> <br/>



                            <table>
        
               
                            
                                <tr>
                                            <td> 
                                            <div id="chart"></div>
                                            </td>
                                            
                                </tr>
       
                            </table>
                
                
                
            

            </div>
            
                        
    </div> 
       
        

  


 
    <script>
var ts2 = 1484418600000;
var dates = [];
var spikes = [5, -5, 3, -3, 8, -8];
for (var i = 0; i < 120; i++) {
  ts2 = ts2 + 86400000;
  var innerArr = [ts2, dataSeries[1][i].value];
  dates.push(innerArr);
}

var options = {
  chart: {
    type: "area",
    stacked: false,
    height: 250,
    zoom: {
      type: "x",
      enabled: true
    },
    toolbar: {
      autoSelected: "zoom"
    }
  },
  dataLabels: {
    enabled: false
  },
  series: [
    {
      name: "HEAlTH STATUS",
      data: dates
    }
  ],
  markers: {
    size: 0
  },
  title: {
    text: "Pets motion and rumination behaviour",
    align: "left"
  },
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      inverseColors: false,
      opacityFrom: 0.5,
      opacityTo: 0,
      stops: [0, 90, 100]
    }
  },
  yaxis: {
    min: 20000000,
    max: 250000000,
    labels: {
      formatter: function(val) {
        return (val / 1000000).toFixed(0);
      }
    },
    title: {
      text: "Value"
    }
  },
  xaxis: {
    type: "datetime"
  },

  tooltip: {
    shared: false,
    y: {
      formatter: function(val) {
        return (val / 1000000).toFixed(0);
      }
    }
  }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();


</script>

  <script>

const randomInt = (start, end)=>{
    if(!end) return Math.floor(Math.random() * Math.floor(start))
    return start + Math.floor(Math.random() * Math.floor(end - start))
}
const { innerWidth, innerHeight } = window;
const w = innerWidth * 0.7;
const h = innerHeight * 0.7;
const svg = d3
  .select(".contain")
  .append("svg")
  .attr("height", h)
  .attr("width", w);

const margin = 40;
const width = w - 2 * margin;
const height = h - 2 * margin;

const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December"
];
const data = months.map(month => ({ month, value: randomInt(0, 100) }));

const groupMain = svg
  .append("g")
  .attr("transform", `translate(${margin}, ${margin})`);

const yScale = d3
  .scaleLinear()
  .range([height, 0])
  .domain([0, 100]);

groupMain.append("g").call(d3.axisLeft(yScale));

const xScale = d3
  .scaleBand()
  .range([0, width])
  .domain(data.map(i => i.month))
  .padding(0.1);

groupMain
  .append("g")
  .attr("transform", `translate(0, ${height})`)
  .call(d3.axisBottom(xScale));

groupMain
  .append("g")
  .attr("class", "grid")
  .call(
    d3
      .axisLeft()
      .scale(yScale)
      .tickSize(-width, 0, 0)
      .tickFormat("")
  );

groupMain
  .selectAll()
  .data(data)
  .enter()
  .append("rect")
  .attr("class", "bar")
  .attr("x", s => xScale(s.month))
  .attr("y", s => yScale(s.value))
  .attr("height", s => height - yScale(s.value))
  .attr("fill", "#cc4d73")
  .attr("width", xScale.bandwidth());

TweenMax.staggerFrom(
  ".bar",
  2,
  {
    attr: { y: height, height: 0 },
    ease: Power4.easeOut
  },
  0.05
);
</script>


</body>
</html>
