<?php

//Connect to DB
include ('../dbconnect.php');

//Retrieve data from form

$username= $_POST['username'];
$email= $_POST['email'];
$password= $_POST['password'];
$password2= $_POST['password2'];
$userType= $_POST['userType'];
$data = $_POST;
$statusID = '6';

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

//match username
$duplicate=mysqli_query($con,"SELECT * from tb_user where u_username='$username'");
//match email
$duplicate1=mysqli_query($con,"SELECT * from tb_user where u_email='$email'");



//Same username, email, password
if((mysqli_num_rows($duplicate)>0) && (mysqli_num_rows($duplicate1)>0))
{
  header("Location: user.php?alert=ueexist");
}

//Same username
elseif (mysqli_num_rows($duplicate)>0)
{

  header("Location: user.php?alert=usernameexist");
}
//Same email 
elseif (mysqli_num_rows($duplicate1)>0)
{
  header("Location: user.php?alert=emailexist");
  
}

//All correct
else{
//SQL INSERT (CREATE) Operation
$sql= "INSERT INTO tb_user (u_username , u_pwd, u_email, u_type,u_statusID) 
    VALUES(?,?,?,?,?)";


    $statement = $con->prepare($sql);
    $statement->bind_param("sssii",$username,$hashed_password,$email,$userType,$statusID);

    $statement->execute();
    print $statement->error; //to check errors
    $statement->close();

//Close connection
mysqli_close($con);

//Redirect or successful notification
header("Location: user.php?alert=successregister");
}


?>