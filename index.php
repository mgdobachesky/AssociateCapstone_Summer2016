<?php
session_start();

//require pages used in the spotify API
require 'src/Request.php';
require 'src/Session.php';
require 'src/SpotifyWebAPI.php';
require 'src/SpotifyWebAPIException.php';

//require pages that create the basic PHP functionality
require("models/dbConn.php");
require("models/functions.php");

//catch the action of this script
$action = $_REQUEST['action'];

//run this action if the user chooses to add a song to the playlist
if($action == "addSongPlaylist"){
	//capture the playlist and song ids to be used in the appropriate api method
	$playlistId = $_POST['playlistId'];
	$songId = $_POST['songId'];
	//instantiate the api
	$api = unserialize($_SESSION['api']);
	//get the playlists owned by the user to use to determine if the user owns the playlist he is trying to alter
	$playlists = $api->getUserPlaylists($_SESSION['spotifyUserId'], array('limit' => 20));
	//run a function that checks each playlist a user owns to be sure the song is only on a playlist once, and that the user owns that playlist
	foreach ($playlists->items as $aPlaylist) {
		//if the user is the owner of the current playlist under question then move forward
		if ($_SESSION['spotifyUserId'] == $aPlaylist->owner->id) {
			//if the playlist id matches the id of the playlist we want to add then move forward
			if($playlistId == $aPlaylist->id) {
				//get the tracks for the playlist
				$playlistTracks = $api->getUserPlaylistTracks($_SESSION['spotifyUserId'], $playlistId);
				//for each track on the playlist, check if the song to be added already exists
				foreach ($playlistTracks->items as $track) {
					$track = $track->track;
					//if the track exists then echo feedback and exit
					if($track->id == $songId) {
						echo "This song already exists in the selected playlist!";
						exit();
					}
				}
				//if you made it this far then the track is good to add to the playlist
				$api->addUserPlaylistTracks($_SESSION['spotifyUserId'], $playlistId, array($songId));
				exit();
			//if the playlist was not the one to be added then feedback is set to an error
			} else {
				$feedback = "You are not the owner of this playlist!";
			}
		//if you are not the owner of the playlist then feedback is set to an error
		} else {
			$feedback = "You are not the owner of this playlist!";
		}
	}
	//if you made it this far then there was an error, echo it and exit
	echo $feedback;
	exit();
}

//this functionality is run if the action is set to remove a song from a playlist
if($action == "removeSongPlaylist"){
	//get the playlist and song id to remove
	$playlistId = $_POST['playlistId'];
	$songId = $_POST['songId'];
	//instantiate the spotify api
	$api = unserialize($_SESSION['api']);
	//set the playlists variable with the playlists that the user owns
	$playlists = $api->getUserPlaylists($_SESSION['spotifyUserId'], array('limit' => 20));
	//this foreach runs through each playlist the user owns to be sure he owns it, and that it is the correct playlist that is being manipulated
	foreach ($playlists->items as $aPlaylist) {
		//if the user owns the playlist then move forward
		if ($_SESSION['spotifyUserId'] == $aPlaylist->owner->id) {
			//if the playlist under question is the playlist we are trying to manipulate, move forward
			if ($playlistId == $aPlaylist->id) {
				//set the tracks of the playlist in a variable
				$playlistTracks = $api->getUserPlaylistTracks($_SESSION['spotifyUserId'], $playlistId);
				//check each track to be sure that it is on the playlist
				foreach ($playlistTracks->items as $track) {
					$track = $track->track;
					//if the track is on the playlist, remove it
					if($track->id == $songId) {
						$delTrack = array(array('id' => $songId));
						$api->deleteUserPlaylistTracks($_SESSION['spotifyUserId'], $playlistId, $delTrack);
						exit();
					//if the track is not on the playlist then set an error message
					} else {
						$feedback = "This song doesn't exist in the selected playlist!";
					}
				}
			//if the playlist under question is not the playlist to be manipulated, set an error
			} else {
				$feedback = "You are not the owner of this playlist!";
			}
		//if the user does not own the playlist under question, set an error
		} else {
			$feedback = "You are not the owner of this playlist!";
		}
	}
	//if you made it this far then there was an error, echo it and then exit
	echo $feedback;
	exit();
}

//this functionality is run if the user wants to create a playlist
if($action == "createPlaylist"){
	//set the name he wants to give it
	$playlistName = $_POST['playlistName'];
	//instantiate the spotify api
	$api = unserialize($_SESSION['api']);
	//run the method to add a playlist, then exit
	$api->createUserPlaylist($_SESSION['spotifyUserId'], array('name' => $playlistName));
	exit();
}

//this functionality is run if the user wants to update a playlist
if($action == "updatePlaylist"){
	//set the playlist name and playlist id of the playlist to be updated
	$playlistName = $_POST['playlistName'];
	$playlistId = $_POST['playlistId'];
	//instantiate the spotify api
	$api = unserialize($_SESSION['api']);
	//get the users playlists
	$playlists = $api->getUserPlaylists($_SESSION['spotifyUserId'], array('limit' => 20));
	//for each playlist the user has, check if he is the owner
	foreach ($playlists->items as $playlist) {
		//move forward if the user owns this playlist
		if ($_SESSION['spotifyUserId'] == $playlist->owner->id) {
			//if the playlist under question is the playlist we want to update, move forward
			if($playlistId == $playlist->id) {
				//run the method that updates the user playlist then exit
				$api->updateUserPlaylist($_SESSION['spotifyUserId'], $playlistId, array('name' => $playlistName));
				exit();
			//set feedback if the playlist under question is not equal to the playlist we want to edit
			} else {
				$feedback = "You are not the owner of this playlist!";
			}
		//if the user does not own the playlist, set appropriate feedback
		} else {
			$feedback = "You are not the owner of this playlist!";
		}
	}
	//if you made it this far there was an error, echo it and then exit
	echo $feedback;
	exit();
}

//this functionality is used to take an artist's name and convert it to his spotify id
//this was implemented because the artist page was created off of mb_id's, which are not compatible with the spotify api
if($action == "getArtist" && ($_POST['name'] != NULL && !empty($_POST['name'])) && ($_SESSION['api'] != NULL && !empty($_SESSION['api']))) {
	//get the artists name
	$artistName = $_POST['name'];
	//instantiate the spotify api
	$api = unserialize($_SESSION['api']);
	//search for the artist whose name we want to lookup
	$results = $api->search($artistName, "artist");
	//get the id of the first artist that is returned in the search, echo it, then break the foreach
	foreach ($results->artists->items as $artist) {
		$id = $artist->id;
		echo $id;
		break;
	}
	//exit after the loop is broken
	exit();
	//if the action is getArtist but none of the other requirements are fulfilled, exit
} else if($action == "getArtist") {
	exit();
}

//if the user is logged in and any page is requested, refresh his access token
if($_SESSION['spotifyUserId']) {
	//instantiate the spotify and session api
	$session = unserialize($_SESSION['session']);
	$api = unserialize($_SESSION['api']);
	//send the refresh token to the appropriate session method
	$session->refreshAccessToken($_SESSION['refresh']);
	//get a refreshed access token
	$accessToken = $session->getAccessToken();
	//set the refreshed access token on the spotify api
	$api->setAccessToken($accessToken);
	//prepare the api for use in the rest of the program
	$_SESSION['api'] = serialize($api);
}

//code that sets an authentication ticket for a user so he can access the spotify api
if($action == "login" || isset($_GET['code']) && $action != "profile") {
	//create a variable to hold the return value of a method that has the login information passed in
	$session = new SpotifyWebAPI\Session(
		'79e1533a10f148bc9488feffa632ff63',
		'd213c38bbe224dd0acfe17ba43d12a73',
		'http://localhost/bubbaLyrics/index.php/callback/'
	);
	//create a variable that holds the spotify api
	$api = new SpotifyWebAPI\SpotifyWebAPI();
	//if the log in process is complete, and code is in the url, continue
	if (isset($_GET['code'])) {
		//request an access token with the code
		$session->requestAccessToken($_GET['code']);
		//set the access token on the spotify api
		$api->setAccessToken($session->getAccessToken());
		//get a refresh token for later use
		$refreshToken = $session->getRefreshToken();
		//set and prepare the session variables for later use
		$_SESSION['refresh'] = $refreshToken;
		$_SESSION['api'] = serialize($api);
		$_SESSION['session'] = serialize($session);
		$me = $api->me();
		$_SESSION['spotifyUserId'] = $me->id;
	//if the login process has not completed, ask the user for required permissions
	} else {
		//create an array holding each permission
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
		//validate the permissions and redirect to the authorized BubbaLyrics homepage
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
	include("views/footer.php");
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