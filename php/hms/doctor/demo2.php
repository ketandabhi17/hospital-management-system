<?php
session_start();
// error_reporting(0);
include('include/config.php');
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
$date=$_POST['date'];
$timestamp = strtotime($date); 
$new_date = date('y-m-d', $timestamp);

// $date = date_format(date_create_from_format('Y-m-d', $date), 'd-m-Y');
// echo $date;
$day=$_POST['scheduleday'];
// echo $day;


$start=$_POST['starttime'];
// SELECT TIME_FORMAT("$start", "%r"); 
// $start1=date('H:i',strtotime($start));
// // $start=date_format($start, 'g:i A');
// $time = date("h:i:sa", strtotime("$start"));
// $d=mktime($start);
// $start=date("h:i:s");


// echo $start;
$end=$_POST['endtime'];
// $end1=date ('H:i',strtotime($end));
// $end=time_format($end, 'g:i A');
// $d=mktime($end);
// $end=date("h:i:s");
// echo $end;
$availablity=$_POST['bookavail'];
// echo $availablity;
clearResult($con);
$sql=$con->query("call add_docslot('$new_date','$day','$start','$end','$availablity')");
clearResult($con);
if($sql)
{
echo "<script>alert('Slot Details added Successfully');</script>";

}
else{
    echo "<script>alert(' Slot Details not added !!!!!!!!!!!!!!!!');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Time slots</title>
		
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


	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				<?php include('include/header.php');?>
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor | Time slots</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Doctor</span>
									</li>
									<li class="active">
										<span>Time slots</span>
									</li>
								</ol>
							</div>
						</section>
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Time slots</h5>
												</div>  
                        <div class="panel-body">
                            <div class="bootstrap-iso">
                             <div class="container-fluid">
                              <div class="row">
                               <div class="col-md-12 col-sm-12 col-xs-12">
                                <form class="form-horizontal"  method="post">
                                 <div class="form-group form-group-lg">
                                  <label class="control-label col-sm-2 requiredField" for="date">
                                   Date
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>
                                  <div class="col-sm-10">
                                   <div class="input-group">
                                    <div class="input-group-addon">
                                     <i class="fa fa-calendar">
                                     </i>
                                    </div>
                                    <input class="form-control" id="date" name="date" type="date" required/>
                                   </div>
                                  </div>
                                 </div>
                                 <div class="form-group form-group-lg">
                                  <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                   Day
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>
                                  <div class="col-sm-10">
                                   <select class="select form-control" id="scheduleday" name="scheduleday" required>
                                    <option value="Monday">
                                     Monday
                                    </option>
                                    <option value="Tuesday">
                                     Tuesday
                                    </option>
                                    <option value="Wednesday">
                                     Wednesday
                                    </option>
                                    <option value="Thursday">
                                     Thursday
                                    </option>
                                    <option value="Friday">
                                     Friday
                                    </option>
                                    <option value="Saturday">
                                     Saturday
                                    </option>
                                    <option value="Sunday">
                                     Sunday
                                    </option>
                                   </select>
                                  </div>
                                 </div>
                                 <div class="form-group form-group-lg">
                                  <label class="control-label col-sm-2 requiredField" for="starttime">
                                   Start Time
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>

                                 
                                  eg : 10:00:00 PM
                                  <div class="col-sm-10">
                                   <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                    <div class="input-group-addon">
                                     <i class="fa fa-clock-o">
                                     </i>
                                    </div>
                                    <input class="form-control" id="starttime" name="starttime" type="time" required/>
                                   </div>
                                  </div>
                                 </div>

                                 <div class="form-group form-group-lg">
                                  <label class="control-label col-sm-2 requiredField" for="endtime">
                                   End Time
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>eg : 10:00:00 PM
                                  <div class="col-sm-10">
                                   <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                    <div class="input-group-addon">
                                     <i class="fa fa-clock-o">
                                     </i>
                                    </div>
                                    <input class="form-control" id="endtime" name="endtime" type="time" required/>
                                   </div>
                                  </div>
                                 </div>
         
                                 <div class="form-group form-group-lg">
                                  <label class="control-label col-sm-2 requiredField" for="bookavail">
                                   Availabilty
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>
                                  <div class="col-sm-10">
                                   <select class="select form-control" id="bookavail" value="bookavail" name="bookavail" required>
                                    <option value="available"> available</option>
                                    <option value="notavail"> notavail</option>
                                   </select>
                                  </div>
                                 </div>
         
                                 <div class="form-group">
                                  <div class="col-sm-10 col-sm-offset-2">
                                   <button class="btn btn-primary " name="submit" type="submit">
                                    Submit
                                   </button>
                                  </div>
                                 </div>
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
										</div>
									
								</div>
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
    <script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>
	</body>
</html>
