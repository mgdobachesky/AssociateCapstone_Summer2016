<?php
session_start();

require 'src/Request.php';
require 'src/Session.php';
require 'src/SpotifyWebAPI.php';
require 'src/SpotifyWebAPIException.php';
require("models/dbConn.php");
require("models/functions.php");

//catch the action of this script
$action = $_REQUEST['action'];

if($action == "createPlaylist"){
	$playlistName = $_POST['playlistName'];
	$api = unserialize($_SESSION['api']);
	$api->createUserPlaylist($_SESSION['spotifyUserId'], array('name' => $playlistName));

	exit();
}

if($action == "updatePlaylist"){
	$playlistName = $_POST['playlistName'];
	$playlistId = $_POST['playlistId'];
	$api = unserialize($_SESSION['api']);
	$api->updateUserPlaylist($_SESSION['spotifyUserId'], $playlistId, array('name' => $playlistName));
	exit();
}

if($action == "getArtist" && ($_POST['name'] != NULL && !empty($_POST['name'])) && ($_SESSION['api'] != NULL && !empty($_SESSION['api']))) {
	$artistName = $_POST['name'];
	
	$api = unserialize($_SESSION['api']);
	$results = $api->search($artistName, "artist");
	foreach ($results->artists->items as $artist) {
		$id = $artist->id;
		echo $id;
		break;
	}
	exit();
} else if($action == "getArtist") {
	exit();
}

//code that sets an authentication ticket for a user so he can access the spotify api
if($action == "login" || isset($_GET['code']) && $action != "profile") {
	$session = new SpotifyWebAPI\Session(
		'79e1533a10f148bc9488feffa632ff63',
		'd213c38bbe224dd0acfe17ba43d12a73',
		'http://localhost/bubbaLyrics/index.php/callback/'
	);
	$api = new SpotifyWebAPI\SpotifyWebAPI();
	if (isset($_GET['code'])) {
		$session->requestAccessToken($_GET['code']);
		$api->setAccessToken($session->getAccessToken());
		$_SESSION['api'] = serialize($api);
		$me = $api->me();
		$_SESSION['spotifyUserId'] = $me->id;
	} else {
		$scopes = array(
			'scope' => array(
				'user-follow-modify',
				'user-follow-read',
				'user-read-email',
				'user-read-private',
				'playlist-modify-private',
				'playlist-modify-public',
				'playlist-read-private',	
			),
		);
		header('Location: ' . $session->getAuthorizeUrl($scopes));
	}
}

//include the header
include("views/header.php");

//if there is no action, display the home page
if($action == NULL || empty($action)):
	$carouselItems = getCarousel($db);
	$articleItems = getArticles($db);
	include("views/home.php");
endif;

//logs a user out of the spotify api
if($action == "logout") {
	$cookieName = 'PHPSESSID';
	unset($_COOKIE[$cookieName]);
	$res = setcookie($cookieName, '', time() - 3600);
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