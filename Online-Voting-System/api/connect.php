<?php
     
     $conn = mysqli_connect("localhost",  "root", "", "votingsystem" );
     if(!$conn){
        die(mysqli_error($conn));
     }

     ?>