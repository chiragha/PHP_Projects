<?php
    include("connect.php");


    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
   
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
   
    $address = $_POST['address'];

    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    $role = $_POST['role'];


    if($password==$cpassword){
        move_uploaded_file($tmp_name,"../uploads/$image");
        $sql = "insert into `usersreg` (name,mobile,password,address,photo,role,status,votes) values('$name','$mobile','$password','$address','$image','$role',0,0)";

        $result = mysqli_query($conn,$sql);
        if($result){
            echo '
            <script>
             alert("Registration Successfully");
             window.location="../";
            </script>
          ';
        }else{
            echo '
            <script>
             alert("Some error occured");
             window.location="../routes/Reg.html";
            </script>
          ';
        }

    }else{
        echo '
          <script>
           alert("Password and confirm password does not match");
           window.location="../routes/Reg.html";
          </script>
        ';
    }

?>