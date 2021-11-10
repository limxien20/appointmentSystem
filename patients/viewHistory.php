<?php
include_once("psession.php");
?>

<?php
    $conn = new mysqli ('localhost', 'root','','health_appointment');
    $currentUser = $_SESSION['patient'];
    $query = "SELECT patient_fname FROM patients WHERE icno ='$currentUser' ";
    $result = mysqli_query($conn,$query);
    

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Doctor Schedule</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="bi bi-phone"></i> +1 5589 55488 55
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
      <?php
         if($result){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
      ?>
        <a href="profile.php" ><?php echo $row['patient_fname'];?></a>
        <?php
                }
              }
             }
           ?>
        <a href="patientlogout.php" >, Logout</a>
        
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="main.php">EchoHealth</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="main.php">Doctor Schedule</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

      

    </div>
  </header>
  <!-- End Header -->

  <main id="main">

    <section class="inner-page">
    <!-- ======= Appointment Section ======= -->
    <section id="viewHistory" class="appointment section-bg">
      <div class="container">
        <div class="section-title">
          <br>
          <h2>History</h2>
          <p>View History Here</p>
        </div>
        <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
								<div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Patient's record</h5>
                                <div class="card-body">
                                <?php
                                        if(isset($_POST['viewHisBtn'])){
                                            
                                            $db = mysqli_connect('localhost', 'root','','health_appointment');
                                            $id = $_POST['appointID'];

                                            $query = "SELECT appointment.appointment_id, appointment.docID, doctors.docFname, doctors.docLname , appointment.remarks, doccomment.comment FROM appointment 
                                                        INNER JOIN doctors ON appointment.docID = doctors.docID 
                                                        INNER JOIN doccomment ON appointment.appointment_id = doccomment.appointmentID WHERE appointment.appointment_id = '$id'";
                                            $result = mysqli_query($db, $query);

                                            if($result){
                                                if(mysqli_num_rows($result) > 0){
                                                  while($row = mysqli_fetch_array($result)){
                                                ?>
                                    <form id="form" action="" method="POST">
                                    
                                        <div class="form-group row">
                                            <label for="inputDocId" class="col-3 col-lg-2 col-form-label text-right">Appointment ID. : </label>
                                                <div class="col-5 ">
                                                    <input id="docid" type="text" name="appointmentid" value="<?php echo $row['appointment_id'];?>" class="form-control" style="border: none; background-color: transparent; " disabled>
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputDocId" class="col-3 col-lg-2 col-form-label text-right">Doctor ID. : </label>
                                                <div class="col-5 ">
                                                    <input id="docid" type="text" name="appointmentid" value="<?php echo $row['docID'];?>" class="form-control" style="border: none; background-color: transparent; " disabled>
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputDocId" class="col-3 col-lg-2 col-form-label text-right">Doctor name. : </label>
                                                <div class="col-5 ">
                                                    <input id="docid" type="text" name="appointmentid" value="<?php echo "Dr. " .$row['docFname'] . " ". $row['docLname'] ;?>" class="form-control" style="border: none; background-color: transparent; " disabled>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputDocId" class="col-3 col-lg-2 col-form-label text-right">Patient's Remarks. : </label>
                                                <div class="col-5 ">
                                                    <textarea class="form-control" style="border: none; background-color: transparent; " disabled><?php echo $row['remarks'];?></textarea>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputDocId" class="col-3 col-lg-2 col-form-label text-right">Doctor's Comment : </label>
                                                <div class="col-5 ">
                                                    <textarea class="form-control" style="border: none; background-color: transparent; " disabled><?php echo $row['comment'];?></textarea>
                                                </div>
                                        </div>

                                                                     
                                        <?php
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                                     
                                        
                                        </div>
                                    </form>

                                    <div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                <form action="history.php">
                                                    <input type="submit" class="btn btn-space btn-primary" value="Back" style="border-radius: 5px;">
                                                </form>
                                                </p>
                                            </div>
                                </div>
                            </div>
                        </div>

                        
        

      </div>
    </section><!-- End Appointment Section -->
    </section>
    

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top"></div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>EchoHealth</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>