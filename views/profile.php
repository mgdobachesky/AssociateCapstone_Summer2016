<script type="text/javascript" src="/bubbaLyrics/scripts/profileScript.js"></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h2>Profile</h2>
		</div>
	</div>
</div>
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
	print_r($api->me());
	
	$me = $api->me();
	$pictures = $me->images;
	$img = $pictures[0]->url;
	echo "<img src='" . $img . "' />";
} else {
	$scopes = array(
		'scope' => array(
			'user-read-email',
			'user-library-modify',
		),
	);
	header('Location: ' . $session->getAuthorizeUrl($scopes));
}
?>