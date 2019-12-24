<?php
   include('session.php');
  $sql=mysqli_query($db,"SELECT * FROM project_manager");
?>


<html lang="en">
<head>
<title>New Project</title>
<link href="images/new_prj.jpg" rel="icon" type="image/jpg"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="scriptjs.js" type="text/javascript"> </script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
       <p class="navbar-brand"> Welcome <?php echo $login_session; ?> </p>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="welcome.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Add Members<span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="addemployee.php"><span class="glyphicon glyphicon-user"></span> Add Employee</a></li>
         <li><a href="add_manager.php"><span class="glyphicon glyphicon-user"></span> Add Manager</a></li>
        </ul>
      </li>
      <li class="active"><a href="add_project_team.php"><span class="glyphicon glyphicon-book"></span> New Project</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View details<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="uploaded_files.php"><span class="glyphicon glyphicon glyphicon-file"></span> File List</a></li>
        <li><a href="employee_details.php"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Employee List</a></li>
        <li><a href="manager_details.php"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Manager List</a></li>
        <li><a href="project_details.php"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Project Details</a></li>
      </ul>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href = "admin-settings.php"> <span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
      <li><a href = "logout.php"> <span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
   </ul> 
</nav>

<div class="container-fluid">
<div class="col-md-8 col-md-offset-2">
<div class="border border-light">
<div id="error-div" class="alert alert-danger" role="alert" style="display:none;" align="center">
                    <span class="glyphicon glyphicon-exclamation-sign" id="error-glyphicon" aria-hidden="true"></span>
                    <span id="error-span"></span>
</div>
<div class="panel panel-primary">
    <div class="panel-heading"><h5 class="text-center">Add Project</h5></div>
    <div class="panel-body">
        <form method="POST" action="add_project.php">
            <label>Project Name</label>
            <input type="text" name="prj_name" class="form-control" placeholder="Enter the project name" required/>
            <br/>
            <label>Project Description</label>
            <input type="text" name="prj_desc" class="form-control" placeholder="Enter the project description" required/>
            <br/>
            <label>Select Project Manager</label>
            <select name="prj_manager" class="form-control" required>
                <?php
                while($row=mysqli_fetch_array($sql)) {
                  if($row['assigned_or_not']=="not assigned"){
                echo "<option value=".$row['username'].">".$row['FirstName']." ".$row['LastName']." ".$row['SurName']."-".$row['username']." [".$row['assigned_or_not']."]"."</option>";
                } }    	
                ?>
            </select>
            <br/>
            <label>Project Duration</label>
            <input type="text" name="prj_duration" class="form-control" placeholder="Enter the project duration" required/>
            <br/>
            <input type="submit" value="Add" class="btn btn-success center-block"/>
            
        </form>
    </div>
    </div>
</div>
</div>
</div>

<?php
        $msg="";
        if(isset($_GET['error'])){
          $msg=$_GET['error'];
          if(strcmp($msg,"connection1")==0){
            $msg = "Project Name Already exists.Change the Project Name";
          }
          else if(strcmp($msg,"add")==0){
            $msg = "Added successfully.";
          }
          else if(strcmp($msg,"connection2")==0){
            $msg = "Project Manager doesn't exist";
          }
          



          if(strcmp($msg,"Added successfully.")==0){
            echo "<script>
              document.getElementById('error-div').className = 'alert alert-success';
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-glyphicon').className = 'glyphicon glyphicon-ok';
              document.getElementById('error-span').innerHTML = '".$msg."';
            </script>";
          }
          else if(strcmp($msg,"Project Name Already exists.Change the Project Name")==0){
            echo "<script>
              document.getElementById('error-div').className = 'alert alert-danger';
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-glyphicon').className = 'glyphicon glyphicon-remove-sign';
              document.getElementById('error-span').innerHTML = '".$msg."';
            </script>";
          }
          else if(strcmp($msg,"Project Manager doesn't exist")==0){
            echo "<script>
              document.getElementById('error-div').className = 'alert alert-danger';
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-glyphicon').className = 'glyphicon glyphicon-remove-sign';
              document.getElementById('error-span').innerHTML = '".$msg."';
            </script>";
          }

          else if(strcmp($msg,"")!=0){
            echo "<script>
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-span').innerHTML = '".$msg."';
            </script>";

          }
        }
?>


</body>
</html>