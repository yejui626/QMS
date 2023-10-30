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

	//Calculate rent amount
	$pickup = date('Y-m-d H:i:s',strtotime($fbdate));


	//SQL Insert (CREATE) operation
	$sql = "INSERT INTO tb_service (s_serviceID, s_userID, s_custID, s_requestDate, s_completeDate,s_details,s_statusID,s_typeID) 
			VALUES (LAST_INSERT_ID(), '$u_userID','$fcustomer' ,'$fbdate', '0' ,'$fdetails', '1','$ftype')" ;

	//Check SQL execution -optional
	var_dump($sql);

	//Execute SQL
	$result = mysqli_query($con, $sql);

	
	//Close Connection
	$con->close();

	//Redirect or successful
	header ('location:service.php');

?>