<?php

session_start();
if(!isset($_SESSION['patient'])){
    header("Location: patientSignUp.php");
}
?>