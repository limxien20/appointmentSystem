<?php
include_once("session.php");
?>

<?php
    $curDoc = $_SESSION['doctor'];
    $conn = new mysqli ('localhost', 'root','','health_appointment');
    $dept_query = "SELECT sched_status, count(*) as number FROM doc_sched WHERE doc_id ='$curDoc' GROUP BY sched_status ";
    $result = mysqli_query($conn,$dept_query);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="./assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/libs/css/style.css">
    <link rel="stylesheet" href="./assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="./assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="./assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="./assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="./assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    

	<style>
		<?php include('includes/style.php');?>
	</style>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                            ['Status of the doctor', 'No. '],
                            <?php
                                while($row =mysqli_fetch_array($result)){
                                    echo "['".$row["sched_status"]."',".$row["number"]."],";
                                }
                            ?>
                            ]);
                            var options = {
                            title: 'No. of Doctors status',
                            is3D: true
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

                            chart.draw(data, options);
                        }
                </script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php" style="color:dodgerblue">Healthcare System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
								<div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name" id="id">
                                    <?php echo $_SESSION['doctor'];?>
                                    </h5>
                                </div>
                                <a href="logout.php" class="dropdown-item" ><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include("includes/sidebar.php") ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
					<div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Dashboard</h2>
								<div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->    
                    <div id="piechart_3d" style="width: 100%; height: 500px;"></div><br>
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
						<div class="row">
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Available Appointment</h5>
                                        <div class="metric-value d-inline-block">
                                        <?php
                                            $doc = $_SESSION['doctor'];
                                            $conn = new mysqli ('localhost', 'root','','health_appointment');
                                            $result = $conn->query("SELECT sched_id FROM doc_sched WHERE sched_status = 'available' AND doc_id = '$doc'");
                                            $row = mysqli_num_rows($result);
                                            echo '<h1 class="mb-1">' .$row. '</h1>';
                                            
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Upcoming Appointments</h5>
                                        <div class="metric-value d-inline-block">
                                            <!--<h1 class="mb-1">10</h1>-->
                                            <?php
                                                $doc = $_SESSION['doctor'];
                                                $conn = new mysqli ('localhost', 'root','','health_appointment');
                                                $result = $conn->query("SELECT sched_id FROM doc_sched WHERE sched_status = 'Booked' AND doc_id = '$doc'");
                                                $row = mysqli_num_rows($result);
                                                echo '<h1 class="mb-1">' .$row. '</h1>';
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Done Appointment</h5>
                                        <div class="metric-value d-inline-block">
                                        <?php
                                            $doc = $_SESSION['doctor'];
                                            $conn = new mysqli ('localhost', 'root','','health_appointment');
                                            $result = $conn->query("SELECT sched_id FROM doc_sched WHERE sched_status = 'Done' AND doc_id = '$doc'");
                                            $row = mysqli_num_rows($result);
                                            echo '<h1 class="mb-1">' .$row. '</h1>';
                                            
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Today's Appointment </h5>
                                        <div class="metric-value d-inline-block">
                                        <?php
                                            $doc = $_SESSION['doctor'];
                                            $conn = new mysqli ('localhost', 'root','','health_appointment');
                                            $result = $conn->query("SELECT sched_id FROM doc_sched WHERE sched_status = 'booked' AND DATE(sched_datetime) = CURDATE() AND doc_id = '$doc'");
                                            $row = mysqli_num_rows($result);
                                            echo '<h1 class="mb-1">' .$row. '</h1>';
                                            
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <?php include("includes/footer.php") ?>
