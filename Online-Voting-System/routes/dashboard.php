<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../');
}
$data= $_SESSION['data'];

if($_SESSION['status']==1){
   $status = '<div class="green">Voted</div>';
}else{
    $status = '<div class="red">Not Voted</div>';
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">
    <title>Online Voting System</title>
</head>
<body>
  
       <h1 class="head">Online Voting System</h1>

       <div class="btnn">
         <a href="../"> <button id="back">Back</button></a>
         <a href="logout.php"> <button id="lout">Logout</button></a>
       </div>

      

       <div class="grp">

       <?php
        if(isset($_SESSION['groups'])){
                $groups = $_SESSION['groups'];
            for($i=0; $i<count($groups);$i++){
                ?>


                  <div class="group">
                    
                    <img src="../uploads/<?php echo $groups[$i]['photo']?>" alt="img">
                    <h3>Group-Name:-<?php echo $groups[$i]['name']?></h3>
                    <h5 class="vote">Votes:-<?php echo $groups[$i]['votes']?></h5>
                    <hr/>
                    <form action="../api/voting.php" method="POST">
                        <input type="hidden" name="groupvotes" value="<?php echo $groups[$i]['votes'] ?>">
                        <input type="hidden" name="groupid" value="<?php echo $groups[$i]['id'] ?>">

                        <?php  
                            if($_SESSION['status']==1){
                                ?>
                                <button class="btn">Voted</button>
                        <?php        
                            }else{
                         ?>       
                                <button class="btn" type="submit">Vote</button>
                                <?php
                            }
                        ?>
                    </form>
                    </div>
            <?php
                
                    }    
                }else{
                    ?>
                <div>
                    <p>No groups to display</p>
                </div>
                <?php
                }
            ?>
                    
     
         <div id="profile" class="profile"> 
          
            <img src="../uploads/<?php echo $data['photo']; ?>" alt="userimg">
            <h3>Name:- <?php echo $data['name']; ?></h3>
           
            <h5>Mobile:- <?php echo $data['mobile']; ?></h5>
            <h5>Status:- <?php echo $status; ?></h5>     
        </div>
        
       </div>
    
</body>
</html>