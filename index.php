<?php
	//start the session and require important scripts
	session_start();
	require("models/dbConn.php");
	require("models/functions.php");
	
	//catch the action of this script
	$action = $_REQUEST['action'];
	
	//conditional statement that sets the session variable if the user passed the login function
	if($action == "loggingIn"){
		$hiddenVal = $_POST['hidden'];
		//catch the variables used in logging in
		$loginEmail = $_POST['email'];
		$loginPwd = $_POST['pwd'];
		//run the function that gets information to log a user in
		$userId = loginFunc($db, $loginEmail, $loginPwd);
		//clear the value variable used to echo feedback
		$value = "";
	
		//if the user exists, start a session
		if(!empty($userId['userId'])){
			$_SESSION['userid'] = $userId['userId'];
			exit();
		} else {
			//change feedback depending on where you are coming from
			if($hiddenVal == 'logIn') {
				$value = "Error: Invalid email or password";
			} else {
				$value = "Error: Email address already taken";
			}
			echo($value);
			exit();
		}
	}
	
	//include the header
	include("views/header.php");
	
	//if there is no action, display the home page
	if($action == NULL || empty($action)):
		include("views/home.php");
	endif;
	
	//this switch uses the action to determine what content to load
	switch ($action):
		//load the artist information page
		case "artist":
			include("views/artist.php");
		break;
		
		//load the page that allows you to choose an artist
		case "findArtist":
			include("views/findArtist.php");
		break;
		
		//load the login page
		case "login":
			include("views/login.php");
		break;
		
		//load the lyrics page
		case "lyrics":
			include("views/lyrics.php");
		break;
		
		//load the profile page
		case "profile":
			include("views/profile.php");
		break;
		
		//load the page that displays search results
		case "searchResults":
			include("views/searchResults.php");
		break;
		
		//load the page that has the sign-up form
		case "signUp":
			include("views/signUp.php");
		break;
		
		//when the sign-up form is submitted, run this function that adds the user to the database
		case "signUpDetails":
			//catch the variables used in signing up
			$fName = $_POST['first'];
			$lName = $_POST['last'];
			$email = $_POST['email'];
			$password = $_POST['pwd'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];
		
			//check to be sure that the email is unique
			$emailExists = checkEmailExists($db, $email);
			if ($emailExists == 0) {
				//add users login information
				$lastInsertId = addUserLogin($db, $email, $password);
				if ($lastInsertId != 0) {
					//add users personal information if adding login information went well
					addUserDetails($db, $lastInsertId, $fName, $lName, $phone, $gender);
				}
			}
		break;
		
		//ends the current session and reloads the page
		case "logout":
			logout();
			header('Location: /bubbaLyrics/index.php');
		break;
		
	endswitch;
	
	//include the footer
	include("views/footer.php");
?>