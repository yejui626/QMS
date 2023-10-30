<?php

//Connect to DB
include ('../dbconnect.php');

//Retrieve data from form

$username= $_POST['username'];
$email= $_POST['email'];
$password= $_POST['password'];
$password2= $_POST['password2'];
$data = $_POST;

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

//match username
$duplicate=mysqli_query($con,"SELECT * from tb_user where u_username='$username' ");
//match email
$duplicate1=mysqli_query($con,"SELECT * from tb_user where u_email='$email'");

//Same username, email, password
if((mysqli_num_rows($duplicate)>0) && (mysqli_num_rows($duplicate1)>0))
{
	header("Location: signup.php?alert=usernameexist&emailexist");
}

//Same username
elseif (mysqli_num_rows($duplicate)>0)
{

	header("Location: signup.php?alert=usernameexist");
}
//Same email 
elseif (mysqli_num_rows($duplicate1)>0)
{
	header("Location: signup.php?alert=emailexist");
	
}

//All correct
else{
//SQL INSERT (CREATE) Operation
$sql= "INSERT INTO tb_user (u_username , u_pwd, u_email, u_type,u_statusID) 
		VALUES('$username','$hashed_password','$email','3','6')";


//Execute SQL
mysqli_query($con,$sql);

//Close connection
mysqli_close($con);

//Redirect or successful notification
header("Location: signin.php?alert=successregister");
}


?>