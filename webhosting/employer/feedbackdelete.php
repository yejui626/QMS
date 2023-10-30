
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


$sql = "DELETE FROM tb_feedback WHERE f_serviceID = '$sid'";

//Execute SQL
$result = mysqli_query($con, $sql);

//Redirect or successful notification
    $message = 'This feedback has been deleted!';

    echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('servicedetails.php?id={$sid}');
    </SCRIPT>";

mysqli_close($con); 





?>