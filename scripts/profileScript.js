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
	
	$(document).ready(function(){
		$('#createPlaylistButton').click(function(){
			var playlistName = $('#createPlaylistName').val();
			
			$.post("/bubbaLyrics/index.php?action=createPlaylist",
			{
				playlistName: playlistName
			},
			function(data, status){
				window.location.assign("/bubbaLyrics/index.php?action=profile");
			});	
		});
		
		$('#updatePlaylistModel').click(function(){
			$('#updatePlaylistFeedback').html("<p></p>");
		});
		
		updateSpotifyPlaylist = function(playlistId, playlistName){
			$('#updatePlaylistFeedback').html("<p></p>");
			$('#updatePlaylistButton').off();
			$('#updatePlaylistName').val(playlistName);	
			
			$('#updatePlaylistButton').on("click", function(){
				var updatePlaylistName = $('#updatePlaylistName').val();
				$.post("/bubbaLyrics/index.php?action=updatePlaylist",
					{
						playlistName: updatePlaylistName,
						playlistId: playlistId
					},
				function(data, status){
					if(data) {
						$('#updatePlaylistFeedback').html("<br /><p>" + data + "</p>");
					} else {
						$('#updatePlaylistModal').modal('hide');
						window.location.assign("/bubbaLyrics/index.php?action=profile");
					}
				});
				
			});	
		}
	});
	
	
	
}())