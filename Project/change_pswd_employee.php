<?php
   include('session1.php');
   $username=$row['username'];
if(!$db)
{
 die("ERROR:Could not connect.".mysqli_connect_error());
 //header('location:admin-settings.php?error=connection');
    //echo "db";
}
extract($_POST);
$current_pswd=$_POST['current_pswd'];
$change_pswd=$_POST['change_pswd'];
$confirm_pswd=$_POST['confirm_pswd']; 
 

$sql="select * from employee  where username='$username'";
$res=mysqli_query($db,$sql);
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
if($row['password']==$current_pswd)
{
    //echo 'current pswd crct';
    if($change_pswd==$confirm_pswd)
    {
    $sql1="update employee  set password='$change_pswd' where username='$username'";
        if(!mysqli_query($db,$sql1))
        {
            //echo 'error';
            header('location:employee-settings.php?error=connection');

        }
        //echo 'changed';
        header('location:employee-settings.php?error=change');

    }
    else{
        //echo 'not changed';
        header('location:employee-settings.php?error=notchange');
    }
    
}
else{
    //echo 'current pswd error';
    header('location:employee-settings.php?error=current');
}


?>


