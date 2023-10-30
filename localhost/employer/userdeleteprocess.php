<?php

//Connect to DB
include ('../dbconnect.php');

//GET USER ID
if(isset($_GET['id']))
{
  $uid=$_GET['id'];
}


$sql = "UPDATE tb_user
 		SET   u_statusID='7'
		WHERE u_userID= '$uid'";

//Execute SQL
mysqli_query($con,$sql);

//Close connection
mysqli_close($con);

//Redirect or successful notification
header("Location: user.php?alert=successdelete");



?>