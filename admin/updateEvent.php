<?php
include '../config.php'; // ok

// ✅ Get event id
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid event ID");
}
$id = intval($_GET['id']);

// ✅ Fetch existing event data
$sql = "SELECT * FROM events WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$event = $result->fetch_assoc();

if (!$event) {
    die("Event not found");
}

// ✅ Handle form submission
if (isset($_POST['update_profile'])) {
    $eventTitle      = $_POST['eventTitle'];
    $eventCategory   = $_POST['eventCategory'];
    $eventDescription= $_POST['eventDescription'];
    $eventStartDate  = $_POST['eventStartDate'];
    $eventEndDate    = $_POST['eventEndDate'];
    $eventVenue      = $_POST['eventVenue'];
    $eventMode       = $_POST['eventMode'];

    // Handle poster upload
    $poster = $event['eventPoster']; // keep old one
    if (!empty($_FILES["eventPoster"]["name"])) {
        $filename = basename($_FILES["eventPoster"]["name"]);
        $targetPath = "uploaded_img/" . $filename;
        if (move_uploaded_file($_FILES["eventPoster"]["tmp_name"], "../" . $targetPath)) {
            $poster = $targetPath;
        }
    }

    // ✅ Update query
    $update = $conn->prepare("UPDATE events 
        SET eventTitle=?, eventCategory=?, eventDescription=?, eventStartDate=?, eventEndDate=?, eventVenue=?, eventMode=?, eventPoster=? 
        WHERE id=?");

    $update->bind_param("ssssssssi", 
        $eventTitle, $eventCategory, $eventDescription, $eventStartDate, $eventEndDate, $eventVenue, $eventMode, $poster, $id);

    if ($update->execute()) {
        echo "<script>alert('Event updated successfully!'); window.location.href='events.php';</script>";
    } else {
        echo "Error: " . $update->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Event</title>
   <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
<div class="update-profile">
   <form action="" method="post" enctype="multipart/form-data">
      <h1>Update Event</h1>
      <div class="flex">
         <div class="inputBox">
            <span>Event Name :</span>
            <input type="text" name="eventTitle" value="<?php echo htmlspecialchars($event['eventTitle']); ?>" class="box" required>
            
            <span>Event Poster :</span>
            <input type="file" name="eventPoster" class="box">
            <?php if($event['eventPoster']) { ?>
                <img src="<?php echo htmlspecialchars('../' . ltrim($event['eventPoster'], '/')); ?>" width="100">
            <?php } ?>

            <span>Event Category :</span>
            <input type="text" name="eventCategory" value="<?php echo htmlspecialchars($event['eventCategory']); ?>" class="box" required>

            <span>Description :</span>
            <textarea name="eventDescription" class="box" rows="5"><?php echo htmlspecialchars($event['eventDescription']); ?></textarea>
         </div>

         <div class="inputBox">
            <span>Event Start Date :</span>
            <input type="date" name="eventStartDate" value="<?php echo $event['eventStartDate']; ?>" class="box" required>

            <span>Event End Date :</span>
            <input type="date" name="eventEndDate" value="<?php echo $event['eventEndDate']; ?>" class="box" required>

            <span>Event Venue :</span>
            <input type="text" name="eventVenue" value="<?php echo htmlspecialchars($event['eventVenue']); ?>" class="box" required>

            <span>Event Mode :</span>
            <input type="text" name="eventMode" value="<?php echo htmlspecialchars($event['eventMode']); ?>" class="box" required>

            <input type="submit" value="Update" name="update_profile" class="btn">
            <a href="events.php" class="delete-btn">Go Back</a>
         </div>
      </div>
   </form>
</div>
</body>
</html>
