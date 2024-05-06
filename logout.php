<?php
include "config.php";
session_start();
date_default_timezone_set('Asia/Kolkata');
$time1 = date("y-m-d H:i:s ");
$name = $_SESSION['uname'];
$status = $_SESSION['status'];
if($status == 'admin')
{
$sql_query1 = "update clms_login set logout_time='".$time1."' where username='".$name."'";
mysqli_query($con,$sql_query1);
unset($_SESSION['uname']);
unset($_SESSION['status']);
session_destroy();
header('Location:login.php');
}
if($status == 'student')
{
$sql_query1 = "update clms_student set logout_time='".$time1."' where username='".$name."'";
mysqli_query($con,$sql_query1);
unset($_SESSION['uname']);
unset($_SESSION['status']);
session_destroy();
header('Location:login.php');
}

 ?>
