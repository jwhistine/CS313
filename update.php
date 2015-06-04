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
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	//$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        /* set up each query for the update portion */
        $updateProfile = "UPDATE users SET user='$username', passwd='$password', name='$name', gender='$gender', major='$major', " .
                                 "location='$location', bday='$bday', email='$email' WHERE user='".$_COOKIE['user']."'";
     
        $updateUserName = "UPDATE users SET user='$username' WHERE user='".$_COOKIE['user']."'";
        $updatePassword = "UPDATE users SET passwd='$passwd' WHERE user='".$_COOKIE['user']."'";
        $updateName     = "UPDATE users SET name='$name' WHERE user='".$_COOKIE['user']."'";
        $updateGender   = "UPDATE users SET gender='$gender' WHERE user='".$_COOKIE['user']."'";
        $updateMajor    = "UPDATE users SET major='$major' WHERE user='".$_COOKIE['user']."'";
        $updateLocation = "UPDATE users SET location='$location' WHERE user='".$_COOKIE['user']."'";
        $updateBDay     = "UPDATE users SET bday='$bday' WHERE user='".$_COOKIE['user']."'";
        //$updateName     = "UPDATE hobbies SET user='$hobbies' WHERE user='".$_COOKIE['user']."'";
        $updateEmail    = "UPDATE users SET email='$email' WHERE user='".$_COOKIE['user']."'";
        
        if (!empty($username)) {
            $stmt1 = $db->prepare($updateUserName);
            $stmt1->execute();
        }
        
        if (!empty($passwd)) {
            $stmt1 = $db->prepare($updatePassword);
            $stmt1->execute();
        }
        
        if (!empty($name)) {
            $stmt1 = $db->prepare($updateName);
            $stmt1->execute();
        }
        
        if (!empty($gender)) {
            $stmt1 = $db->prepare($updateGender);
            $stmt1->execute();
        }
        
        if (!empty($major)) {
            $stmt1 = $db->prepare($updateMajor);
            $stmt1->execute();
        }
        
        if (!empty($location)) {
            $stmt1 = $db->prepare($updateLocation);
            $stmt1->execute();
        }
        
        if (!empty($bday)) {
            $stmt1 = $db->prepare($updateBDay);
            $stmt1->execute();
        }
        
        if (!empty($email)) {
            $stmt1 = $db->prepare($updateEmail);
            $stmt1->execute();
        }
      
        /* hobbies sanitization
        $stmt3 = $db->prepare($hobbyQuery);
        $stmt3->execute();*/
    }
    catch (PDOException $ex) {
        echo "ERROR!: " . $ex->getMessage();
        die();
    }
    header("Location: profile.php");
    die();
?>