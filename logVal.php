<?php
    $username = $_REQUEST['username'];
    $pass     = $_REQUEST['password'];
  
    try {
       
			include "open_connection.php";
            
            $connection = mysqli_connect($server, $username, $password, $dbname, $portNumber) or die("Server connection failed");
            
            $stmt = "SELECT * FROM users WHERE user='".$username."' AND passwd='".$pass."'";  
            
            $result = mysqli_query($connection, $stmt);
            
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