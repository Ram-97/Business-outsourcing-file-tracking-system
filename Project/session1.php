<?php

include('config.php');
session_start();

$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($db,"select * from employee where username='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session=$row['FirstName'];
$prj=$row['assigned_or_not'];

if(!isset($_SESSION['login_user'])){
header("location:emplogin.php");
}

?>