<?php
session_start();
include "config.php";
if(isset($_POST['submit0']))
{
$uname = mysqli_real_escape_string($con,$_POST['username0']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$select = mysqli_real_escape_string($con,$_POST['select']);
date_default_timezone_set('Asia/Kolkata');
$time1 = date("y-m-d H:i:s ");
if($uname=="" || $password=="")
{
   header('Location:login.php?err=2');
}
if($select == "admin")
{
if($uname!="" && $password!="")
{

    $sql_query = "select count(*) as cntUser from clms_login where username='".$uname."' and password='".$password."'";
    $sql_query1 = "update clms_login set connected_at='".$time1."' where username='".$uname."' and password='".$password."'";
   $result = mysqli_query($con,$sql_query);
   $row = mysqli_fetch_array($result);
  $count = $row['cntUser'];
   if($count>0)
   {
      $_SESSION['uname'] = $uname;
     $_SESSION['status'] = $select;
       mysqli_query($con,$sql_query1);
       header('Location:index.php');
   }
   else
   {

     header('Location:login.php?err=1');

   }
}
}
if($select == "student")
{
if($uname!="" && $password!="")
{

    $sql_query = "select count(*) as cntUser from clms_student where username='".$uname."' and password='".$password."'";
    $sql_query1 = "update clms_student set connected_at='".$time1."' where username='".$uname."' and password='".$password."'";
   $result = mysqli_query($con,$sql_query);
   $row = mysqli_fetch_array($result);
  $count = $row['cntUser'];
   if($count>0)
   {
  $_SESSION['uname'] = $uname;
      $_SESSION['status'] = $select;
       mysqli_query($con,$sql_query1);
       header('Location:index2.php');
   }
   else
   {

     header('Location:login.php?err=1');

   }
}
}
}

?>
