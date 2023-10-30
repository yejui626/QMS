<?php 

include ('../qmssession.php');

if(!session_id())
{
	session_start();
}

//connect to database
include ('../dbconnect.php');

//quotation
$sid = $_POST['sid'];
$qid = $_POST['qid'];
$topic = $_POST['topic'];
$date = $_POST['date'];
$total = $_POST['total'];

//SQL INSERT (CREATE) Operation

$sql="UPDATE tb_quotation
	SET q_topic = '$topic', q_date = '$date', q_totalAmount = '$total'
	WHERE  q_quotationID = '$qid' ";


//Execute SQL
if (!(mysqli_query($con, $sql))) {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

//Close connection
mysqli_close($con);

//Redirect or successful notification
header('Location: quotationview.php?id='.$qid.'&savesuccess');
?>