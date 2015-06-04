<?php
    $username = $_POST['username'];
    $passwd   = $_POST['password'];
    $name     = $_POST['name'];
    $gender   = $_POST['gender'];
    $major    = $_POST['major'];
    $location = $_POST['location'];
    $bday     = $_POST['bday'];
    $hobbies  = $_POST['hobbies'];
    $email    = $_POST['email'];

	$server = getenv('OPENSHIFT_MYSQL_DB_HOST');
		$portNumber = getenv('OPENSHIFT_MYSQL_DB_PORT');
		$user = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
		$password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
		$dbname = "php";
	
    try {
        
        $pdo = new PDO("mysql:host=".$server.";dbname=".$dbname, $user, $password);
		echo "Hello There!!!!!!";
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
        /* set up each query for the insert portion */

        // profile query
        $userQuery  = 'INSERT INTO users (user, passwd, name, gender, major, location, bday, email) ' .
                              'VALUES (:user, :passwd, :name, :gender, :major, :location, :bday, :email);';

        // user query and sanitization
        $hobbyQuery = 'INSERT INTO hobbies (name) VALUES (:name)';

       // $hobbyId = "SELECT id FROM hobbies WHERE name='$hobbies';";
        
        //$cookie = $_COOKIE['user'];
        
        //$userHobbies = 'INSERT INTO user_hobbies (uId, hId) VALUES (:uId, :hId);';
        
        //'INSERT INTO user_hobbies (uId, hId) VALUES (:uId, hId)'
        
        // profile sanitize
        $stmt1 = $db->prepare($userQuery);
        $stmt1->bindParam(':user', $username);
        $stmt1->bindParam(':passwd', $passwd);
        $stmt1->bindParam(':name', $name);
        $stmt1->bindParam(':gender', $gender);
        $stmt1->bindParam(':major', $major);
        $stmt1->bindParam(':location', $location);
        $stmt1->bindParam(':bday', $bday);
        $stmt1->bindParam(':email', $email);
        $stmt1->execute();

        // hobbies sanitization
        $stmt3 = $db->prepare($hobbyQuery);
        $stmt3->bindParam(':name', $hobbies);
        $stmt3->execute();
        
        // user_hobbies
        //$stmt4 = $db->query($userHobbies);
       // $stmt4->bindParam(':uId', $cookie);
        //$stmt4->bindParam(':hId', $hobbyId);
        //$stmt4->execute();
    }
    catch (PDOException $ex) {
        echo "ERROR!: " . $ex->getMessage();
        die();
    }
    header("Location: login.php");
    die();
?>