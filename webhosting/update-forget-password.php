<?php
if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
{
include "dbconnect.php";
$emailId = $_POST['email'];
$token = $_POST['reset_link_token'];
$password= $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql= "UPDATE tb_user
            SET  u_pwd= '$hashed_password'
            WHERE u_email='$emailId'";


if (mysqli_query($con, $sql)) {
header("Location: reset-password.php?alert=successchange");
}else{
echo "<p>Something goes wrong. Please try again</p>";
}
}
?>