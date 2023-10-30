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
   $itemID = $_GET['id'];
}

$sql = "SELECT i_quotationID FROM tb_item WHERE i_itemID = '$itemID'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$qid = $row['i_quotationID'];

//SQL INSERT (CREATE) Operation
   	$sql1 = "DELETE FROM tb_item WHERE i_itemID = '$itemID'";

   	//Check SQL execution -optional
	var_dump($sql1);

	//Execute SQL
	$result1 = mysqli_query($con, $sql1);


	//Close Connection
	$con->close();

	//Redirect or successful
	header ('location:quotationmodify.php?id='.$qid);


//Close connection
mysqli_close($con);

//Redirect or successful notification
//header('Location: customer.php');
?>