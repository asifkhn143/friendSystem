<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Friend System | Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="cssfiles/index.css">
<body>

<div class="container">
<div class="row justify-content-center" style="padding-top: 200px;">
  <div class="col-sm-4">
     <div class="card">
    <div class="card-header"><h3> Login</h3></div>

	 <form action="login_auth.php" method="POST">
    <div class="card-body">
    <div class="form-group">
		<input type="email" name="email" placeholder="Email" class="form-control" required="">
    </div>

    <div class="form-group">
      <script src="jsfiles/passwordshowhide.js"></script>
		<input type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="psw" class="form-control" required=""> 
    <div class="form-group">
    </div>
    <input type="checkbox" onclick="myFunction()"> Show Password<br>
    </div>
  </div>

    <div class="card-footer">
    <input type="submit" name="login" class="btn btn-primary" value="Login" class="form-control"> <span> Already have an account? <a class="text-danger" href="signup.php">Signup</a></span>
    </div>

	 </form>

	  </div>
  </div>
 </div>


<div class="row justify-content-center">
<div  id="message">
  <h5>Password must contain the following:</h5>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
</div>
</div>
<script src="jsfiles/validation.js"></script>

</body>
</html>
