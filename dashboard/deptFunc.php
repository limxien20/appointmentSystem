<?php

function addDept(){
    $db = mysqli_connect('localhost', 'root','','health_appointment');

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['add'])) {
        // receive all input values from the form
        $deptid = mysqli_real_escape_string($db, $_POST['deptid']);
        $deptName = mysqli_real_escape_string($db, $_POST['deptName']);
        
    
        // first check the database to make sure 
        // a department does not already exist with the same docid and/or email
        $dept_check_query = "SELECT * FROM department WHERE departmentID='$deptid' OR departmentName='$deptName' LIMIT 1";
        $result = mysqli_query($db, $dept_check_query);
        $dept = mysqli_fetch_assoc($result);
        
        if ($dept) { // if user exists
          if ($dept['departmentID'] === $deptid) {
            echo"<script>alert('Department ID Existed')</script>";
          }
      
          if ($dept['departmentName'] === $deptName) {
            echo"<script>alert('Department Name Existed')</script>";
          }
        }
        // Finally, register user if there are no errors in the form
        else {
            $query = "INSERT INTO department (departmentID,departmentName) 
                      VALUES('$deptid','$deptName')";
            mysqli_query($db, $query);
            echo"<script>alert('New department added')</script>";
        }
      }
  
}

function editDept(){
    $db = mysqli_connect('localhost', 'root','','health_appointment');
    $id = $_POST['edit_deptid'];
    if(isset($_POST['edit'])){
        $deptName = mysqli_real_escape_string($db, $_POST['edit_deptName']);

        $edit_query = "UPDATE department SET departmentName = '$deptName' WHERE departmentID = '$id'";
        $run_editquery = mysqli_query($db, $edit_query);

        if($run_editquery){
            echo"<script>alert('Edited')</script>";
        }
        else{
            echo"<script>alert('Edit Unsuccesfully')</script>";
        
        }
    }
}

function delDept(){
  if(isset($_POST['delBtn'])){

    $id =$_POST['delete_id'];
    $db = mysqli_connect('localhost', 'root','','health_appointment');
    $del_query = "DELETE FROM department WHERE departmentID='$id' ";
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


