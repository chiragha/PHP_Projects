<?php include("connection.php"); 

$id= $_GET['id'];

$query = "SELECT * FROM FORM where id = '$id';";
$data = mysqli_query($con,$query);
$result = mysqli_fetch_assoc($data);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP CRUD Operation</title>
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
        <div class="title">
            <h1>Update CRUD Operation</h1>
        </div>
        <div class="form">
            <div class="input-field">
                <label>Username</label>
                <input type="text" class="input" value="<?php echo $result['username'];?>" name="username" required>
            </div>
            <div class="input-field">
                <label>Password</label>
                <input type="password" class="input" value="<?php echo $result['pass'];?>" name="pass" required>
            </div>
            <div class="input-field">
                <label>Confirm-Password</label>
                <input type="password" class="input" value="<?php echo $result['conpass'];?>" name="conpass" required>
            </div>
            <div class="input-field">
                <label>Gender</label>
                <select class="selectbox"  name="gender" required>
                    <option value="">Select</option>
                    <option value="male"
                         <?php
                         if($result['gender']== 'male'){
                            echo "Selected";
                         } 
                          ?>
                    >Male</option>
                    <option value="female"
                    <?php
                         if($result['gender']== 'female'){
                            echo "Selected";
                         } 
                         ?>
                    >Female</option>
                </select>
            </div>
            <div class="input-field">
                <label>Contact-No</label>
                <input type="text" class="input" name="contact" value="<?php echo $result['contact'];?>" required>
            </div>
            <div class="input-field">
                <label>Address</label>
                <textarea class="textarea" name="address"  required><?php echo $result['address']; ?></textarea>
            </div>
            <div class="input-field">
                <label>Pin-Code</label>
                <input type="text" class="input" value="<?php echo $result['pin'];?>" name="pin">
            </div>
            <div class="input-field">
                <label>Email</label>
                <input type="text" class="input" value="<?php echo $result['email'];?>" name="email" required>
            </div>
            <div class="input-field terms">
                <label class="check">
                <input type="checkbox" class="input" required>
                <span class="checkmark"></span>
                </label>
                <p>Agree to Terms & Conditions</p>
            </div>
            <div class="input-field">
                <input type="submit" value="Update-Data" class="adddata" name="update">
            </div>
        </div>
        </form>
    </div>
</body>
</html>


 <?php
    if($_POST['update'])
    {
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $confirm_pass = $_POST['conpass'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $pin = $_POST['pin'];
        $email = $_POST['email'];
           
            $query = "UPDATE form set username='$username',pass ='$password',conpass='$confirm_pass',gender='$gender',contact='$contact',address='$address',pin='$pin',email='$email' WHERE id = '$id'";
            $data = mysqli_query($con,$query);
     
            if($data){
             echo "<script>
                alert('data updated successfully')
             
             </script>";
             ?>
             <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/alldata.php"/>
             <?php
            }else{
             echo "data not inserted failed";
            }
        

      
    }
?>