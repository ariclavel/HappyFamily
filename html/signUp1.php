
<html>
<head>
<title>Happy Family</title>
</head>
    <link rel="stylesheet" href="../css/login.css">
  
<body ng-controller="testCtrl">
 
    <h1 id="hfamily"> <img id="img" src="../img/logo5.png" alt="Workplace" >HAPPY FAMILY</h1>
    <h1 id="title">Register page</h1>

    <form id="form" action="../php/createUser.php" method="GET">
        <label for="email" class="miniti">Username:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="pssw" class="miniti">Password:</label><br>
        <input type="password" id="pssw" name="pss1">
        <label for="pssw"2 class="miniti">Confirm Password:</label><br>
        <input type="password" id="pssw2" name="pss2">


        
        <button>Submit</button>
      </form>

</body>
</html> 