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
    SET  u_pwd= ?
    WHERE u_userID=?";

    $statement = $con->prepare($sql);
    $statement->bind_param("si",$hashed_password,$uid);

    $statement->execute();
    print $statement->error; //to check errors
    $statement->close();

//Close connection
mysqli_close($con);

//Redirect or successful notification
header("Location: profile.php?alert=successchange");


?>
