<?php
$con=mysqli_connect("localhost","root","","business");

if(!$con)
{
 die("ERROR:Could not connect.".mysqli_connect_error());
}
extract($_POST);
$prj_name=$_POST['prj_name'];
$prj_desc=$_POST['prj_desc'];
$prj_manager=$_POST['prj_manager']; 
$prj_duration=$_POST['prj_duration']; 

$sql="INSERT INTO project (prj_name, prj_desc, prj_manager, prj_duration) VALUES ('$prj_name','$prj_desc','$prj_manager','$prj_duration')";
if(!mysqli_query($con,$sql))
{
    //echo"<h1>Error<h1>";
    header('location:add_project_team.php?error=connection1');

}
else
{
    //echo "<h1>success</h1>";
    $sql1 = "UPDATE project_manager SET prj_name ='$prj_name' , assigned_or_not='Assigned' WHERE username='$prj_manager'"; 
    if(!mysqli_query($con,$sql1))
    {
        header('location:add_project_team.php?error=connection2');
    }
        header('location:add_project_team.php?error=add');
}
?>
