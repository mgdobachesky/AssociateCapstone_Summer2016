//*************************************************************************************************************************
//The purpose of this script is to use the songId from the artist script to get and display information for that song
//Then to use the lyricId to get and display that song's lyrics
//*************************************************************************************************************************

(function() {
	//get and use the fromWhere variable to determine what breadcrumbs to display
	var fromWhere = localStorage.getItem("fromWhere");

	//append to the nav bar the breadcrumbs for this page
	if (fromWhere == "top") {
		htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li><a href='/bubbaLyrics/index.php?action=findArtist'>Top Artists</a></li><li><a href='/bubbaLyrics/index.php?action=artist'>Artist</a></li><li class='active'>Lyrics</li>";
		document.getElementById('breadCrumbs').innerHTML = htmlString;	
	}
	else {
		htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li><a href='/bubbaLyrics/index.php?action=searchResults'>Search</a></li><li><a href='/bubbaLyrics/index.php?action=artist'>Artist</a></li><li class='active'>Lyrics</li>";
		document.getElementById('breadCrumbs').innerHTML = htmlString;	
	}
	
	var spotifyId;
	var spotifyPlaylistId;

	//get informaition for the songId of the selected song
	getSong = function(songId){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				track_id:songId,
				format:"jsonp",
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/track.get?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json'
		})
		//display some of the song's information
		//run function that displays the song's lyrics
		.done(function(data){
			document.getElementById('lyricTitle').innerText = data.message.body.track.artist_name;
			document.getElementById('albumTitle').innerText = data.message.body.track.album_name;
			document.getElementById('songTitle').innerText = data.message.body.track.track_name;
			spotifyId = data.message.body.track.track_spotify_id;
			createWidget(spotifyId);
			getLyric(data.message.body.track.track_id);	
		});
	}
		
	//get the lyrics for the chosen track and display them
	getLyric = function(lyricId){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				track_id:lyricId,
				format:"jsonp",
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/track.lyrics.get?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json'
		})
		//if lyrics do not exist for the track, display the text "No lyrics on record for this track"
		.done(function(data){
			var htmlString = data.message.body.lyrics.lyrics_body;
			if(htmlString != "") {
				var lyricsCutoff = htmlString.indexOf("...");
				var slicedLyrics = htmlString.slice(0, lyricsCutoff);
				document.getElementById('lyricSpace').innerText = slicedLyrics;	
			} else {
				document.getElementById('lyricSpace').innerText = "No lyrics on record for this track";
			}
		});
	}

	createWidget = function(spotifyId){
		var height = screen.height/10;
		var width = screen.width/4;
		var widgetString = "<iframe src='https://embed.spotify.com/?uri=spotify%3Atrack%3A" + spotifyId + "' width='" + width + "' height='" + height + "' frameborder='0' allowtransparency='true'></iframe>";
		document.getElementById('playWidget').innerHTML = widgetString;
	}
	
	addSongPlaylist = function(playlistId){
		spotifyPlaylistId = playlistId;
	}
	
	removeSongPlaylist = function(playlistId){
		spotifyPlaylistId = playlistId;
	}
	
	$(document).ready(function(){
		//get the songId chosen in the artistScript
		songId = localStorage.getItem("songId");
		
		//run a function that uses the songId to get information for that song
		getSong(songId);
		
		$('#addSongPlaylistButton').click(function(){
			$.post("/bubbaLyrics/index.php?action=addSongPlaylist",
			{
				playlistId: spotifyPlaylistId,
				songId: spotifyId
			},
			function(data, status){});	
		});
		
		$('#removeSongPlaylistButton').click(function(){
			$.post("/bubbaLyrics/index.php?action=removeSongPlaylist",
			{
				playlistId: spotifyPlaylistId,
				songId: spotifyId
			},
			function(data, status){});	
		});
	});
}())