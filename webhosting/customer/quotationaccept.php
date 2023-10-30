<?php 

include ('../qmssession.php');

if(!session_id())
{
	session_start();
}

//connect to database
include ('../dbconnect.php');

//item
if(isset($_GET['id'])){
   $qid = $_GET['id'];
}

$sql = "SELECT * FROM tb_quotation WHERE q_quotationID = '$qid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$sid = $row['q_serviceID'];

//SQL INSERT (CREATE) Operation
   	$sql1="UPDATE tb_quotation
			SET q_statusID = '3'
			WHERE  q_quotationID = '$qid' ";

   	//Check SQL execution -optional
	var_dump($sql1);

	//Execute SQL
	$result1 = mysqli_query($con, $sql1);

	$currentDateTime = date('Y-m-d H:i:s');
	echo $currentDateTime;
	$sql2="UPDATE tb_service
			SET s_statusID = '4', s_completeDate = '$currentDateTime'
			WHERE  s_serviceID = '$sid' ";

   	//Check SQL execution -optional
	var_dump($sql2);

	//Execute SQL
	$result2 = mysqli_query($con, $sql2);

	$sql3="UPDATE tb_quotation
			SET q_statusID = '2'
			WHERE  q_serviceID = '$sid' AND q_statusID = '1' ";
	$result3 = mysqli_query($con, $sql3);
	
	//Close Connection
	$con->close();

	//Redirect or successful
	header('Location: quotationview.php?id='.$qid.'&acceptsuccess');


//Close connection
mysqli_close($con);

//Redirect or successful notification
//header('Location: customer.php');
?>