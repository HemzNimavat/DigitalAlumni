<?php
include 'AdminHeader.php';
include '../config.php';

// Fetch all events from DB
// using config.php connection

$result = $conn->query("SELECT * FROM events ORDER BY eventStartDate DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Management</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f9; }
    header { background: #e74c3c; color: #fff; padding: 1rem; text-align: center; }
    .container { display: flex; gap: 1rem; padding: 1rem; padding-right: 1500px;
       padding-top: 100px; }
    .sidebar {
      flex: 1 1 200px; max-width: 250px; background: #fff; padding: 1rem;
      border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      height: fit-content;
    }
  .events {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* exactly 3 per row */
  gap: 1rem;
}.event-card {
      background: #fff; padding: 1rem; border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      width: 300px;
      display: flex; flex-direction: column; justify-content: space-between;
    }
    .event-card h3 { margin: 0 0 0.5rem; color: #333; }
    .event-card p { margin: 0.2rem 0; color: #555; }
    .buttons { display: flex; justify-content: space-between; margin-top: 1rem; }
    button {
      padding: 0.5rem 1rem; border: none; border-radius: 5px; cursor: pointer;
    }
    .add-btn { background: #03a9f4; color: #fff; width: 100%; margin-bottom: 1rem; }
    .update-btn { background: #ffc107; }
    .delete-btn { background: #f44336; color: #fff; }
    img { max-width: 100%; border-radius: 8px; margin-bottom: 0.5rem; }
    @keyframes fadeIn {
  from {opacity:0; transform:scale(0.9);}
  to {opacity:1; transform:scale(1);}
}
  </style>
</head>
<body>

<div class="container">
  <!-- Sidebar with filter -->
  <aside class="sidebar">
    <button class="add-btn" onclick="window.location.href='addEvent.php'">+ Add Event</button>
    <h4>Filter by Department</h4>
    <label><input type="radio" name="dept" value="all" checked onclick="filterEvents('all')"> All</label><br>
    <label><input type="radio" name="dept" value="MCA" onclick="filterEvents('MCA')"> MCA</label><br>
    <label><input type="radio" name="dept" value="MBA" onclick="filterEvents('MBA')"> MBA</label><br>
    <label><input type="radio" name="dept" value="BBA" onclick="filterEvents('BBA')"> BBA</label>
  </aside>

<!-- Custom Confirmation Modal -->
<!--<div id="confirmBox" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
    background:rgba(0,0,0,0.6); display:flex; justify-content:center; align-items:center; z-index:9999;">
  <div style="background:#fff; padding:20px; border-radius:10px; width:320px; text-align:center; box-shadow:0 2px 10px rgba(0,0,0,0.3); animation:fadeIn 0.3s;">
    <h3 style="margin:0 0 10px; color:#333;">Confirm Delete</h3>
    <p style="color:#555;">Are you sure you want to delete this event?</p>
    <div style="margin-top:15px; display:flex; justify-content:space-around;">
      <button id="confirmYes" style="background:#f44336; color:#fff; padding:8px 15px; border:none; border-radius:5px; cursor:pointer;">Yes</button>
      <button id="confirmNo" style="background:#ccc; padding:8px 15px; border:none; border-radius:5px; cursor:pointer;">No</button>
    </div>
  </div>
</div>-->

  <!-- Events section -->
  <section class="events" id="eventsContainer">
    <?php while($row = $result->fetch_assoc()) { ?>
      <div class="event-card" data-dept="<?php echo $row['eventCategory']; ?>">
        <?php if(!empty($row['eventPoster'])) {
            $posterSrc = $row['eventPoster'];
            if (strpos($posterSrc, 'http') !== 0 && strpos($posterSrc, '../') !== 0) {
                $posterSrc = '../' . ltrim($posterSrc, '/');
            }
        ?>
          <img src="<?php echo htmlspecialchars($posterSrc); ?>" alt="Poster">
        <?php } ?>
        <h3><?php echo $row['eventTitle']; ?></h3>
        <p><b>Department:</b> <?php echo $row['eventCategory']; ?></p>
        <p><b>Date:</b> <?php echo $row['eventStartDate']." to ".$row['eventEndDate']; ?></p>
        <p><b>Description:</b><?php echo $row['eventDescription'];?></P>
        <p><b>Venue:</b> <?php echo $row['eventVenue']; ?></p>
        <p><?php echo $row['eventDescription']; ?></p>
        <div class="buttons">
          <button class="update-btn" onclick="window.location.href='updateEvent.php?id=<?php echo $row['id']; ?>'">Update</button>
          <button class="delete-btn" onclick="deleteEvent(<?php echo $row['id']; ?>)">Delete</button>
        </div>
      </div>
    <?php } ?>
  </section>
</div>

<script>
// filter events by department
function filterEvents(dept) {
  const cards = document.querySelectorAll(".event-card");
  cards.forEach(card => {
    if (dept === "all" || card.dataset.dept === dept) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
}

// delete event
function deleteEvent(id) {
  if (confirm("Are you sure you want to delete this event?")) {
    window.location.href = "deleteEvent.php?id=" + id;
  }
}
</script>

</body>
</html>
