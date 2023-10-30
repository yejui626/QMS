
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

//SQL UPDATE booking into database
$sql = "UPDATE tb_service
		SET s_statusID = '5'
		WHERE s_serviceID = '$sid'";

//Execute SQL
$result = mysqli_query($con, $sql);

//Redirect or successful notification
    $message = 'This service has been cancelled and will not be shown!';

    echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('service.php');
    </SCRIPT>";

mysqli_close($con); 


?>