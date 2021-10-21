<?php
// error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
// check_login();
session_start();

if(isset($_POST['submit']))
{
		$docspecialization=$_POST['doctorspecialization'];
		$docname=$_POST['doctorName'];
		$docaddress=$_POST['address'];
		$docfees=$_POST['docFees'];
		$doccontactno=$_POST['contactno'];
		$docemail=$_POST['docEmail'];
		$password=md5($_POST['password']);
		$doccreation=$_POST['creationDate'];
		$docupdation=$_POST['updationDate'];
		$sql=$con->query(" CALL `add_doctor`($docspecialization,'$docname','$docaddress',$docfees,$doccontactno,'$docemail','$password',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
	if($sql)
	{
		echo "<script>alert('Doctor info added Successfully');</script>";
		echo "<script>window.location.href ='manage-doctors.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Add Doctor</title>
		
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
<script type="text/javascript">
function valid()
{
 if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.adddoc.cfpass.focus();
return false;
}
return true;
}
</script>


<!-- <script>
function checkemailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#docemail").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script> -->
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');
?>
			<div class="app-content">
				
				<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<!-- <div class="wrap-content container" id="container"> -->
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Add Doctor</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Add Doctor</span>
									</li>
								</ol>
							</div>
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
													<h5 class="panel-title">Add Doctor</h5>
												</div>
												<div class="panel-body">
									
													<form role="form"  name="adddoc" method="post">
														<div class="form-group">
															<label for="doctorspecialization">
																Doctor Specialization
															</label>
																<select name="doctorspecialization" class="form-control" required="true">
																<option value="">Select Specialization</option>
																		<?php $ret=$con->query("select * from doctorspecilization");
																		while($row=$ret->fetch_array())
																		{	
																		?>
																<option value="<?php echo htmlentities($row['spec_id']);?>">
																	<?php echo htmlentities($row['specilization']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>

														<div class="form-group">
															<label for="doctorName">
																 Doctor Name
															</label>
															<input type="text" name="doctorName" class="form-control"  placeholder="Enter Doctor Name" required="true">
														</div>


														<div class="form-group">
															<label for="address">
																 Doctor Clinic Address
															</label>
																<textarea name="address" class="form-control"  placeholder="Enter Doctor Clinic Address" required="true"></textarea>
														</div>
														
														<div class="form-group">
															<label for="docFees">
																 Doctor Consultancy Fees
															</label>
															<input type="text" name="docFees" class="form-control"  placeholder="Enter Doctor Consultancy Fees" required="true">
														</div>
	
														<div class="form-group">
															<label for="contactno">
																 Doctor Contact no
															</label>
															<input type="text" name="contactno" class="form-control"  placeholder="Enter Doctor Contact no" required="true">
														</div>

														<div class="form-group">
															<label for="docEmail">
																 Doctor Email
															</label>
															<input type="email" id="docemail" name="docEmail" class="form-control"  placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
															<span id="email-availability-status"></span>
														</div>



														
														<div class="form-group">
															<label for="password">
																 Password
															</label>
															<input type="password" name="password" class="form-control"  placeholder="New Password" required="required">
														</div>
														
														<div class="form-group">
															<label for="exampleInputPassword2">
																Confirm Password
															</label>
															<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required="required">
														</div>
														
														
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
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
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					<!-- </div> -->
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
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
	





</body>
</html>