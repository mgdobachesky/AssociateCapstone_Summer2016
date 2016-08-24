<?php
session_start();
error_reporting(-1);
//ini_set('display_errors', 1);

require 'src/Request.php';
require 'src/Session.php';
require 'src/SpotifyWebAPI.php';
require 'src/SpotifyWebAPIException.php';
require("models/dbConn.php");
require("models/functions.php");
//catch the action of this script
$action = $_REQUEST['action'];
$code = $_GET['code'];

if(isset($_GET['code'])) {
	$_SESSION['loggedIn'] = 1;
}

//include the header
include("views/header.php");

//if there is no action, display the home page
if($action == NULL || empty($action)):
	$carouselItems = getCarousel($db);
	$articleItems = getArticles($db);
	include("views/home.php");
endif;

if(($action == "login" || isset($_GET['code'])) && $action != "profile") {
	$code = $_GET['code'];
	$session = new SpotifyWebAPI\Session(
		'79e1533a10f148bc9488feffa632ff63',
		'd213c38bbe224dd0acfe17ba43d12a73',
		'http://localhost/bubbaLyrics/index.php/callback/'
	);
	$api = new SpotifyWebAPI\SpotifyWebAPI();
	if (isset($_GET['code'])) {
		$session->requestAccessToken($_GET['code']);
		$api->setAccessToken($session->getAccessToken());
	} else {
		$scopes = array(
			'scope' => array(
				'user-read-email',
				'user-library-modify',
			),
		);
		header('Location: ' . $session->getAuthorizeUrl($scopes));
	}
}

if($action == "logout") {
	$_SESSION = array();
	session_destroy();
	header('Location: /bubbaLyrics/index.php');
	$carouselItems = getCarousel($db);
	$articleItems = getArticles($db);
	include("views/home.php");
}

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