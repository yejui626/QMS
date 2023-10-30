<?php 

include ('../qmssession.php');

if(!session_id())
{
	session_start();
}

//connect to database
include ('../dbconnect.php');

//item
$item = $_POST['item'];
$q_id = $_POST['qid'];
$qty = $_POST['qty'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$amount = $_POST['amount'];


//SQL INSERT (CREATE) Operation
   	$sql1 = "INSERT INTO tb_item (i_quotationID, i_item, i_qty, i_qtType, i_unitPrice, i_amount) VALUES ('$q_id','$item','$qty','$unit','$price', '$amount')";

   	//Check SQL execution -optional
	var_dump($sql1);

	//Execute SQL
	$result = mysqli_query($con, $sql1);


	//Close Connection
	$con->close();

	//Redirect or successful
	header ('location:quotationmodify.php?id='.$q_id);


//Close connection
mysqli_close($con);

//Redirect or successful notification
//header('Location: customer.php');
?>