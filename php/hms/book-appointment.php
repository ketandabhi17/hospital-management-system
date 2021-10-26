<?php
session_start();
// $_SESSION['spec_id']="";
//error_reporting(0);
include('config.php');
include('include/checklogin.php');
check_login();
function clearResult($conn){
	while($conn -> next_result()){
			if($result = $conn -> store_result()){
				$result -> free();
			}
		}
	}
if(isset($_POST['submit']))
{
	
$specilization=$_POST['Doctorspecialization'];
// echo $specilization;
$doctorid=$_POST['doc_id'];
// $doctorid=$_POST['doctor'];
// echo $doctorid;
$userid=$_SESSION['id'];
echo $userid;
$fees=$_POST['fees'];
// echo $fees;
$appdate=$_POST['appdate'];
// echo $appdate;
$time=$_POST['apptime'];
// echo $time;
$userstatus=1;
// echo $userstatus;
$docstatus=1;
// echo $docstatus;
// $b=$_GET["doc_id"];
// echo $b;
// $a=$con->query("select doc_id from doctors where doc_id = $b");
// $c=$a->fetch_array();
// $_SESSION['doc_id']=$c;
// echo $c;
// clearResult($con);
$sql=$con->query("call `add_appointment`('$specilization',$doctorid,$userid,1000,'$appdate','$time',$userstatus,$docstatus)");
// $sql=$con->query("INSERT INTO appointment ( doctorSpecialization, doctorId, userId, consultancyFees, appointmentDate, appointmentTime, userStatus, doctorStatus)
//  VALUES ('$specilization',$doctorid,$userid,220,'$appdate','$time',$userstatus,$docstatus)");
//clearResult($con);

	if($sql)
	{
		echo "<script>alert('Your appointment successfully booked');</script>";
	}
	else{
		echo "<script>alert('appointment wasn't booked');</script>";
	}
}
else{
	echo "<script>alert('appointment wasn't booked');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User  | Book Appointment</title>
	
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<script>
function changedocor(selectcontrol) {
	var val = selectcontrol.value;
	// alert(val);
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doc_id").html(data);
	}
	});
}
</script>	


 <script>
function getfee(optionval) {
	var val1 = optionval.value;
	// alert(val1);
	$.ajax({
	type: "POST",
	url: "get_fees.php",
	data:'doc_id='+val1,
	success: function(data){
		// alert(data);
		$("#docFees").val(data);
	}
	});
}
</script>	




	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
			
						<?php include('include/header.php');?>
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">User | Book Appointment</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>User</span>
									</li>
									<li class="active">
										<span>Book Appointment</span>
									</li>
								</ol>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Book Appointment</h5>
												</div>
												<div class="panel-body">
														<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
														<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="book" method="post" >
														


														<div class="form-group">
														<label for="DoctorSpecialization">
																Doctor Specialization
															</label>
															<select name="Doctorspecialization" onchange="changedocor(this);" class="form-control"  required="required">
															<option>
																	Select Specialization
																</option>
																<?php $ret=$con->query("SELECT * from doctorspecilization");
																	clearResult($con);
																	while($row=$ret->fetch_array())
																	{
																	?>
																
																<option value="<?php echo $row['spec_id']; ?>">														
																	<?php
																	 echo htmlentities($row['specilization']);
																	//  echo htmlentities($row['spec_id']);
																	 ?>
																	 
																</option>
																
																<?php } ?>
																
															</select>
														</div>


														<div class="form-group">
															<label for="doc_id">
																Doctors
															</label>
															<select name="doc_id" class="form-control" id="doc_id" onchange="getfee(this);" required="required">
															<option>Select Doctor</option>
															<?php $ret=$con->query("SELECT * from doctors");
																	clearResult($con);
																	while($row=$ret->fetch_array())
																	{
																		?>
																
																<option value="<?php echo $row['doc_id']; ?>">														
																	<?php
																	 echo $row['doctorName'];
																	 //  echo htmlentities($row['spec_id']);
																	 ?>
																	 
																	</option>
																	
																	<?php } ?>
																</select>
														</div>





														<div class="form-group">
															
															<label for="consultancyfees">
																Consultancy Fees
															</label>
														<input type="text" id="docFees"  class="form-control" readonly>
														</div>
														
														<div class="form-group">
															<label for="AppointmentDate">
																Date
															</label>
															<input class="form-control " id="datepicker" name="appdate"  required="required" type="date">
	
															</div>
														</div>
														
														<div class="form-group">
															<label for="Appointmenttime">Time</label>
															<input class="form-control" name="apptime"  type="time" required="required">eg : 10:00 PM
														</div>
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									
									</div>
								</div>
							
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});

			
        </script>
		
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>
