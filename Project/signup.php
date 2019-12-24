<?php
$con=mysqli_connect("localhost","root","","business");

if(!$con)
{
 die("ERROR:Could not connect.".mysqli_connect_error());
}
extract($_POST);
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$SurName=$_POST['SurName']; 
$address=$_POST['address']; 
$bday=$_POST['bday']; 
$gender=$_POST['gender']; 
$country=$_POST['country']; 
$state=$_POST['state']; 
$district=$_POST['district'];
$email=$_POST['username'];
$phone=$_POST['phone'];
$password=$_POST['password']; 
$pan=$_POST['pan']; 
$assign=$_POST['assign'];

$sql="INSERT INTO employee (FirstName,LastName,SurName ,bday ,gender ,country ,state,district,address ,username ,phone ,password ,pan, assigned_or_not ) VALUES ('$FirstName','$LastName','$SurName','$bday','$gender','$country','$state','$district','$address','$email','$phone','$password','$pan','$assign')";

if(!mysqli_query($con,$sql))
{
//echo"<h1>Email id already exists</h1>";
//header("refresh:1 url=addemployee.php");
header('location:addemployee.php?error=connection');

}
else{
    //echo "<h1>success</h1>";
    //header("refresh:1 url=welcome.php");
    header('location:addemployee.php?error=add');

}


?>


