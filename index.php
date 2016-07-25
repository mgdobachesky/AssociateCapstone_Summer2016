<?php
	session_start();
	require("models/dbConn.php");
	require("models/functions.php");
	
	$action = $_REQUEST['action'];
	$fName = $_POST['first'];
	$lName = $_POST['last'];
	$userName = $_POST['username'];
	$email = $_POST['email'];
	$reEmail = $_POST['reEmail'];
	$password = $_POST['pwd'];
	$rePassword = $_POST['rePwd'];

	$loginUsername = $_POST['loginUsername'];
	$loginPwd = $_POST['loginPwd'];
	$credit = loginFunc($db, $loginUsername, $loginPwd);
	$value = "";
	
	if($action == "loggingIn"){
		if(!empty($credit['adminLevel']) && $credit['adminLevel'] == 1){
			$_SESSION['userid'] = $credit['adminLevel'];
			exit();
		} else {
			$value = "Error: Invalid username or password";
				echo($value);
				exit();
		}
	}
	
	if($action == "signUpLog"){
		$loginUsername = $_POST['username'];
		$loginPwd = $_POST['pwd'];
		$credit = loginFunc($db, $loginUsername, $loginPwd);
	
		if(!empty($credit['adminLevel']) && $credit['adminLevel'] == 1){
			$_SESSION['userid'] = $credit['adminLevel'];
			echo("0");
			exit();
		} else {
			echo("1");
			exit();
		}
	}
	
	include("views/header.php");
	
	if($action == NULL || empty($action)):
		include("views/home.php");
	endif;
	
	switch ($action):
		case "add":
		include("views/add.php");
		break;
		
		case "artist":
		include("views/artist.php");
		break;
		
		case "findArtist":
		include("views/findArtist.php");
		break;
		
		case "login":
		include("views/login.php");
		break;
		
		case "lyrics":
		include("views/lyrics.php");
		break;
		
		case "profile":
		include("views/profile.php");
		break;
		
		case "searchResults":
		include("views/searchResults.php");
		break;
		
		case "signUp":
		include("views/signUp.php");
		break;
		
		case "updateDelete":
		include("views/updateDelete.php");
		break;
		
		case "signUpDetails":
		$addedUser = addUser($db, $fName, $lName, $userName, $email, $password);
		break;
		
		case "logout":
		logout();
		header('Location: /bubbaLyrics/index.php');
		break;
		
	endswitch;
	
	include("views/footer.php");
?>