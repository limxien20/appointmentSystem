<?php //include("includes\header.php")  ?>
<?php include("deptFunc.php") ?>
<?php delDept() ?>
<?php
include_once("session.php");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel - View Department</title>
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
                                <h2 class="pageheader-title">View All Department</h2>
								<div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">View All Doctors</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                    <?php

if(isset($_POST['search'])){
    $search = $_POST['searchval'];
    $query= "SELECT * FROM `department` WHERE CONCAT (`departmentID`,`departmentName`) LIKE '%".$search."%'";
    $search_result = searchTable($query);

}
else{
    $query= "SELECT * FROM department ORDER BY departmentName";
    $search_result = searchTable($query);
}

function searchTable($query){
    $conn = new mysqli ('localhost', 'root','','health_appointment');
    $result = mysqli_query($conn,$query);
    return $result;
}
?>
<!-- ============================================================== -->
<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="card">
        <form action="" method="post">
            <div class="card-body">
                <h3 class="font-16">Search</h3>
                <input class="form-control" type="text" name="searchval" placeholder="Search..">
            </div>
            <div class="card-body border-top">
                <button type="submit" class="btn btn-secondary btn-lg btn-block" name="search" >Search</button>
            </div>
        </form>
    </div>
</div>
<!-- ============================================================== -->
					
						<div class="row">
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Department List
                                    
                                    </h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table" id="docinfo">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Department ID</th>
                                                        <th class="border-0">Department Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="doclist">
                                                    <?php
                                                        if(mysqli_num_rows($search_result)>0){
                                                            while($row = mysqli_fetch_array($search_result)){
                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $row['departmentID']; ?></td>
                                                                    <td><?php echo $row['departmentName']; ?></td>
                                                                    <td>
                                                                        <form action="editdept.php" method="POST">
                                                                            <input type="hidden" name="edit_id" value="<?php echo $row['departmentID']; ?>">
                                                                            <button type="submit" name="editBtn"class="btn btn-warning" style="border-radius: 5px;">Edit</button>
                                                                        </form>
                                                                    </td>
                                                                    <td>
                                                                        <form action="" method="POST">
                                                                            <input type="hidden" name="delete_id" value="<?php echo $row['departmentID']; ?>">
                                                                            <button type="submit" name="delBtn"class="btn btn-danger" style="border-radius: 5px;">Delete</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>    
                                                    <?php

                                                            }
                                                        }
                                                        else{
                                                            echo "<td> No record found </td>";
                                                        }
                                                    ?>
                                                                                            
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- ============================================================== -->
                            <!-- ============================================================== 
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="font-16">Filter</h3>
										<input class="form-control" type="text" placeholder="Search..">
                                    </div>
                                    <div class="card-body border-top">
                                        <a href="#" class="btn btn-secondary btn-lg btn-block">Submit</a>
                                    </div>
                                </div>
                            </div> -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                        </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <?php include("includes/footer.php") ?>