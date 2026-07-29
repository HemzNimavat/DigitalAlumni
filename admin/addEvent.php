<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Events</title>
   <link rel="stylesheet" href="../css/register.css">
</head>
<body>
   
<div class="form-container">
   <form action="" method="post" enctype="multipart/form-data" id='eventForm'>
      <h3>Add Event</h3>
      <div id="eventError" class="error-box" style="display:none;"></div>
      <input type="text" name="eventTitle" placeholder="Enter Event Title" class="box" required>
      <input type="file" name="eventPoster" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="text" name="eventCategory" placeholder="Event Category" class="box" required>
      <textarea id="description" name="eventDescription" class="box" rows="5" placeholder="Enter Event Description here..."></textarea>
      <input type="date" name="eventStartDate" class="box" required>
      <input type="date" name="eventEndDate" class="box" required>
      <input type="text" name="eventVenue" placeholder="Event Venue" class="box" required>
      <input type="text" name="eventMode" placeholder="Event Mode (Online/Offline)" class="box" required>
      <input type="submit" name="submit" value="Add Event" class="btn">
      <input type="button" value="Go Back" class="btn_back" onclick="goBack()">
   </form>
</div>

<script>
function goBack() {
    window.location.href = "events.php";
}
</script>

<?php
if (isset($_POST['submit'])) {
    include '../config.php';

    // File upload
    $eventPoster = null;
    if (!empty($_FILES["eventPoster"]["name"])) {
        $filename = $_FILES["eventPoster"]["name"];
        $tempname = $_FILES["eventPoster"]["tmp_name"];
        $eventPoster = "uploaded_img/" . basename($filename);
        move_uploaded_file($tempname, "../" . $eventPoster);
    }

    // Collect form data safely
    $eventTitle       = $_POST['eventTitle'];
    $eventCategory    = $_POST['eventCategory'];
    $eventDescription = $_POST['eventDescription'];
    $eventStartDate   = $_POST['eventStartDate'];
    $eventEndDate     = $_POST['eventEndDate'];
    $eventVenue       = $_POST['eventVenue'];
    $eventMode        = $_POST['eventMode'];

    $stmt = $conn->prepare("INSERT INTO events 
            (eventTitle, eventPoster, eventCategory, eventDescription, eventStartDate, eventEndDate, eventVenue, eventMode) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param(
            "ssssssss",
            $eventTitle, $eventPoster, $eventCategory, $eventDescription,
            $eventStartDate, $eventEndDate, $eventVenue, $eventMode
        );

        if ($stmt->execute()) {
            echo "<script>alert('Event added successfully!'); window.location.href='events.php';</script>";
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
}
?>
</body>
</html>
