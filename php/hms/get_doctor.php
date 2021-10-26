<?php

include("config.php");

$specid=$_POST["specilizationid"];
echo $specid;

$ret=$con->query("SELECT doctors.doctorName,doctorspecilization.specilization, doctors.doc_id
			        from doctors INNER JOIN doctorspecilization ON doctors.specilization=doctorspecilization.spec_id
					and doctorspecilization.spec_id=$specid");
while($row=$ret->fetch_array())
{
    ?>
<option value="<?php echo htmlentities($row['doc_id']);?>">
	<?php echo htmlentities($row['doctorName']);?>
	<?php echo htmlentities($row['doc_id']);?>
</option>
<?php }
$_SESSION['doc_id']=$row['doc_id'];
?>

