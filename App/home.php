<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Home</title>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/stylehome_victor.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
    <script src="https://kit.fontawesome.com/14663d3968.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header-container">
      <div class="header">
        <div class="logo">
            <img class="ïmgg" src="img/logo11.png" />
            <h2>Happy-Family</h2>
        </div>

        <nav class="menu">
          <div class="menu-items">
            <a href="View/DashboardUser.php">Dashboard</a>
          </div>
          <div class="menu-items">
            <a href="">All-Pets
            </a>
          </div>
          <div class="menu-items">
            <a href="">Purchase</a>
          </div>
          <div class="menu-items">
            <a href="">Contact-Us</a>
          </div>

        </nav>
        
        <div class="log-menu">
            <a href="View/login.php"><button class="but">Login</button></a>
        </div>


        <div>

        </div>
      </div>


    </div>
    <div class="section">

        <div class="side-contents">
            <div class="side-logo">
                <img class="ïmg-side" src="img/smart.jpeg" />
                <h2>Pets Robot</h2>
            </div>

            <div class="side-logo">
                <img class="ïmg-side" src="img/smart2.jpg" />
                <h2>Pets Tracker</h2>
            </div>

            <div class="side-logo">
                <img class="ïmg-side" src="img/smart3.png" />
                <h2>Pets Feeder</h2>
            </div>
        </div>
         <div class="cards-all">
            <div class="card">
                <div class="vid-head">
                    <h1 class="video-text">Smart Homes</h1>
                </div>
                <p>
                
                    Smart devices are omnipresent in our daily lives. 57% of homes in the UK 
                    had some sort of smart device in 2021. As the array of devices becomes ever 
                    larger, interconnectivity and interoperability will be key.  

                    Critical’s ConnectaX solution offers near-total interoperability between smart 
                    devices, including EV chargers, smart meters and smart home appliances. For 
                    energy suppliers and DNOs, the control ConnectaX gives to customers can help 
                    manage supply and demand. For customers, the efficiencies created could save them money.  
                </p>
                <video src="videos/HappyHome.mp4" class="video-cont" poster ="img/smart-home.jpg" autoplay controls width="800px" padding="10px" height="500px" >
                    
                </video>
            </div>
            <div class="card">
                <h1 class="header-text">Lighting</h1>
                    <div class="start-container">
                    <div class="start-item">
                    
                        <i class="fa fa-clock-o" arial-hidden="true" ></i>
                    <p>17 Hours</p>
                    </div>
                    <div class="start-item">
                        <i class="fa fa-video" arial-hidden="true" ></i>
                        <p>25 videos</p>
                    </div>
                    <div class="start-item">
                        <i class="fa fa-pencil" arial-hidden="true" ></i>
                        <p>131 practice questions</p>
                    </div>

                    
                    </div>
                    <div class="description">
                        <p>
                        Easily and quickly control and adapt your lights in any situation.
                        </p>
                        <div class="grey-container">
                            <div class="left">
                            
                                <i class="fa fa-clock-o" arial-hidden="true" ></i>
                            <h3 class="sub-header">Lessons</h3>
                            </div>
                        <button class="button">Resume -></button>
                        </div>
                        <div class="grey-container">
                            <div class="left">
                                <i class="fa fa-clock-o" arial-hidden="true" ></i>
                        <h3 class="sub-header">Assessment</h3>
                        </div>
                        <button class="button">Resume -></button>
                        </div>
                    </div>

            


            </div>

            <div class="card">
                <h1 class="header-text">Blinds</h1>
                    <div class="start-container">
                    <div class="start-item">
                    
                        <i class="fa fa-clock-o" arial-hidden="true" ></i>
                    <p>17 Hours</p>
                    </div>
                    <div class="start-item">
                        <i class="fa fa-video" arial-hidden="true" ></i>
                        <p>25 videos</p>
                    </div>
                    <div class="start-item">
                        <i class="fa fa-pencil" arial-hidden="true" ></i>
                        <p>131 practice questions</p>
                    </div>

                    
                    </div>
                    <div class="description">
                        <p>
                        Accurate remote control over all of your blinds and roller shutters..
                        </p>
                        <div class="grey-container">
                            <div class="left">
                            
                                <i class="fa fa-clock-o" arial-hidden="true" ></i>
                            <h3 class="sub-header">Lessons</h3>
                            </div>
                        <button class="button">Resume -></button>
                        </div>
                        <div class="grey-container">
                            <div class="left">
                                <i class="fa fa-clock-o" arial-hidden="true" ></i>
                        <h3 class="sub-header">Assessment</h3>
                        </div>
                        <button class="button">Resume -></button>
                        </div>
                    </div>

            


            </div>
        </div>
    </div>
   
      

   


</body>

<?php
include("View/footer.php");
?>

</html>