<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
  <title></title>
  <link rel='stylesheet' href='css/dashboard.css'>
</head>

<body>
  <nav>
    <input type="checkbox" id="nav-toggle">
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><br> 
  <a href="home.php">Home</a>
  <a href="profile.php">My Profile</a>
  <a href="userEnrollment.php">My Enrollments</a>
  <a href="connections.php">Mutual Connections</a>
  <a href="events.php">Events</a>
<!--  <a href="career.php">Career</a>-->
  <a href="gallery.php">Gallery</a>
    
</div>

<div id="main">
      <span style="font-size:24px;cursor:pointer" onclick="openNav()"> &#9776 <strong><img src='images/pulogo.png'> </strong> </span></div>
 <ul class="links">
    </div>    
  </nav>
  <img src='images/punaac1.jpg' class='img'>
  <center><h2>Welcome to PARUL UNIVERSITY Alumni portal</h2></center>
  
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "0px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</body>
</html>
<?php include 'footer.php';?>