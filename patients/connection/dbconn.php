<?php

//connect to database
$db = mysqli_connect('localhost', 'root','','health_appointment');

if(!$db){
    die("Connection failed: " . mysqli_connect_error());
}
?>