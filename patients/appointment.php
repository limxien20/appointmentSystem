<?php
include_once("psession.php");
?>
<?php include("patientFunc.php")?>
<?php appointment()?>


<?php
    $conn = new mysqli ('localhost', 'root','','health_appointment');
    $currentUser = $_SESSION['patient'];
    $query = "SELECT * FROM patients WHERE icno ='$currentUser'";
    $result = mysqli_query($conn,$query);

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Make An Appointment Now</title>
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
        <a href="profile.php" ><?php echo $row['patient_fname'];?>
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

      <h1 class="logo me-auto"><a href="index.php">EchoHealth</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="main.php">Doctor Schedule</a></li>
          <li><a class="nav-link scrollto " href="history.php">History</a></li>
        
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
    <section id="appointment" class="appointment section-bg">
      <div class="container">
        <div class="section-title">
          <br>
          <h2>Make an Appointment</h2>
        </div>
        <?php
            if(isset($_POST['bookBtn'])){
                                            
              $db = mysqli_connect('localhost', 'root','','health_appointment');
              $id = $_POST['schedid'];

              //$query ="SELECT * FROM doc_sched WHERE sched_id = '$id'";
              $query = "SELECT doc_sched.sched_id, doc_sched.doc_id, doctors.docFname, doc_sched.doc_dept, doc_sched.sched_datetime, doc_sched.sched_status 
                        FROM doc_sched INNER JOIN doctors ON doc_sched.doc_id = doctors.docID WHERE sched_id = '$id' ";
              $result = mysqli_query($db, $query);

              if($result){
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
              ?>

        <form action="" method="post" class="form" >
        
        <div class="form-group row">
          <label for="" class="col-3 col-lg-2 col-form-label text-right">ICNO. : </label>
              <div class="col-md-4 form-group">
                <input type="text" name="patienticno" class="form-control" id="icno" value="<?php echo $_SESSION['patient']; ?>" readonly>
              </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="" class="col-3 col-lg-2 col-form-label text-right">Schedule ID. : </label>
          <div class="col-md-4 form-group">
            <input type="text" name="schedid" class="form-control" id="schedid" value="<?php echo $row['sched_id']?>" readonly>
          </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="" class="col-3 col-lg-2 col-form-label text-right">Doctor ID. : </label>
          <div class="col-md-4 form-group">
            <input type="text" name="docid" class="form-control" id="docid" value="<?php echo $row['doc_id']?>" readonly>
          </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="" class="col-3 col-lg-2 col-form-label text-right">Doctor Name. : </label>
          <div class="col-md-4 form-group">
            <input type="text" name="" class="form-control" id="" value="Dr. <?php echo $row['docFname']?>" readonly>
          </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="" class="col-3 col-lg-2 col-form-label text-right">Department. : </label>
          <div class="col-md-4 form-group">
            <input type="text" name="" class="form-control" id="" value="<?php echo $row['doc_dept']?>" readonly>
          </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="" class="col-3 col-lg-2 col-form-label text-right">Appointment Time : </label>
          <div class="col-md-4 form-group">
            <input type="text" name="" class="form-control" id="" value="<?php echo $row['sched_datetime']?>" readonly>
          </div>
        </div>
        <br>
      

            <?php
                                                    }
                                                }
                                            }
                                        }
            ?>
        <div class="form-group row">
        <label for="" class="col-3 col-lg-2 col-form-label text-right">Medical concern/remarks : </label>
          <div class="col-md-4 form-group">
            <textarea id="remarks" name="remarks" rows="4" cols="50" required></textarea>
          </div>
        </div>
            
           
          <div class="text-center">
            <br>
            <button type="submit" name="appointment" class="btn btn-space btn-primary" style="border-radius: 20px;">Make an appointment</button>
          </div>
        </form>

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