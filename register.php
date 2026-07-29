<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/register.css">

</head>
<body>
   
<div class="form-container">

   <form action="connect.php" method="post" enctype="multipart/form-data" id='registerForm'>
      <h3>register now</h3>
      <div id="registerError" class="error-box" style="display:none;"></div>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="fname" placeholder="Enter Full Name" pattern="^[A-Za-z ]+$"  class="box" required title="Name must contain only alphabets">
      <input type="email" name="email" placeholder="Enter Email" class="box" required>

      <input type="tel" name="phoneNumber" class="box" placeholder="Enter Phone Number-e.g. +911234567890" pattern="^\+\d{1,3}\d{10}$" maxlength="13" required
  title="Enter country code followed by 10-digit number (e.g. +911234567890)">

      <div class="input-group">
         <span class="gender-span">
  <label for="gender" style="margin-right: 16px;">Gender:</label>
    <label><input type="radio" name="gender" value="Male" required> Male</label>
    <label><input type="radio" name="gender" value="Female"> Female</label>
    <label><input type="radio" name="gender" value="Other"> Other</label>
  </span>
</div>
      <input type="number" name="graduationYear" class="box" placeholder="Graduation Year" min="2009" max="2030" class="box" required >      
      <input type="text" name="degree" placeholder="Enter Your Degree" class="box" required required title="Degree must contain only alphabets">
      <input type="text" name="branch" placeholder="Enter Branch" pattern="^[A-Za-z]+$" class="box" required required title="Branch must contain only alphabets">
      <input type="text" name="currentCompany" placeholder="Enter your current Company" pattern="^[A-Za-z]+$" class="box" required title="Company must contain only alphabets" >
      <input type="text" name="designation" placeholder="Enter Your Designation" pattern="^[A-Za-z]+$" class="box" required required title="Name must contain only alphabets">
      <input type="url" name="linkedIn" placeholder="Enter your LinkedIn Link" class="box" required>
      <input type="password" name="password" placeholder="Enter Password" class="box" required>
      <input type="password" name="confirmPassword" placeholder="Confirm Password" class="box" required>
      <input type="file" name="img" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Register Now" class="btn">
      <input type="submit" name="back" value="Go Back" class="btn_back" onclick="window.location.href='index.php'">
      <p>Already have an Account? <a href="login.php">Login Now</a></p>
   </form>

</div>
<script>
   function goBack() {
      if (window.history.length > 1) {
        window.history.back();  // Goes to the last visited page
      } else {
        // Optional: if there's no history, go to a default page
        window.location.href = "login.php";
      }
    }
</script>
</body>
</html>