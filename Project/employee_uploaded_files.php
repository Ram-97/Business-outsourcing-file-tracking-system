<?php
   include('session1.php');
   $sql="select * from documents";
   $res=mysqli_query($db,$sql);
?>

<html>
<head>
<title>Employee</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="images/files.jpeg" rel="icon" type="image/jpeg"/>
</head>
<body> 

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
       <p class="navbar-brand"> Welcome <?php echo $login_session; ?> [Project:<?php echo $prj?> ] </p>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="welcomeemp.php">Home</a></li>
      <li class="active"><a href="employee_uploaded_files.php"><span class="glyphicon glyphicon-download-alt"></span> File List</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
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
                <div class="table-responsive">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Filename</th>
                        <th>Path</th>
                        <th>Download</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
                        {
                        $id= $row['id'];
                        $name=$row['name'];
                        $path=$row['path'];
                        echo "<tr><td>".$id."</td><td>".$name."</td><td>".$path."</td><td>
                                <a href='download.php?dow=$path' class='btn btn-info btn-lg'>
                                    <span class='glyphicon glyphicon-download-alt'></span> Download
                                </a>
                                    </td></tr>";
                        }
                        ?>
                    </tbody>
                    </table>
            </div>
            
        </div>
    </div>
</div>
   
</body>
</html>