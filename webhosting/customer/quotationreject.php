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
else{
	$qid = $_POST['qid'];
	$reason = $_POST['reason'];
}

$sql = "SELECT * FROM tb_quotation WHERE q_quotationID = '$qid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$sid = $row['q_serviceID'];

//SQL INSERT (CREATE) Operation
   	$sql1="UPDATE tb_quotation
			SET q_statusID = '2', q_reason = '$reason'
			WHERE  q_quotationID = '$qid' ";

   	//Check SQL execution -optional
	var_dump($sql1);

	//Execute SQL
	$result1 = mysqli_query($con, $sql1);

	//Close Connection
	$con->close();

	//Redirect or successful
	header('Location: quotationview.php?id='.$qid.'&rejectsuccess');


//Close connection
mysqli_close($con);

//Redirect or successful notification
//header('Location: customer.php');
?>