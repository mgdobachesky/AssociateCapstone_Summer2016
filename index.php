<?php
	//start the session and require important scripts
	session_start();
	require("models/dbConn.php");
	require("models/functions.php");
	
	//catch the action of this script
	$action = $_REQUEST['action'];
	
	//catch the variables used in signing up
	$fName = $_POST['first'];
	$lName = $_POST['last'];
	$userName = $_POST['username'];
	$email = $_POST['email'];
	$reEmail = $_POST['reEmail'];
	$password = $_POST['pwd'];
	$rePassword = $_POST['rePwd'];
	
	//catch the variables used in logging in
	$loginUsername = $_POST['loginUsername'];
	$loginPwd = $_POST['loginPwd'];
	//run the function that gets information to log a users in
	$credit = loginFunc($db, $loginUsername, $loginPwd);
	//clear the value variable used to echo feedback
	$value = "";
	
	//~~~~~~~~~~~~~~~~
	//Change the logginIn function
	//The session variable is named userid, however it is storing the adminLevel variable
	//This is a little misleading as the adminLevel is not the userid in any way
	//This should be changed, perhaps by getting rid of adminLevel and making the userid actually represent the user's userId
	//The database should be changed to get rid of the adminLevel (if it is decided that we don't need it)
	//
	//Also, changes should be made to the signUpLog function to work more smoothly and intuitively, as noted in the signUpScript
	//~~~~~~~~~~~~~~~~
	
	//conditional statement that sets the session variable if the user passed the login function
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
	
	//conditional statement that works like the log in statement above, but is intended for use when a user has just signed up and is being automatically signed in
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
		//NOTE: there are problems with this function noted in the signUpScript
		case "signUpDetails":
		$addedUser = addUser($db, $fName, $lName, $userName, $email, $password);
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