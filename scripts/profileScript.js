(function() {
	//append to the nav bar the breadcrumbs for this page
	htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li class='active'>Profile</li>";
	document.getElementById('breadCrumbs').innerHTML = htmlString;
	
	//function that appends a spotify widget for the selected playlist
	spotifyPlaylist = function(playlistUri){
		var height = screen.height/3;
		var width = screen.width/6;
		var widgetString = "<iframe src='https://embed.spotify.com/?uri=" + playlistUri + "' width='" + width + "' height='" + height + "' frameborder='0' allowtransparency='true'></iframe>";
		document.getElementById('spotifyPlaylist').innerHTML = widgetString;
	}
	
	$(document).ready(function(){
		//async function that creates a playlist
		$('#createPlaylistButton').click(function(){
			//capure the name the user chose for the playlist
			var playlistName = $('#createPlaylistName').val();
			//post the data to the main controller and then reload the page
			$.post("/bubbaLyrics/index.php?action=createPlaylist",
			{
				playlistName: playlistName
			},
			function(data, status){
				window.location.assign("/bubbaLyrics/index.php?action=profile");
			});	
		});
		
		//clear previous feedback when the user clicks the update playlist button
		$('#updatePlaylistModal').click(function(){
			$('#updatePlaylistFeedback').html("<p></p>");
		});
		
		//function that update a spotify playlist
		updateSpotifyPlaylist = function(playlistId, playlistName){
			//reset any previous feedback, strip any previous event listeners, and capture the old playlist name
			$('#updatePlaylistFeedback').html("<p></p>");
			$('#updatePlaylistButton').off();
			$('#updatePlaylistName').val(playlistName);	
			//when the update button inside the modal is clicked, post the data to the controller
			$('#updatePlaylistButton').on("click", function(){
				//capture the new playlist name
				var updatePlaylistName = $('#updatePlaylistName').val();
				//send the data to the controller
				$.post("/bubbaLyrics/index.php?action=updatePlaylist",
					{
						playlistName: updatePlaylistName,
						playlistId: playlistId
					},
				//if there was an error display the error message, or else hide the modal and reload the page
				function(data, status){
					//data will only exist if there was an error
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