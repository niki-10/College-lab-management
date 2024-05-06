<?php
session_start();
include "config.php";
$id4 = $_REQUEST['id'];
$comment='<p style="color:green" >Problem Resolved</p>';
$sql1 ="update computer_info set comment='".$comment."' where id=".$id4."";
mysqli_query($con,$sql1);
header('Location:avail_computer.php?msg1=2');
 ?>
