<?php
// session_start();
function check_login()
{
if(strlen($_SESSION['dlogin'])==0)
	{	
		//echo "<script>alert('dgdfgd');</script>";
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="./index.php";		
		$_SESSION["login"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>