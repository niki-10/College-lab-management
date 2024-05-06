<?php
session_start();
include "config.php";
$id3 = $_REQUEST['id'];
$sql1 ="delete from computer_info where id=".$id3."";
mysqli_query($con,$sql1);
header('Location:viewcomputer.php?msg=2');
 ?>
