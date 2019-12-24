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
        <li class="active"><a href="manager_details.php"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Manager List</a></li> 
        <li><a href="project_details.php"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Project Details</a></li>
       </ul>    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href = "admin-settings.php"> <span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
      <li><a href = "logout.php"> <span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
   </ul> 
</nav>

<div class="col-md-8 col-md-offset-2">
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <p class="text-center"> Manager Details </p>
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
                        <th width="12%">Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone no</th>
                        <th>Project Name</th>
                        <th>Assign/not</th>
                        <th width="5%">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php
                                $sql=mysqli_query($db,"SELECT * FROM project_manager");
                                
                                while($row = mysqli_fetch_array($sql))
                                {
                                echo "<tr><td>".$row['FirstName']." ";
                                echo $row['LastName']." ";
                                echo $row['SurName']."</td>";
                                echo "<td>".$row['gender']."</td>";
                                echo "<td>".$row['address']."<br/>";
                                echo $row['district']."<br/>";
                                echo $row['state']."<br/>";
                                echo $row['country']."</td>";
                                echo "<td>".$row['username']."</td>";
                                echo "<td>".$row['phone']."</td>";
                                echo "<td>".$row['prj_name']."</td>";
                                echo "<td>".$row['assigned_or_not']."</td>";
                                echo  '<td><a class="btn btn-warning" href="remove-manager.php?username='.$row['username'].'"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td> </tr>';

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
            $msg = "No such Manager exists.";
          }
          else if(strcmp($msg,"noneRemove")==0){
            $msg = "Manager Deleted successfully.";
          }

          if(strcmp($msg,"No such Manager exists.")==0||strcmp($msg,"Manager Deleted successfully.")==0){
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