<?php 

include ('../qmssession.php');

if(!session_id())
{
	session_start();
}

//connect to database
include ('../dbconnect.php');

//quotation
$s_id = $_POST['sid'];
$topic = $_POST['topic'];
$date = $_POST['date'];
$total = $_POST['total'];
$quotationID= mysqli_insert_id($con);
$statusID = '1';

//item
$rowCount = $_POST['rowCount'];
$item = $_POST['item'];
$qty = $_POST['qty'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$amount = $_POST['amount'];


//SQL INSERT (CREATE) Operation

$sql="INSERT INTO tb_quotation(q_quotationID, q_serviceID, q_topic, q_date, q_totalAmount, q_statusID) VALUES (?,?,?,?,?,?)";

	$statement = $con->prepare($sql);
	$statement->bind_param("iisssi",$quotationID,$s_id,$topic,$date,$total,$statusID);


//Execute SQL
if ($statement->execute()) {
  $last_id = mysqli_insert_id($con);
  
  for ($x = 0; $x < $rowCount; $x++) 
  {
   	$sql1 = "INSERT INTO tb_item (i_quotationID, i_item, i_qty, i_qtType, i_unitPrice, i_amount) VALUES (?,?,?,?,?,?)";

		$statement1 = $con->prepare($sql1);
		$statement1->bind_param("isisdd",$last_id,$item[$x],$qty[$x],$unit[$x],$price[$x],$amount[$x]);

		$statement1->execute();
		print $statement1->error; //to check errors
		

	}
	//Close Connection
	$con->close();
	$statement1->close();
	$statement->close();

	//Redirect or successful
	header('Location: quotationview.php?id='.$last_id.'&addsuccess');
} else {
  print $statement->error;
}

//Close connection
mysqli_close($con);

//Redirect or successful notification
//header('Location: customer.php');
?>