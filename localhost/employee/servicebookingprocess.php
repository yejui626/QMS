<?php 
include '../qmssession.php';

if(!session_id())
{
    session_start();
}
include '../dbconnect.php';



	//Retrieve data from form
	$u_userID=$_SESSION['u_userID'];
	$fcustomer = $_POST['fcustomer'];
	$fbdate = $_POST['fbdate'];
	$fdetails = $_POST['fdetails'];
	$ftype = $_POST['ftype'];
	$cdate = '0';
	$stid = '1';
	$sid = NULL;


	//SQL Insert (CREATE) operation
	$sql = "INSERT INTO tb_service (s_serviceID,s_userID, s_custID, s_requestDate, s_completeDate,s_details,s_statusID,s_typeID) 
		VALUES (?,?,?,?,?,?,?,?)" ;

	$statement = $con->prepare($sql);
	$statement->bind_param("iiisssii",$sid,$u_userID,$fcustomer,$fbdate,$cdate,$fdetails,$stid,$ftype);

	$statement->execute();
	print $statement->error; //to check errors
	$statement->close();
	
	//Close Connection
	$con->close();

	//Redirect or successful
	header ('location:service.php');

?>