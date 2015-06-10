<!DOCTYPE html>
<html>
    <head>
    <title>Profile Page</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php
	$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
	$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
	$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
	$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	$dbName = 'php';
	
	try { 
	
		if (!isset($_COOKIE['user'])) {
            header("Location: login.php");
        }
	
        $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}
	catch (PDOException $ex) {
            die($ex->getMessage());
	}
	
	$stmt = "SELECT name, gender, major, location, bday, email FROM users " . 
                "WHERE user = '".$_COOKIE['user']."'";
        $stmt2 = "SELECT FROM hobbies WHERE name = '".$_COOKIE['user']."'";
	echo "<br>";
	echo "<div class=\"container\">";
        echo "<div class=\"jumbotron\">";      
	echo "<h1>Your Profile</h1>";
        echo "<div class=\"row\">";
        echo "<div class=\"col-md-4\">";
        echo "<form action=\"updateProfile.php\">";
        echo "<button class=\"btn btn-md btn-primary\" type=\"submit\" width=\"10px;\">Update Profile</button>";
        echo "</form>";
        echo "</div>";
        echo "<div class=\"col-md-4\">";
        echo "<form action=\"logout.php\">";
        echo "<button class=\"btn btn-md btn-primary\" type=\"submit\" width=\"10px;\">Logout</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
	echo "<div class=\"row\">";
        echo "<br>";
	foreach ($db->query($stmt) as $info) {
            echo "<div class=\"col-md-4\">";
            echo "<img src=\"http://pickaface.net/includes/themes/clean/img/slide4.png\" class=\"img-thumbnail\" width=\"200\" height=\"236\"/><br><br>";
            echo "<div class=\"hobbies\">";
            echo "<b>People who share common interests with you:</b><br>";
            echo "Joe Schmoe<br>";
            echo "Mike Mangini<br>";
            echo "</div>";
            echo "<div class=\"notification\">";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"form-group\">";
            echo "<div class=\"col-md-3\">" .
	         "<label>Name: <br>"     . $info['name']     . "</label><br>" .
                 "<hr>" .
            	 "<label>Gender: <br>"   . $info['gender']   . '</label><br>' .
            	 "<hr>" .
            	 "<label>Major: <br>"    . $info['major']    . '</label><br>' .
            	 "<hr>" .
            	 "<label>Location: <br>" . $info['location'] . '</label><br>' .
            	 "<hr>" .
            	 "<label>Birthday: <br>" . $info['bday']     . '</label><br>' .
            	 "<hr>" .
            	 "<label>Email: <br>"    . $info['email']    . '</label><br>' .  
                 "<hr>";
        }
        echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
    ?>
    </body>
</html>
