<?php

function addDoctors(){

//connect to database
$db = mysqli_connect('localhost', 'root','','health_appointment');

//check connection of the database 
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add'])) {
    // receive all input values from the form
    $docid = mysqli_real_escape_string($db, $_POST['docid']);
    $pw = mysqli_real_escape_string($db, $_POST['pw']);
    $fname= mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']); 
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $email = mysqli_real_escape_string($db, $_POST['email']); 
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $department = mysqli_real_escape_string($db, $_POST['department']);


    // first check the database to make sure 
    // a user does not already exist with the same docid and/or email
    $user_check_query = "SELECT * FROM doctors WHERE docID='$docid' OR docEmail='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['docID'] === $docid) {
        echo"<script>alert('Doctor ID Existed')</script>";
      }
  
      if ($user['docEmail'] === $email) {
        echo"<script>alert('Email Existed')</script>";
      }
    }
    // Finally, register user if there are no errors in the form
    else {
        $query = "INSERT INTO doctors (docFname,docLname,docID,docEmail,docPhone,docDepartment,docGender,docPw) 
                  VALUES('$fname','$lname','$docid', '$email','$phone','$department','$gender', '$pw')";
        mysqli_query($db, $query);
        echo"<script>alert('New doctor added')</script>";
    }
  }
}

function delDoc(){
  if(isset($_POST['delBtn'])){

    $id =$_POST['delete_id'];
    $db = mysqli_connect('localhost', 'root','','health_appointment');
    $del_query = "DELETE FROM doctors WHERE docID='$id' ";
    $result = mysqli_query($db, $del_query);

    if($result){
      echo"<script>alert('Deleted')</script>";
      
    }
    else{
      echo"<script>alert('Delete Unsuccesfully')</script>";
      
    }
  }
}

?>


