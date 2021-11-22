<?php include("patientFunc.php") ?>

<?php
    $conn = new mysqli ('localhost', 'root','','health_appointment');
    $resultSet = $conn->query("SELECT genderId, gender FROM gender");
    $countryList = $conn->query("SELECT code, country FROM country");
    addPatient();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sign Up</title>
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
     
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">EchoHealth</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

  <main id="main">

    <section class="inner-page">
      <!-- ======= Login form Section ======= -->
        <section id="appointment" class="appointment section-bg">
        <div class="container">
            <div class="section-title">
            <br>
            <h2>Sign Up</h2>
            <p>To make an appointment with a doctor, please Login/ Sign Up to proceed for further action </p>
            </div>

            <form action="" method="POST" class="form">
              
            <div class="row">
                <div class="col-md-4 offset-md-4 form-group">
                  <input type="text" name="icno" class="form-control" id="icno" placeholder="ICNO." required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 offset-md-4 form-group">
                  <input type="password" class="form-control" name="pw" id="pw" placeholder="Password" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 offset-md-4 form-group">
                  <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 offset-md-4 form-group">
                  <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 offset-md-4 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 offset-md-4 form-group">
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone No." maxlength="10" size="10" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 offset-md-4 form-group">
                  <input type="date" class="form-control" name="dob" id="dob" placeholder="D.O.B" max= "<?= date('Y-m-d', strtotime('-17 year')); ?>" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 offset-md-4 form-group">
                  <select class="form-control" name="gender" id="gender" placeholder="Gender">
                    <option value="" disabled="" selected="">Gender</option>
                      <?php
                        while($row = $resultSet->fetch_assoc()){
                          $genderid = $row['genderId'];
                          $gender = $row['gender'];
                          echo "<option value='$genderid' required> $gender </option>";
                        }
                      ?>
                  </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 offset-md-4 form-group">
                  <select class="form-control" name="country" id="country" placeholder="Country">
                    <option value="" disabled="" selected="">Country</option>
                      <?php
                        while($row = $countryList->fetch_assoc()){
                          $code = $row['code'];
                          $country = $row['country'];
                          echo "<option value='$code' required> $country </option>";
                        }
                      ?>
                  </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 offset-md-4 form-group">
                <textarea class="form-control" id="address" name="address" rows="4" cols="47" placeholder="Address" required></textarea>
                </div>
            </div>
            <br>
            <div class="text-center">
              <button type="submit" name="register" class="btn btn-space btn-primary" style="border-radius: 20px;">Register</button>
            </div>
            </form>
            <br>
            <div class="text-center"><a href="patientLogin.php"> Account Existed? Click here to Login </a></div>
        </div>
        </section>
        <!-- Login form Section -->
    </section>
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Medilab</span></strong>. All Rights Reserved
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