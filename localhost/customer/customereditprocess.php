<?php
include '../qmssession.php';

if(!session_id())
{
	session_start();
}
//GET customer ID
if(isset($_GET['id']))
{
  $bid=$_GET['id'];
}

$username= $_SESSION['u_username'];
$userid = $_SESSION['u_userID'];

//Connect to DB
include ('../dbconnect.php');

//Retrieve data from form
$fcustID= $_POST['fcustID'];
$fname= $_POST['fname'];
$fphone= $_POST['fphone'];

$fstreet= $_POST['fstreet'];
$fcity = $_POST['fcity'];
$fpostcode= $_POST['fpostcode'];
$fstate= $_POST['fstate'];
$faddressID=$_POST['faddressID'];
$data = $_POST;


//SQL UPDATE booking into DB
$sql="UPDATE tb_address
		SET a_street='$fstreet' , a_city='$fcity' , a_postcode ='$fpostcode ' , a_state ='$fstate'
		WHERE a_addressID ='$faddressID'";

$sql1="UPDATE tb_customer
		SET c_customerName='$fname' , c_phoneNo = '$fphone'
		WHERE c_custID='$fcustID'";




mysqli_query($con,$sql);
mysqli_query($con,$sql1);

//Close connection
mysqli_close($con);


//Redirect or successful notification
header('location: customer.php');