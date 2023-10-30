
<?php 

include '../qmssession.php';

if(!session_id())
{
    session_start();
}
include '../dbconnect.php';



if(isset($_GET['id'])){
	$sid = $_GET['id'];
}


$sql = "DELETE FROM tb_service WHERE s_serviceID = '$sid'";

//Execute SQL
$result = mysqli_query($con, $sql);

//Redirect or successful notification
    $message = 'This service record has been deleted!';

    echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('service.php');
    </SCRIPT>";

mysqli_close($con); 


?>