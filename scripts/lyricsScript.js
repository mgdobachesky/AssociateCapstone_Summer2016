(function() {
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
			contentType: 'application/json',
			success: function(data) {
				//console.log(data);
				document.getElementById('lyricTitle').innerText = data.message.body.track.artist_name;
				document.getElementById('albumTitle').innerText = data.message.body.track.album_name;
				document.getElementById('songTitle').innerText = data.message.body.track.track_name;
				getLyric(data.message.body.track.track_id);				
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			} 
		});
	}
	
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
			contentType: 'application/json',
			success: function(data) {
				//console.log(data);
				var htmlString = data.message.body.lyrics.lyrics_body;
				//console.log(htmlString);
				if(htmlString != "") {
					document.getElementById('lyricSpace').innerText = htmlString;	
				} else {
					document.getElementById('lyricSpace').innerText = "No lyrics on file for this track";
				}
				
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			} 
		});
	}

$(document).ready(function(){
	songId = localStorage.getItem("songId");
	//console.log(songId);
	getSong(songId);
});
}())