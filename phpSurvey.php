<?php
	session_start();
	
	if ($_SESSION['hasVoted'] == TRUE) {
		$redirect = "form.php";
		header('Location: ' . $redirect);
	}
?>
<!DOCTYPE html>
<html>
    <head>
	<title>PHP Survey</title>
        <link rel="stylesheet" type="text/css" href="survey.css">
    </head> 
    <body>
        <form action="form.php" method="post">
        <div class="main">
            <header>Welcome to the Survey</header>
            <hr>
            <br>
            <button><a href="form.php" style="text-decoration:none"><b>See Results</b></a></button>
            <br>
            <br>
            What is your favorite color?:
            <br>
            <input type="radio" name="color" value="Blue">
            Blue
            <br>
            <input type="radio" name="color" value="Green">
            Green
            <br>
            <input type="radio" name="color" value="Purple">
            Purple
            <br>
            <input type="radio" name="color" value="Red">
            Red
            <br>
            <br>
            Who is your favorite superhero?:
            <br>
            <input type="radio" name="hero" value="Iron Man">
            Iron Man
            <br>
            <input type="radio" name="hero" value="Superman">
            Superman
            <br>
            <input type="radio" name="hero" value="Spiderman">
            Spider Man
            <br>
            <input type="radio" name="hero" value="Batman">
            Batman
            <br>
            <br>
            What is your favorite programming language?:
            <br>
            <input type="radio" name="language" value="PHP">
            PHP
            <br>
            <input type="radio" name="language" value="C++">
            C++
            <br>
            <input type="radio" name="language" value="Java">
            Java
            <br>
            <input type="radio" name="language" value="C#">
            C#
            <br>
            <br>
            What is your favorite series?:
            <br>
            <input type="radio" name="series" value="Star Wars">
            Star Wars
            <br>
            <input type="radio" name="series" value="Lord of the Rings">
            Lord of the Rings
            <br>
            <input type="radio" name="series" value="Star Trek">
            Star Trek
            <br>
            <input type="radio" name="series" value="Harry Potter">
            Harry Potter
            <br>
            <br>
            <input type="submit" name="submit">
        </div>
        </form>
    </body>
</html>