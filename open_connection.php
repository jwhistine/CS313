<?php
    try {
        $server = getenv('OPENSHIFT_MYSQL_DB_HOST');
		$portNumber = getenv('OPENSHIFT_MYSQL_DB_PORT');
		$username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
		$password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
		$dbname = "php";
    }
    catch (PDOException $ex) {
        echo "ERROR!: " . $ex->getMessage();
        die();
    }
?>