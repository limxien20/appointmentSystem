<?php
include_once("session.php");

function addSched(){
    //connect to database
    $db = mysqli_connect('localhost', 'root','','health_appointment');

    //check connection of the database 
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    

    if (isset($_POST['add_sched'])) {
        // receive all input values from the form
        $docid = mysqli_real_escape_string($db, $_POST['docid']);
        $dept = mysqli_real_escape_string($db, $_POST['docDept']);
        $datetime = mysqli_real_escape_string($db, $_POST['schedDatetime']);
        $availability = mysqli_real_escape_string($db, $_POST['availability']);
            
        // form validation: ensure that the form is correctly filled ...
        if (empty($datetime)) { echo"<script>alert('Date & Time Not enter')</script>"; }
        if (empty($availability)) { echo"<script>alert('Availability Not enter')</script>"; }
            
        $query = "INSERT INTO doc_sched (doc_id,doc_dept,sched_datetime,sched_status) 
                    VALUES('$docid','$dept','$datetime', '$availability')";
        mysqli_query($db, $query);
        echo"<script>alert('Schedule added')</script>";
            
    }
}

function schedDel(){
    if(isset($_POST['move'])){

        $id =$_POST['move_id'];
        $db = mysqli_connect('localhost', 'root','','health_appointment');
        $move_query = "DELETE FROM doc_sched WHERE sched_id='$id' ";
        $result = mysqli_query($db, $move_query);
    
        if($result){
          echo"<script>alert('Deleted')</script>";
          
        }
        else{
          echo"<script>alert('Delete Unsuccesfully')</script>";
          
        }
      }
}

?>


