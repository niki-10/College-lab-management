<?php
$host="localhost";
$user="root";
$password="";
$db_name="clms";
$con=mysqli_connect($host,$user,$password,$db_name);
if(mysqli_connect_error())
{
die("failed to connect with mysql:".mysqli_connect_error());
}
?>
