<?php
include('config.php');
$id=$_POST['doc_id'];

$sqls=$con->query("SELECT docFees from doctors where doc_id=$id");

while($row=$sqls->fetch_assoc())
//$docId = $row['docFees'];
echo $row["docFees"];
?>
 