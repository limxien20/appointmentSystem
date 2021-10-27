<?php

function comment(){

//connect to database
$db = mysqli_connect('localhost', 'root','','health_appointment');

//check connection of the database 
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['commentBtn'])) {
  // receive all input values from the form
  $appointID = mysqli_real_escape_string($db, $_POST['appointmentid']);
  $schedid = mysqli_real_escape_string($db, $_POST['schedid']);
  $docid = mysqli_real_escape_string($db, $_POST['docid']);
  $patientid = mysqli_real_escape_string($db, $_POST['patientid']);
  $docCom = mysqli_real_escape_string($db, $_POST['comment']);
  
  $query = "INSERT INTO doccomment (appointmentID,schedID,patientID,docID,comment) 
              VALUES('$appointID','$schedid','$patientid', '$docid', '$docCom')";
  $done = "UPDATE doc_sched SET sched_status='Done' WHERE sched_id = '$schedid'";
  mysqli_query($db, $query);
  mysqli_query($db, $done);
  echo"<script>alert('Done Consultation')</script>";
      
}
}
?>