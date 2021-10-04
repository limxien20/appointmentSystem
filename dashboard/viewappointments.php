<?php
include_once("session.php");
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
                <a class="navbar-brand" href="index.php" style="color:dodgerblue">Appointment System</a>
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
                                <h2 class="pageheader-title">View All Appointments</h2>
								<div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">View All Appointments</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
					<body>
					<div class="ecommerce-widget">

						<div class="row">
							<!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
								<h5 class="card-header">Assign Task</h5>
									<div class="card-body">
                                    <form id="form">
										<div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Staff</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="staff" type="text" name="staff" required="required" placeholder="Staff ID" class="form-control">
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Order</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="order" type="text" name="order" required="required" placeholder="Order ID" class="form-control">
                                            </div>
                                        </div>
										<div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button id="submit" class="btn btn-space btn-primary">Submit</button>
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

						<div class="row">
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Order List
										<button class="btn btn-outline-light float-right" onclick="getOrders()">Refresh</button>
									</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0 text-right">Id</th>
                                                        <th class="border-0">Customer</th>
														<th class="border-0">Service</th>
                                                        <th class="border-0">Date Added</th>
														<th class="border-0">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="orderlist">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Staff List
										<button class="btn btn-outline-light float-right" onclick="getFreeStaffs()">Refresh</button>
									</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0 text-right">id</th>
                                                        <th class="border-0">Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="freestafflist">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                        </div>
					</div>
					</body>
				</div>
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <?php include("includes/footer.php") ?>
