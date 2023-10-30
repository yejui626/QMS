<?php

//Connect to DB
include ('../dbconnect.php');

//Retrieve data from form

$uid= $_POST['userID'];
$password= $_POST['password'];
$password2= $_POST['password2'];
$data = $_POST;

$hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $sql= "UPDATE tb_user
            SET  u_pwd= '$hashed_password'
            WHERE u_userID='$uid'";



//Execute SQL
mysqli_query($con,$sql);

//Close connection
mysqli_close($con);

//Redirect or successful notification
header("Location: profile.php?alert=successchange");


?>
