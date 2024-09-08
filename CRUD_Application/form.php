<?php include("connection.php"); ?>



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
            <h1>CRUD Operation</h1>
        </div>
        <div class="form">
            <div class="input-field">
                <label>Username</label>
                <input type="text" class="input" name="username" required>
            </div>
            <div class="input-field">
                <label>Password</label>
                <input type="password" class="input" name="pass" required>
            </div>
            <div class="input-field">
                <label>Confirm-Password</label>
                <input type="password" class="input" name="conpass" required>
            </div>
            <div class="input-field">
                <label>Gender</label>
                <select class="selectbox" name="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="input-field">
                <label>Contact-No</label>
                <input type="text" class="input" name="contact" required>
            </div>
            <div class="input-field">
                <label>Address</label>
                <textarea class="textarea" name="address" required></textarea>
            </div>
            <div class="input-field">
                <label>Pin-Code</label>
                <input type="text" class="input" name="pin">
            </div>
            <div class="input-field">
                <label>Email</label>
                <input type="text" class="input" name="email" required>
            </div>
            <div class="input-field terms">
                <label class="check">
                <input type="checkbox" class="input" required>
                <span class="checkmark"></span>
                </label>
                <p>Agree to Terms & Conditions</p>
            </div>
            <div class="input-field">
                <input type="submit" value="Add-Data" class="adddata" name="submit">
            </div>
        </div>
        </form>
    </div>
</body>
</html>


<?php
    if($_POST['submit'])
    {
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $confirm_pass = $_POST['conpass'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $pin = $_POST['pin'];
        $email = $_POST['email'];
           
            $query = "INSERT INTO form(username,pass,conpass,gender,contact,address,pin,email) VALUES('$username', '$password', '$confirm_pass', '$gender', '$contact', '$address', '$pin', '$email');";
            $data = mysqli_query($con,$query);
     
            if($data){
             echo "data inserted successfully";
            }else{
             echo "data not inserted failed";
            }
        

      
    }
?>