<?php
   include('session2.php');
?>

<html lang="en">
<head>
<title>Manager</title>
<link href="images/manager.jpg" rel="icon" type="image/jpg"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
       <p class="navbar-brand"> Welcome <?php echo $login_session; ?>  [Project:<?php echo $prjname?> ]</p>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="welcome-manager.php">Home</a></li>
      <li><a href="manager_uploaded_files.php"><span class="glyphicon glyphicon-download-alt"></span> File List</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
       <li><a href = "manager-settings.php"> <span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
      <li><a href = "logout.php"> <span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
   </ul> 
</nav>

<div class="col-md-8 col-md-offset-2">
   <div class="container-fluid">
      <div class="panel panel-primary">
            <div class="panel-heading">
               <p> File upload </p>
            </div>
            <div class="panel-body">
            <form action="upload_file_manager.php" method="post" enctype="multipart/form-data" class="form-group">
               <input type="text" name="doc_name" class="form-control" placeholder="Enter the file name You want to upload" required/>
               <br/>
               <label>Description:</label>
               <input type="text" name="doc_description" class="form-control" placeholder="Enter the Description here." required/>
               <br/>
               <input type="file" name="myfile"  required/>
               <br/>
               <input type="submit" name="submit" value="Upload" class="btn btn-success"/>
               </form>
            </div>
            <div class="panel-footer">
               <p class="text-warning">
               NOTE:<br/>
               The file size is not exceed than 500kb<br/>
               If its exceeded is not uploaded to your Database
               </p>
            </div>
      </div>
   </div>
</div>


</body>
</html>