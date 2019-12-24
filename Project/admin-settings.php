<?php
   include('session.php');
  
?>

<html>
<head>
<title>Manager Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="images/multi_user.jpeg" rel="icon" type="image/jpeg"/>
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
      <li><a href="add_project_team.php"><span class="glyphicon glyphicon-book"></span> New Project</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View details<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="uploaded_files.php"><span class="glyphicon glyphicon glyphicon-file"></span> File List</a></li>
        <li><a href="employee_details.php"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Employee List</a></li>
        <li><a href="manager_details.php"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Manager List</a></li>     
        <li><a href="project_details.php"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Project Details</a></li>
   </ul>    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="active"><a href = "admin-settings.php"> <span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
      <li><a href = "logout.php"> <span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
   </ul> 
</nav>

<div class="col-md-8 col-md-offset-2">
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <p class="text-center"> CHANGE PASSWORD </p>
            </div>
            <div class="panel-body">
                <div id="error-div" class="alert alert-danger" role="alert" style="display:none;" align="center">
                    <span class="glyphicon glyphicon-exclamation-sign" id="error-glyphicon" aria-hidden="true"></span>
                    <span id="error-span"></span>
                </div>
                <form method="post" action="change_pswd.php">
                <label>Current Password:</label>
                <input type="text" name="current_pswd" placeholder="Enter current password" class="form-control" required/>
                <br/>
                <label>Change Password:</label>
                <input type="text" name="change_pswd" placeholder="Enter new password" class="form-control" required/>
                <br/>
                <label>Confirm Password:</label>
                <input type="text" name="confirm_pswd" placeholder="Confirm password" class="form-control" required/>
                <br/>
                <input type="submit" value="Change"  class="btn btn-success center-block"/>
                </form>
            
        </div>
    </div>
</div>
<?php
        $msg="";
        if(isset($_GET['error'])){
          $msg=$_GET['error'];
          if(strcmp($msg,"connection")==0){
            $msg = "Connection problem. Please try again later.";
          }
          else if(strcmp($msg,"current")==0){
            $msg = "Password Wrong.";
          }
          else if(strcmp($msg,"change")==0){
            $msg = "changed successfully.";
          } 
          else if(strcmp($msg,"notchange")==0){
            $msg = "Password not matched.";
          }

          if(strcmp($msg,"changed successfully.")==0){
            echo "<script>
              document.getElementById('error-div').className = 'alert alert-success';
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-glyphicon').className = 'glyphicon glyphicon-ok';
              document.getElementById('error-span').innerHTML = '".$msg."';
            </script>";
          }
          if(strcmp($msg,"Password Wrong.")==0){
            echo "<script>
              document.getElementById('error-div').className = 'alert alert-warning';
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-glyphicon').className = 'glyphicon glyphicon-info-sign';
              document.getElementById('error-span').innerHTML = '".$msg."';
            </script>";
          }
          if(strcmp($msg,"Password not matched.")==0){
            echo "<script>
              document.getElementById('error-div').className = 'alert alert-warning';
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-glyphicon').className = 'glyphicon glyphicon-info-sign';
              document.getElementById('error-span').innerHTML = '".$msg."';
            </script>";
          }
          if(strcmp($msg,"")!=0){
            echo "<script>
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-span').innerHTML = '".$msg."';
            </script>";

          }
        }
?>

</body>
</html>