<?php
     include("database.php");
?>     

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <div id="form">
       <h1>Login Form</h1>
       <form name="form" action = "login.php" method="POST">
        <label>Username: </label>
        <input type = "text" id="user" name="user"><br /><br />
        <label>Password: </label>
        <input type = "password" id="pass" name="pass"><br /><br />
        <input type="submit" id="btn" value="Login" name="submit">
       </form>
    </div>
</body>
</html>