<?php
include('../congig/connection.php');

function getAll($table){
    global $con;
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($con, $query);
}
function redirect($url, $message){
    $_SESSION['message']=$message;
    header('Location:',$url);
    exit();
}
?>