<!DOCTYPE html>
<?php
  
?>
<html>
	<head>
		<title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
	<body>
    <br><br><br><br>
		<div class="wrapper">
    <form class="form-signin" action="profile.php">       
      <h2 class="form-signin-heading">Login</h2>
      <br>
      <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
      <br>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
      <br><br>      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      <br>
      <a href="createProfile.php"><span >Create an Account</span></a>   
    </form>
  </div>
	</body>
</html>