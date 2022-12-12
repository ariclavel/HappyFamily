//require 'connection.php';

function connection(){
    $serverName = "localhost";
    $username = "root";
    $passwd = "";
    $DBName = "HappyFamily";

    return new PDO("mysql:host=$serverName;dbname=$DBName", $username, $passwd);
    
}