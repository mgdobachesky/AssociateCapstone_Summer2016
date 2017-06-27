<?php
	//store the database server name in a variable
	$dsn = "mysql:host=localhost;dbname=bubbalyrics";

	//store the username in a variable
	$username = "bubbalyrics";

	//store the password in a variable
	$password = "PASSWORD";

	//try to connect to the database
	try {
		//create a new PDO object using the stored credentials
		$db = new PDO($dsn, $username, $password);
		
		//use the line below for testing
		//echo "Connected!";
	} catch (PDOException $e) {
		//this code could give away too much information, use for testing purposes only
		//$error_message = $e->getMessage();
		//echo $error_message;
		
		//use this code under most circumstances
		exit("<br />Error connecting to the database");
	}
?>
