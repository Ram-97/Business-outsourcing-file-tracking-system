<?php
   
   include('session.php');
  
?>

<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="images/home.ico" rel="icon" type="image/icon"/>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
       <p class="navbar-brand"> Welcome <?php echo $login_session; ?> </p>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="welcome.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Add Members<span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="addemployee.php"><span class="glyphicon glyphicon-user"></span> Add Employee</a></li>
         <li><a href="add_manager.php"><span class="glyphicon glyphicon-user"></span> Add Manager</a></li>
        </ul>
      </li>
      <li><a href="add_project_team.php"><span class="glyphicon glyphicon-book"></span> New Project</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View details<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="uploaded_files.php"><span class="glyphicon glyphicon glyphicon-file"></span> File List</a></li>
        <li><a href="employee_details.php"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Employee List</a></li>
        <li><a href="manager_details.php"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Manager List</a></li>
        <li><a href="project_details.php"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Project Details</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href = "admin-settings.php"> <span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
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
            <form action="upload.php" method="post" enctype="multipart/form-data" class="form-group">
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
</div>

</div>   
</body>
</html>