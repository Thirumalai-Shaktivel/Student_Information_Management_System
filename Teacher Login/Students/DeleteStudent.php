<?php

session_start();
include '../../config.php';

$id = $_GET['id2'];
$deletequery = "DELETE FROM `student_details` WHERE `Student ID` = '$id'";
$query = mysqli_query($conn, $deletequery);
if($query){
    $_SESSION["DeletedStudent"] = true;
    header("location: StudentsList.php");
}
?>