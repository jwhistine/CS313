<?php
    $username = $_POST['username'];
    $pass         = $_POST['password'];
  
    try {
			$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
			$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
			$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
			$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
			$dbName = 'php';
            
            $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
            $stmt = "SELECT * FROM users WHERE user='".$username."' AND passwd='".$pass."'";  
            
            $result = mysqli_query($db, $stmt);
            
            $count = mysqli_num_rows($result);
            
            if ($count > 0) {
                setcookie("user", $username, time() + (86400 * 30), "/");
                header("Location: profile.php");
            }
            else {
                header("Location: login.php");
            }
        }
    catch (PDOException $ex) {
        echo "ERROR!: " . $ex->getMessage();
        die();
    }
?>