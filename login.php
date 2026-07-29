<?php 
session_start();
include 'config.php';

$message = [];

if(isset($_POST['submit'])){

   $email = trim($_POST['email'] ?? '');
   $password = trim($_POST['password'] ?? '');

   // First check for Admin login
   if ($email === "admin@gmail.com" && $password === "PuAdmin@1234") {
      $_SESSION['admin'] = true;
      header("Location: admin/adminHome.php");
      exit;
   }

   // Otherwise, check normal users
   $stmt = $conn->prepare("SELECT * FROM registration WHERE email = ?");
   if ($stmt) {
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      if($result->num_rows > 0){
         $row = $result->fetch_assoc();

         if ($row['password'] === $password) {
            $_SESSION['user_id'] = $row['id'];
            header('Location: home.php');
            exit;
         }

         $message[] = "Incorrect email or password!";
      } else {
         $message[] = "Incorrect email or password!";
      }

      $stmt->close();
   } else {
      $message[] = "Database error. Please try again.";
   }
}

include 'header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="css/login.css">
</head>
<body>   
<div class="form-container">
   <form action="" method="post" id='loginForm'>
      <h3>Login Now</h3>
      <?php if (!empty($message)): ?>
         <?php foreach($message as $msg): ?>
            <div class="error-box" style="background:#e53935;color:#fff;padding:10px;border-radius:6px;margin-bottom:10px;">
               <?= htmlspecialchars($msg) ?>
            </div>
         <?php endforeach; ?>
      <?php endif; ?>

      <input type="email" name="email" placeholder="Enter email" class="box" autocomplete="off" 
             pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" 
             title="Please enter valid email address." required>

      <input type="password" name="password" placeholder="Enter password" class="box" required>

      <input type="submit" name="submit" value="Login Now" class="btn">
      <p>Don't have an Account? <a href="register.php">Register Now</a></p>
   </form>
</div>
</body>
</html>
