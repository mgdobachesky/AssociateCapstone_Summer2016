<script type="text/javascript" src="/bubbaLyrics/scripts/profileScript.js"></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h2>Profile</h2>

<?php 
$session = new SpotifyWebAPI\Session(
	'79e1533a10f148bc9488feffa632ff63',
	'd213c38bbe224dd0acfe17ba43d12a73',
	'http://localhost/bubbaLyrics/index.php/callback/?action=profile'
);
$api = new SpotifyWebAPI\SpotifyWebAPI();
if (isset($_GET['code'])) {
	$session->requestAccessToken($_GET['code']);
	$api->setAccessToken($session->getAccessToken());
	
	$playlists = $api->getUserPlaylists('123798607', array(
    'limit' => 5
));
	
	
	print_r($api->me());
	echo "<br />";
	
	//me gets all profile data, after that use to manipulate
	$me = $api->me();
	//$playlists = $api->getUserPlaylists($me->id, array('limit' => 5));
	
	
	
	//get profile picture
	$pictures = $me->images;
	$img = $pictures[0]->url;
	echo "<img src='" . $img . "' />";
	
	//get display name
	$display_name = $me->display_name;
	echo "<h3>" . $display_name . "</h3>";
	
	//get email
	$email = $me->email;
	echo "<h3>" . $email . "</h3>";
	
	
	
	//get spotify account
	$external_urls = $me->external_urls;
	$external_url = $external_urls->spotify;
	echo "<a href='" . $external_url . "'>Spotify Account</a>";
	
	//get followers
	$followers = $me->followers;
	$total = $followers->total;
	echo "<h3>Followers: " . $total . "</h3>";

	
	foreach ($playlists->items as $playlist) {
		echo '<a href="' . $playlist->external_urls->spotify . '">' . $playlist->name . '</a> <br>';
	}
	
	
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
?>

		</div>
	</div>
</div>