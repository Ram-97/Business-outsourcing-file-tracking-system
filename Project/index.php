<html lang="en">
<head>
<title>Business File Tracking</title>
<link href="images/title.jpg" rel="icon" type="image/jpg"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">
        $(document).ready(function(){
            $("#select").change(function() {
                var select = $("#select option:selected").val();

                switch (select) {
                    case "Manager":
                        $('#switch2').show();
                        $('#switch1').hide();
                        $('#p1').hide();

                    break;
                    case "Employee":            
                        $('#switch1').show();
                        $('#switch2').hide();
                        $('#p1').hide();

                    break;
                    case "Select": 
                        $('#p1').show();           
                        $('#p1').text("Please select as Manager/Employee");
                        $('#switch1').hide();
                        $('#switch2').hide();
                    break;
                }
            });
          });
</script>



</head>

<body class="jumbotron">
<div class="container-fluid">
        <div class="jumbotron text-center" style="background-color:   #6666ff">
                <strong><h3>Business File Tracking System</h3></strong>
            </div>
<center>
<div class="btn-group">
        <button  class="btn btn-warning  btn-lg" data-toggle="modal" data-target="#admin" >Admin</button>
        <button  class="btn btn-success btn-lg" data-toggle="modal" data-target="#employee">Employee</button>
</div>
</center>

<div class="modal fade" id="admin" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
    <center><h4 class="text-info">Admin Login</h4></center>
    <form method="POST" action="login.php">
        <label>Username:</label>
        <input type="text" name="username" value="admin" class="form-control" placeholder="Enter Username" required/>
        <br/>
        <label>Password:</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required/>
        <br/>
        <input type="submit" value="Login" class="btn btn-success"/> 
    </form>
</div>
</div>
</div>
</div>
    
<div class="modal fade" id="employee" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<center><h4 class="text-info">Employee Login</h4></center>
    <div id="switch">
        <label>Login as:</label>
        <br/>
        <select id="select" style="width:20%; height:5%">
            <option >Select</option>
            <option >Manager</option>
            <option >Employee</option>
        </select>
    </div>
    <br/>
    <p id="p1" class="text-danger text-center"></p>

    <form method="POST" action="emplogin.php" style="display:none" id="switch1">
        <label>Username:</label>
        <input type="text" name="username" class="form-control" placeholder="Enter Email id" required/>
        <br/>
        <label>Password:</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required/>
        <br/>
        <input type="submit" value="Login-employee" class="btn btn-success"/> 
    </form>


    <form method="POST" action="managerlogin.php" style="display:none" id="switch2">
        <label>Username:</label>
        <input type="text" name="username" class="form-control" placeholder="Enter Email id" required/>
        <br/>
        <label>Password:</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required/>
        <br/>
        <input type="submit" value="Login-manager" class="btn btn-success"/> 
    </form>
</div>
</div>
</div>
</div>
    
</div>
</div>
</body>
</html>