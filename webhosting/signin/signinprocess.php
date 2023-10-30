<?php
session_start();

//Connect to DB
include ('../dbconnect.php');

//Retrieve data from form
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_user WHERE u_username='$username' AND u_statusID='6'";
$result= mysqli_query($con, $sql);  //Execute SQL statement
$row = mysqli_fetch_array($result); //Retrieve result 



if(password_verify($password, $row['u_pwd'])) {
  


	//set session
	$userid=$row['u_userID'];
	$_SESSION['u_username'] = session_id();
	$_SESSION['username'] = $username;
	$_SESSION['u_userID'] = $userid;
	$_SESSION['u_type'] = $row['u_type'];



	if($row['u_type'] == 1) //Admin
	{
		header ('Location: ../employer/dashboard.php');
	}
	else if($row['u_type'] == 2)//Employee
	{
		header ('Location: ../employee/dashboard.php');
	}
	else if($row['u_type'] == 3)//Customer
	{
		header ('Location: ../customer/dashboard.php');
	}

}

else //User not found
{
	header ('Location: signin.php?alert=notexist');
}



//Close connection
mysqli_close($con);


?>