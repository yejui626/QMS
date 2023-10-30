<?php
include '../qmssession.php';

if(!session_id())
{
	session_start();
}
//Connect to DB
include ('../dbconnect.php');

//Retrieve data from form
$username= $_SESSION['u_username'];
$userid = $_SESSION['u_userID'];
$fname= $_POST['fname'];
$fphone= $_POST['fphone'];
$fstreet= $_POST['fstreet'];
$fcity = $_POST['fcity'];
$fpostcode= $_POST['fpostcode'];
$fstate= $_POST['fstate'];
$addressID= mysqli_insert_id($con);
$customerID= NULL;
$statusID = '6';





//SQL INSERT (CREATE) Operation

$sql="INSERT INTO tb_address(a_addressID, a_street, a_city, a_postcode, a_state) VALUES (?,?,?,?,?)";
	

	$statement = $con->prepare($sql);
	$statement->bind_param("issis",$addressID,$fstreet,$fcity,$fpostcode,$fstate);

if ($statement->execute()) {
  $last_id = mysqli_insert_id($con);
  $sql1 = "INSERT INTO tb_customer (c_custID,c_userID,c_customerName,c_phoneNo,c_addressID,c_statusID) VALUES (?,?,?,?,?,?)";

  $statement1 = $con->prepare($sql1);
	$statement1->bind_param("iissii",$customerID,$userid,$fname,$fphone,$last_id,$statusID);

	$statement1->execute();
	print $statement1->error; //to check errors
	$statement1->close();
	$statement->close();

	//Close Connection
	$con->close();

	//Redirect or successful
	header ('location:customer.php');
} else {
  print $statement->error;
}

//Close connection
mysqli_close($con);

?>