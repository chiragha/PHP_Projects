<?php include("connection.php");

$id= $_GET['id'];
$query = "DELETE FROM FORM where id = '$id'";

$data = mysqli_query($con,$query);

if($data){
    echo "Data Deleted";
    ?>
       <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/alldata.php"/>
    <?php
}else{
    echo "not";
}




?>