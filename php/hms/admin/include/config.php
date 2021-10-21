<?php
$DB_SERVER="mysql8";
$DB_USER="root";
$DB_PASS="root";
$DB_NAME="HMS";
$con = new Mysqli($DB_SERVER,$DB_USER,$DB_PASS,$DB_NAME);
// Check connection
if ($con->connect_errno)
{
 echo "Failed to connect to MySQL: " . $con->connect_error;
}
// else{
//     $r = $con->query("SELECT * FROM `users` ");
//     echo ($r -> num_rows);
//     echo "connected";
// }
?>