<?php

//Pripojenie k PhpMyAdmin
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "vaiicko_db";

$conn = new mysqli($servername, $username, $password, $database);


//Overenie
if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
echo "Spojenie je úspešné";

?>
