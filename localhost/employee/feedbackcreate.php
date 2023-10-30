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
	$feedbackID = NULL;

	//SQL Insert (CREATE) operation
	$sql = "INSERT INTO tb_feedback (f_feedbackID, f_serviceID, f_details, f_rating) 
			VALUES (?, ?, ?,?)" ;

	$statement = $con->prepare($sql);
	$statement->bind_param("iisi",$feedbackID,$fsid,$fdetails,$frating);

	$statement->execute();
	print $statement->error; //to check errors
	$statement->close();

	
	//Close Connection
	$con->close();

	//Redirect or successful
	header ("location:servicedetails.php?id=$fsid");

?>