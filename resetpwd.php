<?php 
include 'config.php'; ?>

<!DOCTYPE html>
<html ln="en">
<head>
<title>Reset Password</title>
<style>
/*Login Box*/
body{
   background: url('images/pucampus1.jpg') no-repeat center center fixed;
      background-size: cover;
}
.login-page {
    height: 90vh;
    width: 100%;
    align-items: center;
    display: flex;
    justify-content: center;
}

.form {
background-color: transparent;
   background: rgba(255,255,255,0.50); 
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
  position: relative;
  filter:drop-shadow(0 0 2px #000000);
  border-radius: 5px;
  width: 450px;
  height: 400px;
  padding:40px;
  box-shadow: 0 20px 20px rgba(0, 0, 0, .2);
  margin-top:0px;
}

.form img {
    position: absolute;
    height: 20px;
    top: 225px;
    right: 60px;
    cursor: pointer;
}

.form .img1 {
    position: absolute;
    height: 20px;
    top: 300px;
    right: 60px;
    cursor: pointer;
}

.form input {
    outline: 0;
    background: #f2f2f2;
    border-radius: 4px;
    width: 95%;
    border: 0;
    margin: 15px 0;
    padding: 15px;
    font-size: 14px;
}

.form input:focus {
    box-shadow: 0 0 5px 0 rgba(106, 98, 210);
}

span {
    color: white;
    margin: 10px 0;
    font-size: 14px;
}

.form button {
    outline: 0;
    background: #4682D8;
    width: 100%;
    border: 0;
    margin-top: 10px;
    border-radius: 3px;
    padding: 15px;
    color: white;
    font-size: 15px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.4s ease-in-out;
    cursor: pointer;
}

.form button:hover,
.form button:active,
.form button:focus {
    background: black;
    color: #fff;

}

.message{
    margin: 15px 0;
    text-align: center;

}
.form .message a {
    font-size: 14px;
    color: #3498db;
    text-decoration: none;
}
.form .message a:hover {
    font-size: 14px;
    color: black;
    text-decoration: underline;
}

</style>
</head>
<body>
 <div class="login-page">
        <div class="form">
            <form class="login-form" class="form" method="post" onsubmit="return validate();" >
               <center> <h1>Reset Your Password</h1></center>
			
                <input type="text" required placeholder="Email" id="email" name="email"  pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Please enter valid Email Address." autocomplete="off"/> 
                <input oninput="return formvalid()" type="password" required placeholder="New Password" id="password" name="password" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter one special character(@,#,$,%,&,^,!,*,?), and at least 8 or more characters"/>
                <img src="https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png"
                    onclick="show()" id="showimg">
			    <input oninput="return formvalid()" type="text" required placeholder="Confirm Password" id="cpassword" name="cpassword" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter one special character(@,#,$,%,&,^,!,*,?), and at least 8 or more characters"/>
                <span id="vaild-pass"></span>
                  <img src="https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png"
                    onclick="show()" id="showimg" class="img1">
                <button type="submit" value="Reset" class="btn-btn-primary" id="reset" name="reset">Reset</button>             
            </form>
        </div>
    </div> 
</body>
<script>
//password validation
function formvalid() {
  var vaildpass = document.getElementById("password").value;

  if (vaildpass.length <= 8 || vaildpass.length >= 20) {
    document.getElementById("vaild-pass").innerHTML = "Minimum 8 characters";
    return false;
  } else {
    document.getElementById("vaild-pass").innerHTML = "";
  }
}
//Password hide and show
function show() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("showimg").src =
      "https://static.thenounproject.com/png/777494-200.png";
  } else {
    x.type = "password";
    document.getElementById("showimg").src =
      "https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png";
  }
}

//validate datafunction validate(){
     var error="";
     var email = document.getElementById( "email" ).value.trim();
     var password = document.getElementById( "password" ).value;
     var cpassword = document.getElementById( "cpassword" ).value;

     let isValid = true;

     if( email.trim().length == 0)
     {
        error = "Enter email address";
        document.getElementById( "emailerror" ).innerHTML = error;
        isValid = false;
     }

     else if(!validateEmail(email)){
        error = "Enter valid email address";
        document.getElementById( "emailerror" ).innerHTML = error;
        isValid = false;
     }

     else if(email.length > 0 && validateEmail(email)){
        document.getElementById( "emailerror" ).innerHTML = "";
        isValid = false;
     }

     if( password.length == 0 )
     {
        error = "Enter password";
        document.getElementById( "passworderror" ).innerHTML = error;
        isValid = false;
     }

     else if( password.length > 0 ){
        document.getElementById( "passworderror" ).innerHTML = "";
        isValid = false;
     }

     if( confirm_password.length == 0 )
     {
        error = "Enter confirm password";
        document.getElementById( "cpassworderror" ).innerHTML = error;
        isValid = false;
     }

     else if( confirm_password.length > 0 && password != confirm_password ){
        error="Both password does not match";
        document.getElementById( "cpassworderror" ).innerHTML = error;
        isValid = false;
     }

     else if( confirm_password.length > 0 && password == confirm_password ){
        document.getElementById( "cpassworderror" ).innerHTML = "";
        isValid = false;
     }

     if(email.length > 0 && validateEmail(email) && password.length > 0 && confirm_password.length > 0 && (password == confirm_password)){
        document.getElementById( "emailerror" ).innerHTML = "";
        document.getElementById( "passworderror" ).innerHTML = "";
        document.getElementById( "cpassworderror" ).innerHTML = "";
        isValid = true;
     }

     return isValid;
  
</script>
</html>
<?php

if(isset($_POST['reset']))
{ 
  $email  = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if($password != $cpassword){
    echo"<script>alert('Both password does not match')</script>";
  }

  // print_r($_POST);die;

  $sql ="SELECT * FROM `registration` WHERE email='$email'";
  // echo $sql; die;
  
  $rs=mysqli_query($conn,$sql);
  if(@mysqli_num_rows($rs) > 0){
    $data = mysqli_fetch_assoc($rs);
    $user = $data['fname'];

    

    $query = "UPDATE `registration` SET `password`='$password' WHERE email = '$email' ";
    // echo $query;die;
    $run = mysqli_query($conn, $query);
    if($run){
      echo"<script>alert('Passowrd reset successfullly.. you can login now')</script>";
      echo "<script>window.location.href='login.php';</script>";
      }
	else{
      echo"<script>alert('Error in update password')</script>";
      echo "<script>window.location.href='forgetpwd.php';</script>";
    }
    
  } 
else{
   echo"<script>alert('Invalid username or email')</script>";
   echo "<script>window.location.href='forgetpwd.php';</script>";
 }
 
}

?>

