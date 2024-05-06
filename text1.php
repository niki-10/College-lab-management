<?php
session_start();
include 'config.php';
if(isset($_POST['submit31']))
{

$cname = mysqli_real_escape_string($con,$_POST['text1']);
$id2 = $_REQUEST['id'];

 if($cname!="")
 {
$sql="update computer_info set comment='".$cname."' where id=".$id2."";
mysqli_query($con,$sql);
header('Location:student_login.php?msg=1');
 }
}

 ?>
