<?php
    session_start();
    include("connect.php");


    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "Select * from `usersreg` where name ='$name' and mobile='$mobile' and password ='$password' and role ='$role'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
       
        $sql = "Select name , photo,votes,id from `usersreg` where role = '2'";
        $resultgroup =mysqli_query($conn,$sql);

        if(mysqli_num_rows($resultgroup)>0){
            $groups = mysqli_fetch_all($resultgroup, MYSQLI_ASSOC);
            $_SESSION['groups'] = $groups;
        }
        $data = mysqli_fetch_array($result);
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;

        echo '
        <script>
         window.location="../routes/dashboard.php";
        </script>
      ';

    }else{
        echo '
        <script>
         alert("Invalid Credentials");
         window.location="../";
        </script>
      ';
    }


?>