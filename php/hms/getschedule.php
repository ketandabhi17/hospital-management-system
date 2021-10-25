 <?php
// session_start();
include 'include/config.php';
// $res = $con->query("SELECT * FROM docslot WHERE date='$q'");
// // if (!$res) {
// die("Error running $sql: " . mysqli_error());
// }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    </head>
    <body>
        <?php
        if ($res->num_rows==0) {
        echo "<div class='alert alert-danger' role='alert'>Doctor is not available at the moment. Please try again later.</div>";
        
        } else {
        echo "   <table class='table table-hover'>";
            echo " <thead>";
                echo " <tr>";
                    echo " <th>App Id</th>";
                    echo " <th>Day</th>";
                    echo " <th>Date</th>";
                    echo "  <th>Start Time</th>";
                    echo "  <th>End Time</th>";
                    echo " <th>Availability</th>";
                    echo "  <th>Book Now!</th>";
                echo " </tr>";
            echo "  </thead>";
            echo "  <tbody>";
                while($row = mysqli_fetch_array($res)) {
                ?>
                <tr>
                    <?php
                    // $avail=null;
                    // $btnclick="";
                    if ($row['bookAvail']!='available') {
                    $avail="danger";
                    $btnstate="disabled";
                    $btnclick="danger";
                    } else {
                    $avail="primary";
                    $btnstate="";
                    $btnclick="primary";
                    }

                   
                    // if ($rowapp['bookAvail']!="available") {
                    // $btnstate="disabled";
                    // } else {
                    // $btnstate="";
                    // }
                    echo "<td>" . $row['slot_id'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['day'] . "</td>";
                    echo "<td>" . $row['starttime'] . "</td>";
                    echo "<td>" . $row['endtime'] . "</td>";
                    echo "<td> <span class='label label-".$avail."'>". $row['availability'] ."</span></td>";
                    // echo "<td><a href='appointment.php?&appid=" . $row['scheduleId'] . "&scheduleDate=".$q."' class='btn btn-".$btnclick." btn-xs' role='button' ".$btnstate.">Book Now</a></td>";
                    // echo "<td><a href='appointment.php?&appid=" . $row['scheduleId'] . "&scheduleDate=".$q."'>Book</a></td>";
                    // <td><button type='button' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#exampleModal'>Book Now</button></td>";
                    //triggered when modal is about to be shown
                    ?>
                    
                    </script>
                    <!-- ?> -->
                </tr>
                
                <?php
                }
            }
                ?>
            </tbody>
            <!-- modal start -->
            
            
            
            
            
        </body>
    </html>