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

	$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
	$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
	$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
	$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	$dbName = 'php';
	
    try {
        
        $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
       $connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName) or die("Server connection failed");
        
        /* set up each query for the insert portion */

        $userExist = "SELECT id FROM hobbies WHERE name='".$username."'";
        $result = mysqli_query($connection, $userExist);
        $userId = '';
        // hobbies sanitization 
        while ($row = mysqli_fetch_assoc($result)) {
            $userId = $row['id'];
        }
        if (empty($userId)) {
            // profile query
            $userQuery  = 'INSERT INTO users (user, passwd, name, gender, major, location, bday, email) ' .
                      'VALUES (:user, :passwd, :name, :gender, :major, :location, :bday, :email);';

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
            
            $result = mysqli_query($connection, $userExist);
            $userId = '';
            while ($row = mysqli_fetch_assoc($result)) {
                $hobbyId = $row['id'];
            }
        } else {
            $userQuery  = "UPDATE users set ".
                          "passwd = '".$passwd."', ".
                          "name = '".$name."', ".
                          "gender = '".$gender."', ".
                          "major = '".$major."', ".
                          "location = '".$location."', ".
                          "bday = '".$bday."', ".
                          "email = '".$email."' ".
                          " WHERE id = '".$UserId."'";    
        }
        $hobbyIdSql = "SELECT id FROM hobbies WHERE name='".trim($hobbies)."'";
        $result = mysqli_query($connection, $hobbyIdSql);
        $hobbyId = '';
        if (empty($hobbyId)) {
            $hobbyQuery = "INSERT INTO hobbies (name) VALUES ('".trim($hobbies)."')";
            $stmt2 = $db->prepare($hobbyQuery);
            $stmt2->execute();
            $result = mysqli_query($connection, $hobbyIdSql);
            while ($row = mysqli_fetch_assoc($result)) {
                $hobbyId = $row['id'];
            }
        }
        
        // user_hobbies
        $userHobbies = "INSERT INTO user_hobbies (uId, hId) VALUES ('".$userId."','".$hobbyId."')";
        $stmt4 = $db->prepare($userHobbies);
        $stmt4->execute();
        setcookie("user", $username, time() + (86400 * 30), "/");
    }
    catch (PDOException $ex) {
        echo "ERROR!: " . $ex->getMessage();
        die();
    }
    header("Location: logVal.php?username=".$username.'&password='.$passwd);
    die();
?>