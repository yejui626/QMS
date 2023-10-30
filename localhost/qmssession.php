<?php

if(!session_id())
{
	session_start();
}

if(isset($_SESSION['u_username']) != session_id())
{
	header('Location: ../signin/signin.php');
}

?>