<html>
    <head>
        <title>Display</title>
        <style>
            body{
              background-color: #19172e;
              color:#000;
            }
            table{
                background-color: #fff;
            }
            h2{
                font-size: 2em;
                color:#fff;
            }

            .update{
                background-color:green;
                border-radius:5px;
                padding:5px 15px;
                cursor:pointer;
                color:#fff;
                border:0;
                outline:none;
            }
            .delete{
                background-color:red;
                border-radius:5px;
                padding:5px 15px;
                cursor:pointer;
                color:#fff;
                border:0;
                outline:none;
            }
        </style>
    </head>
</html>


<?php 

include("connection.php");
error_reporting(0);

$query = "SELECT * FROM FORM";
$data = mysqli_query($con,$query);

$total = mysqli_num_rows($data);
// $result = mysqli_fetch_assoc($data);


if($total !=0)
{
    ?>
       <h2 align="center">All Details</h2>
    <table border="3" cellspacing = "7" width="100%" align="center">
    <tr>
        <th width="5%">ID</th>
        <th width="10%">Username</th>
        <th width="8%">Gender</th>
        <th width="10%">Contact</th>
        <th width="25%">Address</th>
        <th width="8%">Pin</th>
        <th width="15%">Email</th>
        <th width="15%">CRUD Operations</th>
    </tr>
  
    <?php
        while($result = mysqli_fetch_assoc($data))
        {
            echo "<tr>
                    <td>".$result['id']."</td>
                    <td>".$result['username']."</td>
                    <td>".$result['gender']."</td>
                    <td>".$result['contact']."</td>
                    <td>".$result['address']."</td>
                    <td>".$result['pin']."</td>
                    <td>".$result['email']."</td>
                    <td><a href='update_page.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
                    <a href='delete_page.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick='return dlt()'></a></td>
                  </tr>";
        }
        
}else{
     echo "no records found";
}
?>
 </table>


 <script>
    function dlt(){
       return confirm('Are you sure want to delete?');
    }
 </script>

        