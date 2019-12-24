<?php
    include('config.php');
   
	if(isset($_GET['id'])){
		$id = mysql_real_escape_string(stripslashes($_GET['id']));
		$query = mysqli_query($db,"select * from documents where id='$id'");
		if(mysqli_num_rows($query)==1){
			$query = mysqli_query($db,"delete from documents where id='$id'");
			if($query){
                //echo 'remove';
				header("location:uploaded_files.php?error=noneRemove");
			}
			else{
                //echo 'conn error';
				header('location:uploaded_files.php?error=connection');
			}
			
		}
		else{
            //echo 'query error';
			header('location:uploaded.php?error=invalidRemove');
		}
	}
	
?>