<?php
   include('session.php');
   $sql="select * from documents where role='admin'";
   $res=mysqli_query($db,$sql);
?>

<html>
<head>
<title>Files</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="images/files.jpeg" rel="icon" type="image/jpeg"/>
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
        <li class="active"><a href="uploaded_files.php"><span class="glyphicon glyphicon glyphicon-file"></span> File List</a></li>
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

<div class="col-md-8 col-md-offset-2">
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <p class="text-center"> Uploaded Files </p>
            </div>
            <div class="panel-body">
                <div id="error-div" class="alert alert-danger" role="alert" style="display:none;" align="center">
                    <span class="glyphicon glyphicon-exclamation-sign" id="error-glyphicon" aria-hidden="true"></span>
                    <span id="error-span"></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="10%">No</th>
                        <th width="20%">Filename</th>
                        <th width="40%">Description</th>
                        <th width="10%">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
                        {
                        $id= $row['id'];
                        $name=$row['name'];
                        $path=$row['description'];
                        echo "<tr><td>".$id."</td><td>".$name."</td><td>".$path."</td><td>";
                        echo '  <a href="remove_files.php?id='.$row['id'].'" class="btn btn-warning btn-md">
                                <span class="glyphicon glyphicon-trash"></span>
                                    
                                </a>
                                    </td></tr>';
                        }
                        ?>
                    </tbody>
                      </table>
            </div>
            
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
          else if(strcmp($msg,"invalidRemove")==0){
            $msg = "No such file exists.";
          }
          else if(strcmp($msg,"noneRemove")==0){
            $msg = "File Deleted successfully.";
          }
          



          if(strcmp($msg,"Delete successful.")==0){
            echo "<script>
              document.getElementById('error-div').className = 'alert alert-success';
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-glyphicon').className = 'glyphicon glyphicon-ok';
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