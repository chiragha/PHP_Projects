
<?php 
  include("database.php")
?>

<?php
    if(isset($_POST['search']))
    {   
        $id = $_POST['id'];
        $query = "SELECT * from employeetable where id = '$id' ";

        $data = mysqli_query($con,$query);
        $result = mysqli_fetch_assoc($data);

        // $name = $result['name'];
        // echo $name;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Employee-Management-System</title>
</head>
<body>
<div class="header">
    <form action="#" method="POST">
            <h1>Employee Data Entry Form</h1>
        <div class="form">
            <input type="text" name="id" class="field" placeholder="Search ID" value="<?php if(isset($_POST['search'])){echo $result['id'];}?>">
                <input type="text"  name="name" class="field" placeholder="Employee Name" value="<?php if(isset($_POST['search'])){echo $result['name'];}?>">

                    <select class="field" name="gender">
                        <option value="Not Selected">Select</option>
                        <option value="male"
                        <?php  
                        if($result['gender']== 'male'){
                            echo "Selected";
                        }
                        ?>>Male</option>

                        <option value="female"
                        <?php
                        if($result['gender']== 'female'){
                            echo "Selected";
                        }
                        ?>
                        >Female</option>
                        <option value="other"
                        <?php
                        if($result['gender']== 'other'){
                            echo "Selected";
                        }
                        ?>
                        >Other</option>
                    </select>

                <input type="text" class="field" placeholder="Email Address"  name="email" value="<?php if(isset($_POST['search'])){echo $result['email'];}?>">

                <select class="field" name="department" >
                        <option value="Not Selected">Select Department</option>
                        <option value="IT"
                        <?php  
                        if($result['department']== 'IT'){
                            echo "Selected";
                        }
                        ?>
                        >IT</option>

                        <option value="HR"
                        <?php  
                        if($result['department']== 'HR'){
                            echo "Selected";
                        }
                        ?>
                        >HR</option>

                        <option value="ACCOUNT"
                        <?php  
                        if($result['department']== 'ACCOUNT'){
                            echo "Selected";
                        }
                        ?>
                        >Account</option>

                        <option value="SALES"
                        <?php  
                        if($result['department']== 'SALES'){
                            echo "Selected";
                        }
                        ?>
                        >Sales</option>

                        <option value="MARKETING"
                        <?php  
                        if($result['department']== 'MARKETING'){
                            echo "Selected";
                        }
                        ?>
                        >Marketing</option>

                </select>

                <textarea class="textarea" name="address" placeholder="Address"><?php if(isset($_POST['search'])){echo $result['address'];}?></textarea>

                    
                    <input type="submit" value="SAVE" class="btn" name="save" style="background-color:#33ffbd">
                    <input type="submit" value="UPDATE" class="btn" name="update" style="background-color:#33ff57">
                    <input type="submit" value="DELETE" class="btn" name="delete" style="background-color:#ff5733" onclick='return dlt()'>
                    <input type="reset" value="CLEAR" class="btn" name="clear" style="background-color:#75ff33">
                    <input type="submit" value="SEARCH" class="btn" name="search" style="background-color:#dbff33">
                

            </div>
        </form>
    </div>
</body>
</html>



<?php
    if(isset($_POST['save']))
    {   
        $id = $_POST['id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $address = $_POST['address'];
           
            $query = "INSERT INTO  employeetable(name,gender,email,department,address) VALUES('$name', '$gender', '$email', '$department', '$address');";
            $data = mysqli_query($con,$query);
     
            if($data){
             echo "<script>
                  alert('data inserted successfully')
             </script>";
            }else{
                echo "<script>
                alert('Failed to insert data')
           </script>";
            }
    }
?>


<?php 
    if(isset($_POST['delete'])){
            $id= $_POST['id'];
            $query = "DELETE FROM employeetable where id = '$id'";
            $data = mysqli_query($con,$query);
        if($data){
            echo "Data Deleted";
        }else{
            echo "not";
        }

            }
?>


<script>
    function dlt(){
       return confirm('Are you sure want to delete?');
    }
 </script>


<?php
    if(isset($_POST['update']))
    {   
        $id = $_POST['id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $address = $_POST['address'];
       
            $query = "UPDATE employeetable set name='$name',gender='$gender',email='$email',department='$department',address='$address' WHERE id = '$id'";
            $data = mysqli_query($con,$query);
     
            if($data){
             echo "<script>
                alert('data updated successfully')
             
             </script>";
             
            }else{
             echo "data not inserted failed";
            }
    }
?>