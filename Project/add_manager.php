<?php
   include('session.php');
?>

<html lang="en">
<head>
<title>Add Manager</title>
<link href="images/admin.jpeg" rel="icon" type="image/jpeg"/>
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
         <li class="active"><a href="add_manager.php"><span class="glyphicon glyphicon-user"></span> Add Manager</a></li>
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
    <div class="panel-heading"><h5 class="text-center">ADD MANAGER</h5>
    </div>
    <div class="panel-body">
        <form method="POST" action="signup1.php">
                <label>Name:</label> 
                <div class="row">
                <div class="col-md-4">
                    <input type="text" name="FirstName" placeholder="Firstname" class="form-control" required/>
                </div>
                <div class="col-md-4">
                    <input type="text" name="LastName" placeholder="Lastname" class="form-control"  />
                </div>
                <div class="col-md-4">
                    <input type="text" name="SurName" placeholder="Surname" class="form-control" required/>
                </div>
                </div>
<br/>
                                           

                <div class="row" id="bday_gender">
                        <div class="col-md-4">
                            <label> Birthday: </label>
                            <input type="date" name="bday" class="form-control" required/>
                        </div>
                        <div class="col-md-4">
                            <label> Gender: </label>
                            <br/>
                            <label class="radio-inline" >
                            <input type="radio" name="gender"  value="male" checked/> <label> Male </label>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <br/>
                            <label class="radio-inline" >
                            <input type="radio" name="gender"  value="female"/> <label> Female </label>
                            </label>
                        </div>
                </div>
<br/>
                <div class="row" >
                        <div class="col-md-4">
                            <label > Country: </label>
                            <select id="country" name="country" class="form-control" required>
                                    <option>select country</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Australia" >Australia</option>
                                    <option value="India" >India</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label > State: </label>
                            <select id="state" name="state" class="form-control" required>
                                    <option>select state</option>
                            </select>  
                        </div>
                        <div class="col-md-4">
                            <label  > District: </label>
                            <input type="text" name="district" id="district" placeholder="Enter District" class="form-control" required/> 
                        </div>
                </div>
<br/>
                    <div>
                        <div class="form-group" >
                            <label>Address:</label>
                            <textarea rows="4" cols="50" name="address"  class="form-control" style="resize:none" required>
                             </textarea>
                            </div>
                <br/> 
                </div>
                <div class="row" >
                    <div class="col-md-6">
                        <label> Email Id:</label>
                        <input type="email" name="username" placeholder="Enter email" class="form-control" required/>
                    </div>
                    <div class="col-md-6">
                            <label> Phone no:</label>
                            <input type="text" name="phone" placeholder="Enter phone no" class="form-control" required/>
                    </div>
                </div>
<br/>
                <div class="row">
                        <div class="col-md-6">
                            <label > Set Password:</label>
                            <input type="text" name="password" placeholder="Set Password" value="ABCD" class="form-control" readonly/>
                        </div>
                        <div class="col-md-6">
                                <label> PAN:</label>
                                <input type="text" name="pan" placeholder="Enter PAN no"  class="form-control" required/>
                        </div>
                    </div>                          
            
          
<br/>
            <input type="submit" value="Add Manager" id="Request" class="btn btn-success center-block"/>
<br/>
        </form>
        </div>
</div>
</div>

    </div>
</div>
</div>

<?php
        $msg="";
        if(isset($_GET['error'])){
          $msg=$_GET['error'];
          if(strcmp($msg,"connection")==0){
            $msg = "Email Id Already exists.Change the email id";
          }
          else if(strcmp($msg,"add")==0){
            $msg = "Manager Added successfully.";
          }
          
          



          if(strcmp($msg,"Manager Added successfully.")==0){
            echo "<script>
              document.getElementById('error-div').className = 'alert alert-success';
              document.getElementById('error-div').style.display = 'block';
              document.getElementById('error-glyphicon').className = 'glyphicon glyphicon-ok';
              document.getElementById('error-span').innerHTML = '".$msg."';
            </script>";
          }
          
          else if(strcmp($msg,"Email Id Already exists.Change the email id")==0){
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