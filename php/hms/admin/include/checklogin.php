<?php
//session_start();
function check_login()
{
if(strlen($_SESSION['login'])==0)
	{	
		//echo "<script>alert('dgdfgd');</script>";
		echo "FDgfdgdfg";
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="./index.php";		
		$_SESSION["login"]="";
		header("Location: http://172.24.0.1:8000$uri/$extra");
	}
}
?>