<?php
session_start();
include_once('config.php');

if(isset($_POST['submit']))
{
    
	$fname=$_POST['fullname'];
    //echo $fname;
	$address=$_POST['address'];
	$city=$_POST['city'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$query=$con->query("call insert_users('$fname','$address','$city','$gender','$email','$password',@id)");
	$select=$con->query("select @id");
	$id="";
    while($row=$select->fetch_assoc())
    {
    	$id = $row["@id"];
    
    }
$_SESSION["userid"]=$id;
$url="dashboard.php";
if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

?>