<?php

//Set DB Parameters
$servername = "localhost";
$username = "u886803676_localhost";
$password = "Meta2022!";
$dbname = "u886803676_db_qms";

//Create Conenction
$con = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if ($con->connect_error) {
    header ('Location: employer/404.html');
    die("Connection failed: " . $con->connect_error);
    
}
//Close connection

?>