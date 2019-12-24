<?php
   include('session2.php');
   $sql="select * from documents where role='admin'";
   $res=mysqli_query($db,$sql);

   $sql1="select * from documents where role='$prjname'";
   $res1=mysqli_query($db,$sql1);
?>

<html>
<head>
<title>Manager</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="images/manager.jpg" rel="icon" type="image/jpg"/>
</head>
<body> 

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
       <p class="navbar-brand"> Welcome <?php echo $login_session; ?> [Project:<?php echo $prjname?> ] </p>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="welcome-manager.php">Home</a></li>
      <li class="active"><a href="manager_uploaded_files.php"><span class="glyphicon glyphicon-download-alt"></span> File List</a></li>
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
                <p class="text-center"> Uploaded Files by admin </p>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="10%">No</th>
                        <th width="20%">Filename</th>
                        <th width="40%">Description</th>
                        <th width="10%">Download</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
                        {
                        $id= $row['id'];
                        $name=$row['name'];
                        $des=$row['description'];
                        $path=$row['path'];
                        echo "<tr><td>".$id."</td><td>".$name."</td><td>".$des."</td><td>
                                <a href='download.php?dow=$path' class='btn btn-info '>
                                    <span class='glyphicon glyphicon-download-alt'></span>
                                </a>
                                    </td></tr>";
                        }
                        ?>
                    </tbody>
                    </table>
            </div>
            </div>
        </div>


    <div class="panel panel-primary">
            <div class="panel-heading">
                <p class="text-center"> Uploaded Files by you </p>
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
                        while($row1=mysqli_fetch_array($res1,MYSQLI_ASSOC))
                        {
                        $id= $row1['id'];
                        $name=$row1['name'];
                        $path=$row1['description'];
                        echo "<tr><td>".$id."</td><td>".$name."</td><td>".$path."</td><td>";
                        echo '  <a href="remove_manager_files.php?id='.$row1['id'].'" class="btn btn-warning btn-md">
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