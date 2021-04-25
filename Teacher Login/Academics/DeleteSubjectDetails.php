<?php

session_start();
include '../../config.php';

$id = $_GET['id2'];
$deletequery = "DELETE FROM subject_details WHERE `Subject Code` = '$id'";
$query = mysqli_query($conn, $deletequery);
if($query){
    $_SESSION["DeletedSubDetails"] = true;
    header("location: SubjectDetails.php");
}
?>