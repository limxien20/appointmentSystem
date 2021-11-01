<?php include("scheFunc.php") ?>
<?php
include_once("session.php");
?>

<?php
    $conn = new mysqli ('localhost', 'root','','health_appointment');
    $currentDoc = $_SESSION['doctor'];
    $query = "SELECT * FROM doctors WHERE docID ='$currentDoc'";
    $result = mysqli_query($conn,$query);

    addSched();
    
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
                                <h2 class="pageheader-title">Add Schedule</h2>
								<div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add Schedule</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
					<body>
				
						<div class="row">
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Add Schedule</h5>
                                <div class="card-body">
                                    <form id="form" action="" method="POST">
                                        <?php
                                            if($result){
                                                if(mysqli_num_rows($result) > 0){
                                                    while($row = mysqli_fetch_array($result)){
                                                    ?>
                                                        <div class="form-group row">
                                                            <label for="inputDocId" class="col-3 col-lg-2 col-form-label text-right">Doctor ID. : </label>
                                                            <div class="col-5 ">
                                                                <input id="docid" type="text" name="docid" value="<?php echo $row['docID'];?>" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="department" class="col-3 col-lg-2 col-form-label text-right">Department: </label>
                                                            <div class="col-5 ">
                                                                <input id="docDept" type="text" name="docDept" placeholder="Department" value="<?php echo $row['docDepartment'];?>"class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                }
                                            }
                                        ?>
                                        
                                        <div class="form-group row">
                                            <label for="datetime" class="col-3 col-lg-2 col-form-label text-right">Date: </label>
                                            <div class="col-5">
                                            <!--<input id="schedDatetime" type="datetime-local" name="schedDatetime" min="<?=  date('Y-m-d');?>T<?=  date('H-i-s');?>" value=""class="form-control" required>-->
                                            <input id="schedDatetime" type="datetime-local" name="schedDatetime" min="<?=  date('Y-m-d');?>T08:00" value=""class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="department" class="col-3 col-lg-2 col-form-label text-right">Availability: </label>
                                            <div class="col-5">
                                                <select name= "availability" class="form-control" required>
                                                    <option value="" disabled="" selected="">Availability</option>
                                                    <option value="available">Available</option>
                                                    <option value="not available">Not Available</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button id="addBtn" name = "add_sched" class="btn btn-space btn-primary" style="border-radius: 5px;">Add Schedule</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                    </div>
				</body>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <?php include("includes/footer.php") ?>