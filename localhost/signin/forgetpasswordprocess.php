<?php
session_start();
include ('../dbconnect.php');
//Retrieve data from form
$email = $_POST['email'];

$sql = "SELECT * FROM tb_user WHERE u_email='$email' AND u_statusID ='6'";
$result= mysqli_query($con, $sql);  //Execute SQL statement

if (mysqli_num_rows($result) == 1){

	$row = mysqli_fetch_array($result); //Retrieve result 
	$fetchname=$row['u_username'];
	$emailId=$row['u_email'];
	$password=$row['u_pwd'];
	
	
	$token = md5($emailId).rand(10,9999);
	 
    $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
 
    $expDate = date("Y-m-d H:i:s",$expFormat);
    
    $sql1 = "INSERT INTO password_reset_temp(email,password,exp_date,reset_link_token) VALUES ('$emailId','$password','$expDate','$token')";
    $result= mysqli_query($con, $sql1); 
    $link = "<a href='localhost/qms1/reset-password.php?key=".$emailId."&token=".$token."'>www.metautm.tech/reset-password.php?key=".$emailId."&token=".$token."</a>";

    $slink = "<a href='localhost/qms1/reset-password.php?key=".$emailId."&token=".$token."'> Reset Password Link </a>";    
    $img = '<div style="justify-content"><img src="www.metautm.tech/signin/logo-text1.png" alt="POWEREC logo" style="width:auto; height:70px;"/></div><br><br>';
  
	    
	    
	$to = $emailId;
    $subject = "Reset Your POWEREC Password";
    
    $txt = $img.'Hello '.$fetchname.',<br><br>Click on this link to reset password: '.$slink.'<br><br>
    If the link above does not work, please copy the link below into your browser and proceed to reset your password
    <br><br>'.$link.'<br><br><br>Cheers,<br>POWEREC team.';
    
    $headers = "From: enquiry@metautm.tech" . "\r\n" ;
    //"CC:mingqi01@gmail.com";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    mail($to,$subject,$txt,$headers);
	
	header ('Location: forgetpassword.php?email='.$emailId);
}
else{
	header ('Location: forgetpassword.php?emailnotexist');
}
?>