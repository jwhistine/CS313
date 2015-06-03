<?php
    $username = $_REQUEST['username'];
    $passwd   = $_REQUEST['password'];
    $name     = $_REQUEST['name'];
    $gender   = $_REQUEST['gender'];
    $major    = $_REQUEST['major'];
    $location = $_REQUEST['location'];
    $bday     = $_REQUEST['bday'];
    $hobbies  = $_REQUEST['hobbies'];
    $email    = $_REQUEST['email'];

    try {
		$server = getenv('OPENSHIFT_MYSQL_DB_HOST');
		$portNumber = getenv('OPENSHIFT_MYSQL_DB_PORT');
		$username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
		$password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
		$dbname = "php";
        
        $pdo = new PDO("mysql:host=".$server.";dbname=".$dbname.";port=".$portNumber, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
        /* set up each query for the insert portion */

        // profile query
        $userQuery  = 'INSERT INTO users (user, passwd, name, gender, major, location, bday, email) ' .
                              'VALUES (:user, :passwd, :name, :gender, :major, :location, :bday, :email);';

        // user query and sanitization
        $hobbyQuery = 'INSERT INTO hobbies (name) ' .
								'VALUES (:name)';

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