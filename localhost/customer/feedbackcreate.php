<?php 
include '../qmssession.php';

if(!session_id())
{
    session_start();
}
include '../dbconnect.php';



	//Retrieve data from form
	$u_userID=$_SESSION['u_userID'];
	$frating = $_POST['frating'];
	$fdetails = $_POST['fdetails'];
	$fsid = $_POST['fsid'];


	//SQL Insert (CREATE) operation
	$sql = "INSERT INTO tb_feedback (f_feedbackID, f_serviceID, f_details, f_rating) 
			VALUES (LAST_INSERT_ID(), '$fsid', '$fdetails','$frating')" ;

	//Check SQL execution -optional
	var_dump($sql);

	//Execute SQL
	$result = mysqli_query($con, $sql);

	
	//Close Connection
	$con->close();

	//Redirect or successful
	header ("location:servicedetails.php?id=$fsid");

?>