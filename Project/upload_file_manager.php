<?php
include('session2.php');

if (!$db)
  {
echo "error in connecting database";
}


if(isset($_POST['submit']))
{
    $doc_name = $_POST['doc_name'];
    $doc_des = $_POST['doc_description'];
    $name = $_FILES['myfile']['name'];
    $tmp_name = $_FILES['myfile']['tmp_name'];

    if($name && $doc_name){
        $Location ="documents/$name";
        move_uploaded_file($tmp_name,$Location);
        $query = "INSERT INTO documents (name,description,path,role) VALUES ('$doc_name','$doc_des','$Location','$prjname')";
        if(!mysqli_query($db,$query))
        {
        echo"error";
        }
        else{
            header('Location:welcome-manager.php');

        }
    }
    else
    {
        die("Please select a file");
    }



}

?>
