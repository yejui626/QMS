
  <?php
    include '../qmssession.php';

if(!session_id())
{
  session_start();
}
//Connect to DB
include ('../dbconnect.php');

//Retrieve data from form
$username= $_SESSION['u_username'];
$userid = $_SESSION['u_userID'];
$fstate=$_POST['inputState'];

$sql="INSERT INTO tb_address(a_addressID, a_street, a_city, a_postcode, a_state) VALUES (LAST_INSERT_ID(),'add','new','99999', '$fstate')";


  //Execute SQL
  $result = mysqli_query($con, $sql);

  //Close Connection
  $con->close();

  //Redirect or successful
  header ('location:customer.php?alert=successadd');


//Close connection
mysqli_close($con);


    

?>