<?php
error_reporting(0);
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "employeeform";

  $con = mysqli_connect($servername, $username, $password,$dbname);

  if($con){
   // echo "connected";
  }else{
    echo "connection failed".mysqli_connect_error();
  }
?>