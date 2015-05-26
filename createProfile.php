<!DOCTYPE html>
<html>
    <head>
        <title>Create Account</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
    	<br>
        <div class="container">
        	<div class="jumbotron">
        		<h2>Please Tell Us About Yourself</h2>
      			<form role="form" action="insert.php">
    				<div class="form-group">
      					<label for="usr">Name:</label>
      					<input type="text" class="form-control" id="name">
    				</div>
    				<div class="form-group">
      					<label for="pwd">Gender:</label>
      					<input type="text" class="form-control" id="gender">
    				</div>
    				<div class="form-group">
      					<label for="usr">Major:</label>
      					<input type="text" class="form-control" id="major">
    				</div>
    				<div class="form-group">
      					<label for="pwd">Location:</label>
      					<input type="text" class="form-control" id="location">
    				</div>
    				<div class="form-group">
      					<label for="usr">Birthday:</label>
      					<input type="text" class="form-control" id="bday">
    				</div>
    				<div class="form-group">
      					<label for="pwd">Hobbies:</label>
      					<input type="text" class="form-control" id="hobbies">
    				</div>
    				<div class="form-group">
      					<label for="pwd">Email:</label>
      					<input type="text" class="form-control" id="email">
    				</div>
            <div class="form-group">
                <label for="pic">Picture:</label>
                <input type="file" class="form-control" id="pic" name="pic">
            </div>
  				</form>
      			<button class="btn btn-md btn-primary" type="submit" width="10px;">Create</button>
        	</div>
        </div>
    </body>
</html>