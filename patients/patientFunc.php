<?php

function addPatient(){

//connect to database
$db = mysqli_connect('localhost', 'root','','health_appointment');

//check connection of the database 
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['register'])) {
    // receive all input values from the form
    $icno = mysqli_real_escape_string($db, $_POST['icno']);
    $pw = mysqli_real_escape_string($db, $_POST['pw']);
    $fname= mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']); 
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    

    // first check the database to make sure 
    // a user does not already exist with the same icno and/or email
    $user_check_query = "SELECT * FROM patients WHERE icno='$icno' OR patient_email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['icno'] === $icno) {
        echo"<script>alert('ICNO. Existed')</script>";
      }
  
      if ($user['patient_email'] === $email) {
        echo"<script>alert('Email Existed')</script>";
      }
    }
    // Finally, register user if there are no errors in the form
    else {
        $query = "INSERT INTO patients(icno, patient_pw, patient_fname, patient_lname, patient_email, patient_phone, patient_dob, patient_gender, patient_add, nationality) 
                    VALUES ('$icno','$pw','$fname','$lname','$email','$phone','$dob','$gender','$address','$country')";
        mysqli_query($db, $query);
        echo"<script>alert('Registered')</script>";
    }
  }
}

?>