<?php
include 'AdminHeader.php';
?>
<html>
<head>
<title>All Students Details</title>
<style>
body
{
  background : white;
}
table
{
margin-top:0px;
background : white;
box-shadow:7px 10px 10px 7px rgba(0,0,0,.1);
justify-content: center;
align-items: center;
text-align: center;
}
.table td{
  justify-content: center;
align-items: center;
text-align: center;
}

.update, .delete{
background-color : green;
color:white;
border:0;
outline:none;
border-radius:5px;
font-weight:bold;
justify-content: center;
align-items: center;
cursor:pointer;
box-shadow:7px 10px 10px 7px rgba(0,0,0,.1);
}

.delete
{
background-color : red;
}
/* Custom confirmation box */
    .custom-box {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.6);
      justify-content: center;
      align-items: center;
    }

    .custom-content {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      width: 300px;
    }

    .btn {
      padding: 8px 16px;
      margin: 5px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn-confirm { background: #d9534f; color: white; }
    .btn-cancel { background: #5bc0de; color: white; }
    .btn-ok { background: #5cb85c; color: white; }
    .btn-error { background: #f0ad4e; color: white; }
 
</style>
</head>
<body>
  <?php
include("../config.php");
$query = "select * from registration " ;
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total!=0)
{?>
<br><br><br><br>
<h2 align="center"><mark>All Users</mark></h2><br>
<center><table border = "3" cellspacing =  "7" width = "90%" >
<tr>
<th width="3%">ID</th>
<th width="5%">Image</th>
<th width="8%">Full Name</th>
<th width="8%">Email</th>
<th width="8%">Phone Number</th>
<th width="6%">Gender</th>
<th width="5%">Graduation Year</th>
<th width="5%">Degree</th>
<th width="5%">Branch</th>
<th width="5%">Current Company</th>
<th width="10%">Designation</th>
<th width="8%">LinkedIn</th>
<th width="10%">Operations</th>
</tr>
<?php

while($result = mysqli_fetch_assoc($data))
{
    $img = !empty($result['img']) ? htmlspecialchars($result['img']) : 'images/default.png';
    echo "<tr>
    <td>".$result['id']."</td>
	<td><img src=\"../$img\" width=\"50\" height=\"50\" style=\"object-fit:cover;border-radius:50%;\" onerror=\"this.src='../images/default.png'\"></td>
    <td>".htmlspecialchars($result['fname'])."</td>
    <td>".htmlspecialchars($result['email'])."</td>
    <td>".$result['phoneNumber']."</td>
    <td>".htmlspecialchars($result['gender'])."</td>
    <td>".$result['graduationYear']."</td>
    <td>".htmlspecialchars($result['degree'])."</td>
    <td>".htmlspecialchars($result['branch'])."</td>
    <td>".htmlspecialchars($result['currentCompany'])."</td>
    <td>".htmlspecialchars($result['designation'])."</td>
    <td>".htmlspecialchars($result['linkedIn'])."</td>
	 <td>
        <a href='updateUser.php?id=" . $result['id'] . "'><input type='submit' value='Update' class='update'></a>
        <a href='deleteUser.php?id=" . $result['id'] . "'><input type='submit' value='Delete' class='delete' onclick=\"return confirm('Are you sure you want to delete this user?')\"></a>
        </td>
	</tr>";    
}
}
else
{ 
  echo "<script>alert('No record found...')</script>" ;
 }

?>

<script>
// Open confirmation box
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this event?")) {
  }
}
</script>
</body>
</html>