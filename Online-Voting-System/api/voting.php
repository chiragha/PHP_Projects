<?php
session_start();
include("connect.php");


$votes = $_POST['groupvotes'];
$totalvotes = $votes+1;


$gid = $_POST['groupid'];
$uid=$_SESSION['id'];


$updatevotes = mysqli_query($conn,"update `usersreg` set votes ='$totalvotes' where id='$gid'");
$updatestatus = mysqli_query($conn,"update `usersreg` set  status=1 where id = '$uid'");


if($updatevotes and $updatestatus){
   $getgroups = mysqli_query($conn, "Select name,photo,votes,id from `usersreg` where role = '2'");
    $groups = mysqli_fetch_all($getgroups, MYSQLI_ASSOC);
   
    $_SESSION['groups'] = $groups;
    $_SESSION['status'] =1;

    echo '<script>
    alert("Voted Successfully");
    window.location="../routes/dashboard.php";
    </script>';

}else{
    echo '<script>
    alert("Technical error!! Please try after some time!!);
    window.location="../routes/dashboard.php";
    </script>';
}
?>