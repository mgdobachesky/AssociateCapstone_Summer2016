<?php
require("models/dbConn.php");
require("models/functions.php");
//catch the action of this script
$action = $_REQUEST['action'];
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
endswitch;
//include the footer
include("views/footer.php");
?>