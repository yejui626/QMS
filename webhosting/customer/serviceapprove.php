<?php 
include '../qmssession.php';

if(!session_id())
{
    session_start();
}
include '../dbconnect.php';

$u_userID=$_SESSION['u_userID'];

if(isset($_GET['id'])){
  $sid = $_GET['id'];
}
	
$sql= " UPDATE tb_service
		SET s_statusID='3'
		WHERE s_serviceID='$sid' ";


//check SQL execution
var_dump($sql);

//Execute SQL
$result=mysqli_query($con,$sql);

//Close connection
mysqli_close($con);

header("location:servicedetails.php?id={$sid}");

?>