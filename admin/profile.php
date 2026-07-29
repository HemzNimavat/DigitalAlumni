<?php
session_start();
include '../config.php';

// Only allow admin
if (empty($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

// Load admin account from registration table
$stmt = $conn->prepare("SELECT * FROM registration WHERE email = ? LIMIT 1");
$adminEmail = 'admin@gmail.com';
$stmt->bind_param("s", $adminEmail);
$stmt->execute();
$result = $stmt->get_result();
$fetch = $result->fetch_assoc();
$stmt->close();

if (!$fetch) {
    // Fallback if admin row missing
    $fetch = [
        'id' => 0,
        'fname' => 'Administrator',
        'email' => 'admin@gmail.com',
        'phoneNumber' => '',
        'gender' => '',
        'graduationYear' => '',
        'degree' => 'Admin',
        'branch' => 'Admin',
        'currentCompany' => 'Parul University',
        'designation' => 'Admin',
        'linkedIn' => '',
        'img' => 'uploaded_img/default-avatar.png'
    ];
}

$imgSrc = !empty($fetch['img']) ? '../' . ltrim($fetch['img'], '/') : '../images/default.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Profile</title>
   <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
<?php include 'AdminHeader.php'; ?>

<div class="container" style="padding-top: 100px;">
   <div class="profile">
      <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="Admin"
           onerror="this.src='../images/default.png'">
      <h2><?php echo htmlspecialchars($fetch['fname']); ?></h2>
      <p><b>Email:</b> <?php echo htmlspecialchars($fetch['email']); ?></p>
      <p><b>Role:</b> Administrator</p>
      <p><b>Company:</b> <?php echo htmlspecialchars($fetch['currentCompany'] ?? 'Parul University'); ?></p>
      <p><b>Designation:</b> <?php echo htmlspecialchars($fetch['designation'] ?? 'Admin'); ?></p>

      <a href="updateUser.php?id=<?php echo (int)$fetch['id']; ?>" class="btn">Update Profile</a>
      <a href="adminHome.php" class="delete-btn">Go Back</a>
      <a href="../logout.php" class="delete-btn">Logout</a>
   </div>
</div>
</body>
</html>
