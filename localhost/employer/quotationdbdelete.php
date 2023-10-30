
<?php 

include '../qmssession.php';

if(!session_id())
{
    session_start();
}
include '../dbconnect.php';

if(isset($_GET['id'])){
	$qid = $_GET['id'];
}

if($qid == "all"){
	$sql2 = "SELECT q_quotationID FROM tb_quotation WHERE q_statusID = '5'";
	$result2 = mysqli_query($con, $sql2);

	while($row2 = mysqli_fetch_array($result2)){
		$sql1 = "DELETE FROM tb_item WHERE i_quotationID = '$row2[0]'";
		$result1 = mysqli_query($con, $sql1);

		$sql = "DELETE FROM tb_quotation WHERE q_statusID = '5'";
		$result = mysqli_query($con, $sql);
	}
}
else{
	//SQL UPDATE booking into database
	$sql1 = "DELETE FROM tb_item WHERE i_quotationID = '$qid'";
	$result1 = mysqli_query($con, $sql1);

	$sql = "DELETE FROM tb_quotation WHERE q_quotationID = '$qid'";

	//Execute SQL
	$result = mysqli_query($con, $sql);
}
var_dump($sql1);

//Redirect or successful notification
    $message = 'This quotation record has been deleted!';

    echo "<SCRIPT>
        alert('$message')
        window.location.replace('quotation.php');
    </SCRIPT>";

mysqli_close($con); 


?>