<?php
    function connection(){
        return $db = new mysqli('localhost:3306','root','','happyfamily');
    }
  
?>