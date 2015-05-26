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
	$server = getenv('OPENSHIFT_MYSQL_DB_HOST');
	$portNumber = getenv('OPENSHIFT_MYSQL_DB_PORT');
    $username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    $dbname = "php";
	
	echo "Username". $username . "Password" . $password;
	
	try { 
        $pdo = new PDO("mysql:host=".$server.";dbname=".$dbname.";port=".$portNumber, $username, $password);
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}
	catch (PDOException $ex) {
            die($ex->getMessage());
	}
	echo "<br>";
	echo "<div class=\"container\">";
    echo "<div class=\"jumbotron\">";      
	echo "<h1>Your Profile</h1>";
    echo "<form action=\"updateProfile.php\">";
    echo "<button class=\"btn btn-md btn-primary\" type=\"submit\" width=\"10px;\">Update Profile</button>";
    echo "</form>";
	echo "<div class=\"row\">";
    echo "<br>";
	foreach ($db->query('SELECT name, gender, major, location, bday, email FROM profiles') as $info) {
            echo "<div class=\"col-md-4\">";
            echo "<img src=\"http://pickaface.net/includes/themes/clean/img/slide4.png\" class=\"img-thumbnail\" width=\"200\" height=\"236\"/>";
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
            	 "<label>Email: <br>"    . $info['email']    . '</label><br>';
            echo "</div>";
        }
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";

    ?>
    </body>
</html>
