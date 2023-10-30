
<?php

include '../dbconnect.php';
include '../qmssession.php';

if(!session_id())
{
    session_start();
}


//Connect to DB
$userID = $_SESSION['u_userID'];

//Retrieve data from form

$password = $_POST['password'];

//Get user data based on login information (RETRIEVE) operation
$sql = "SELECT * FROM tb_user WHERE u_userID = '$userID' ";

//Execute SQL
$result= mysqli_query($con, $sql);  //Execute SQL statement
$row = mysqli_fetch_array($result); //Retrieve result 


//Check login

if(password_verify($password, $row['u_pwd'])) 
   //User found
{
	//set session
	header ('Location: profile.php');

}
else //User not found
{
	header ('Location: checkuser.php?alert=notexist');
}

//Close connection
mysqli_close($con);


?>
       