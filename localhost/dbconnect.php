<?php

//Set DB Parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_qms";

//Create Conenction
$con = mysqli_connect($servername, $username, $password, $dbname);
//Check connection
if (mysqli_connect_errno()) {
	header ('Location: employer/404.html');
    die("Connection failed: " . mysqli_connect_error());
}
//Close connection

?>