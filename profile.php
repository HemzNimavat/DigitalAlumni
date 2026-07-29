<?php 
include 'dashboard.php';
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
   
<div class="container">
   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `registration` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['img'] == ''){
            echo '<img src="images/default.png">';
         }else{
            echo '<img src="'.$fetch['img'].'">';
         }
      ?>
      <h2><?php echo $fetch['fname']; ?></h2>
      <p><label>Email: <?php echo $fetch['email']; ?></p>
      <p><label>Degree: <?php echo $fetch['degree']; ?></p>
     <a href="updateProfile.php?id=<?php echo $user_id; ?>" class="btn">Update Profile</a>
      <a href="home.php" class="delete-btn" onclick="goBack()">Go Back</a>
    <a href="logout.php" class="delete-btn">Logout</a>
     <p> <a href="forgotpwd.php">Forgot Password? or Change Password</a></p>
   </div>
</div>

<script>
    
   </script>
</body>
</html>
