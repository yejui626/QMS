
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
$fstate1=$_POST['fstate1'];
echo '$fstate1';
       
      $sql="DELETE FROM tb_address
            WHERE a_street='add' AND a_postcode='99999' AND a_state='$fstate1' ";


  //Execute SQL
  $result = mysqli_query($con, $sql);


if (mysqli_query($con, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($con);
}

  //Close Connection
  $con->close();

  //Redirect or successful
 header ('location:customer.php?alert=successdelete');


//Close connection
mysqli_close($con);


    

?>