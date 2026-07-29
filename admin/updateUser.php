<?php
require_once 'connect.php';

// GET -> show the form; POST -> process the update
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if ($id <= 0) { die('Invalid user id'); }

    $stmt = $conn->prepare("SELECT id, img, fname, email, phoneNumber, gender, graduationYear, degree, branch, currentCompany, designation, linkedIn 
                            FROM registration WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows === 0) { die('User not found'); }
    $row = $res->fetch_assoc();
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update User</title>
  <style>
    body{font-family:Arial, sans-serif; background:#f8fafc}
    .wrap{max-width:800px; margin:30px auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 2px 10px rgba(0,0,0,.08)}
    .grid{display:grid; grid-template-columns:1fr 1fr; gap:16px}
    label{font-weight:600}
    input,select{width:100%; padding:10px; border:1px solid #ddd; border-radius:6px}
    .row{margin:12px 0}
    .actions{display:flex; gap:12px; margin-top:12px}
    .btn{padding:10px 16px; border:0; border-radius:6px; cursor:pointer; color:#fff; font-weight:600}
    .save{background:#16a34a}
    .back{background:#64748b; text-decoration:none; display:inline-block; line-height:36px; color:#fff}
    img{max-width:100px; border-radius:8px}
  </style>
</head>
<body>
  <div class="wrap">
    <h2>Update: <?= htmlspecialchars($row['fname']) ?> (ID: <?= htmlspecialchars($row['id']) ?>)</h2>
    <form action="updateUser.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">

      <div class="grid">
        <div class="row">
          <label>Full Name</label>
          <input type="text" name="fname" value="<?= htmlspecialchars($row['fname']) ?>" required pattern="[A-Za-z ]+">
        </div>
        <div class="row">
          <label>Email</label>
          <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>
        </div>
        <div class="row">
          <label>Phone</label>
          <input type="text" name="phoneNumber" value="<?= htmlspecialchars($row['phoneNumber']) ?>" required>
        </div>
        <div class="row">
          <label>Gender</label>
          <select name="gender">
            <option value="">Select</option>
            <option value="Male"   <?= $row['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= $row['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
            <option value="Other"  <?= $row['gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
          </select>
        </div>
        <div class="row">
          <label>Graduation Year</label>
          <input type="number" name="graduationYear" value="<?= htmlspecialchars($row['graduationYear']) ?>" min="1900" max="2100">
        </div>
        <div class="row">
          <label>Degree</label>
          <input type="text" name="degree" value="<?= htmlspecialchars($row['degree']) ?>">
        </div>
        <div class="row">
          <label>Branch</label>
          <input type="text" name="branch" value="<?= htmlspecialchars($row['branch']) ?>">
        </div>
        <div class="row">
          <label>Current Company</label>
          <input type="text" name="currentCompany" value="<?= htmlspecialchars($row['currentCompany']) ?>">
        </div>
        <div class="row">
          <label>Designation</label>
          <input type="text" name="designation" value="<?= htmlspecialchars($row['designation']) ?>">
        </div>
        <div class="row">
          <label>LinkedIn</label>
          <input type="text" name="linkedIn" value="<?= htmlspecialchars($row['linkedIn']) ?>">
        </div>
        <div class="row">
          <label>Current Photo</label><br>
          <?php 
            $imgVal = $row['img'];
            $src = (strpos($imgVal, 'uploaded_img/') === 0) ? $imgVal : ('uploaded_img/' . $imgVal);
          ?>
          <img src="<?= htmlspecialchars($src) ?>" alt="photo"><br><br>
          <label>Change Photo</label>
          <input type="file" name="img" accept="image/*">
        </div>
      </div>

      <div class="actions">
        <button type="submit" class="btn save">Save Changes</button>
        <a class="btn back" href="allUsers.php">Back</a>
      </div>
    </form>
  </div>
</body>
</html>
<?php
    exit;
}

// POST branch: perform update
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
if ($id <= 0) { die('Invalid user id'); }

$fname          = $_POST['fname'] ?? '';
$email          = $_POST['email'] ?? '';
$phoneNumber    = $_POST['phoneNumber'] ?? '';
$gender         = $_POST['gender'] ?? '';
$graduationYear = $_POST['graduationYear'] !== '' ? (int)$_POST['graduationYear'] : null;
$degree         = $_POST['degree'] ?? '';
$branch         = $_POST['branch'] ?? '';
$currentCompany = $_POST['currentCompany'] ?? '';
$designation    = $_POST['designation'] ?? '';
$linkedIn       = $_POST['linkedIn'] ?? '';

// Handle new image upload (optional)
$imgFileName = null;
if (!empty($_FILES['img']['name']) && is_uploaded_file($_FILES['img']['tmp_name'])) {
    $fileName = basename($_FILES['img']['name']);
    $targetDir = __DIR__ . "/uploaded_img"; // physical dir
    if (!is_dir($targetDir)) { @mkdir($targetDir, 0775, true); }
    $targetPath = $targetDir . "/" . $fileName;
    if (move_uploaded_file($_FILES['img']['tmp_name'], $targetPath)) {
        $imgFileName = $fileName; // store only filename in DB
    }
}

// Build update query conditionally
if ($imgFileName !== null) {
    $sql = "UPDATE registration 
            SET fname=?, email=?, phoneNumber=?, gender=?, graduationYear=?, degree=?, branch=?, currentCompany=?, designation=?, linkedIn=?, img=?
            WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssissssssi",
        $fname, $email, $phoneNumber, $gender, $graduationYear, $degree, $branch, $currentCompany, $designation, $linkedIn, $imgFileName, $id
    );
} else {
    $sql = "UPDATE registration 
            SET fname=?, email=?, phoneNumber=?, gender=?, graduationYear=?, degree=?, branch=?, currentCompany=?, designation=?, linkedIn=?
            WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssisssssi",
        $fname, $email, $phoneNumber, $gender, $graduationYear, $degree, $branch, $currentCompany, $designation, $linkedIn, $id
    );
}

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

if ($stmt->execute()) {
    echo "<script>alert('User updated successfully'); window.location.href='allUsers.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>