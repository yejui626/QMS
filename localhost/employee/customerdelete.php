
<?php 

include ('../qmssession.php');

if(!session_id())
{
	session_start();
}

//connect to database
include ('../dbconnect.php');

$u_username= $_SESSION['u_username']; 
$u_userID=$_SESSION['u_userID'];

//GET booking ID
if(isset($_GET['id']))
{
  $bid=$_GET['id'];
}

//SQL UPDATE customer delete
$sql= " UPDATE tb_customer
		SET c_statusID='7' 
		WHERE c_custID ='$bid' ";

//Execute SQL
$result = mysqli_query($con, $sql);

//Close Connection
mysqli_close($con); 

//Redirect or successful notification
header ('Location: customer.php');

?>