<?php
	require("models/dbConn.php");
	require("models/functions.php");
	
	$action = $_REQUEST['action'];
	$fName = $_POST['first'];
	$lName = $_POST['last'];
	$userName = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	
	if($action == NULL || empty($action)):
		require("views/home.php");
	endif;
	
	switch ($action):
		case "signUp":
		$returnVal = addUser($db, $fName, $lName, $userName, $email, $password);
		echo $returnVal;
		break;
	endswitch;
?>