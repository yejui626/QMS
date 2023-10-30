<?php

//Connect to DB
include ('../dbconnect.php');

//Retrieve data from form
if(isset($_GET['id']))
{
  $uid=$_GET['id'];
}

$uid= $_POST['userID'];
$username= $_POST['username'];
$email= $_POST['email'];
$userType= $_POST['userType'];
$data = $_POST;

//match username

$duplicate=mysqli_query($con,"SELECT * from tb_user where u_username='$username' AND u_userID!='$uid'");
//match email
$duplicate1=mysqli_query($con,"SELECT * from tb_user where u_email='$email' AND u_userID!='$uid'");



$row=mysqli_fetch_array($duplicate);
$row1=mysqli_fetch_array($duplicate1);



//Same username, email, password
if((mysqli_num_rows($duplicate)>0) && (mysqli_num_rows($duplicate1)>0))
{
  header("Location: useredit.php?id=".$row['u_userID']."alert=usernameexist&emailexist");
}

//Same username
elseif (mysqli_num_rows($duplicate)>0)
{

  header("Location: useredit.php?id=".$row['u_userID']."alert=usernameexist");
}
//Same email 
elseif (mysqli_num_rows($duplicate1)>0)
{
  header("Location: useredit.php?id=".$row1['u_userID']."alert=emailexist");
  
}

//All correct
else{
//SQL INSERT (CREATE) Operation


    $sql= "UPDATE tb_user
            SET u_username=? , u_email = ?, u_type = ?
            WHERE u_userID= ?";

    $statement = $con->prepare($sql);
    $statement->bind_param("ssii",$username,$email,$userType,$uid);

    $statement->execute();
    print $statement->error; //to check errors
    $statement->close();


//Close connection
mysqli_close($con);

//Redirect or successful notification
header("Location: user.php?alert=successedit");
}


?>