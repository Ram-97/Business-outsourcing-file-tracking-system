<?php
    include('config.php');
  	if(isset($_GET['username'])){
		$id = mysql_real_escape_string(stripslashes($_GET['username']));
		$query = mysqli_query($db,"select * from project_manager where username='$id'");
		if(mysqli_num_rows($query)==1){
			$query = mysqli_query($db,"delete from project_manager where username='$id'");
			if($query){
                //echo 'remove';
				header("location:manager_details.php?error=noneRemove");
			}
			else{
                //echo 'conn error';
				header('location:manager_details.php?error=connection');
			}
			
		}
		else{
            //echo 'query error';
			header('location:manager_details.php?error=invalidRemove');
		}
	}
	
?>