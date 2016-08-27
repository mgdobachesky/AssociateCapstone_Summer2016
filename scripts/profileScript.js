(function() {
	//append to the nav bar the breadcrumbs for this page
	htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li class='active'>Profile</li>";
	document.getElementById('breadCrumbs').innerHTML = htmlString;
	
	spotifyPlaylist = function(playlistUri){
		var height = screen.height/3;
		var width = screen.width/6;
		var widgetString = "<iframe src='https://embed.spotify.com/?uri=" + playlistUri + "' width='" + width + "' height='" + height + "' frameborder='0' allowtransparency='true'></iframe>";
		document.getElementById('spotifyPlaylist').innerHTML = widgetString;
	}
}())