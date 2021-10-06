<?php //include("includes/header.php") ?>
<?php include("addDocFunc.php") ?>
<?php
include_once("session.php");
?>

<?php
    $conn = new mysqli ('localhost', 'root','','health_appointment');
    $resultSet = $conn->query("SELECT departmentName FROM department");
    $genderSet = $conn->query("SELECT genderId, gender FROM gender");
    addDoctors();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel - Add New Doctor</title>
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
                                    <?php echo $_SESSION['user'];?>
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
                                <h2 class="pageheader-title">Add New Doctor</h2>
								<div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add New Doctor</li>
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
                                <h5 class="card-header">Add New Doctor</h5>
                                <div class="card-body">
                                    <form id="form" action="" method="POST">
                                    <div class="form-group row">
                                            <label for="inputDocId" class="col-3 col-lg-2 col-form-label text-right">Doctor ID. : </label>
                                            <div class="col-9 col-lg-10">
                                                <input id="docid" type="text" name="docid" required placeholder="Doctor ID." class="form-control">
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label for="inputPassword" class="col-3 col-lg-2 col-form-label text-right">Password: </label>
                                            <div class="col-9 col-lg-10">
                                                <input id="pw" type="password" name="pw" required placeholder="Password" class="form-control" minlength="6">
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label for="inputfName" class="col-3 col-lg-2 col-form-label text-right">First Name: </label>
                                            <div class="col-9 col-lg-10">
                                                <input id="fname" type="text" name="fname" required placeholder="First Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputlName" class="col-3 col-lg-2 col-form-label text-right">Last Name: </label>
                                            <div class="col-9 col-lg-10">
                                                <input id="lname" type="text" name="lname" required placeholder="Last Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputGender" class="col-3 col-lg-2 col-form-label text-right">Gender: </label>
                                            <div class="col-9 col-lg-10">
                                            <select name= "gender" class="form-control">
                                            <option value="" disabled="" selected="">Gender</option>
                                                <?php
                                                    while($row = $genderSet->fetch_assoc()){
                                                    $genderid = $row['genderId'];
                                                    $gender = $row['gender'];
                                                    echo "<option value='$genderid' > $gender </option>";
                                                    }
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-3 col-lg-2 col-form-label text-right">Email: </label>
                                            <div class="col-9 col-lg-10">
                                                <input id="address" type="email" name="email" required placeholder="Email" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPhone" class="col-3 col-lg-2 col-form-label text-right">Phone No.</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="phone" type="phone" name="phone" required placeholder="Phone" class="form-control" maxlength="10" size="10">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="department" class="col-3 col-lg-2 col-form-label text-right">Department: </label>
                                            <div class="col-9 col-lg-10">
                                                <select name= "department" class="form-control">
                                                <option value="" disabled="" selected="">Department</option>
                                                    <?php
                                                        while($row = $resultSet->fetch_assoc()){
                                                            $dept_name = $row['departmentName'];
                                                            echo "<option value='$dept_name'> $dept_name </option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button id="addBtn" name = "add" class="btn btn-space btn-primary" style="border-radius: 5px;">Add</button>
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