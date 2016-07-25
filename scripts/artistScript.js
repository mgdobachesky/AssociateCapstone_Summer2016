getArtist = function(artistId){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				artist_id:artistId,
				format:"jsonp",
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/artist.get?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json',
			success: function(data) {
				console.log(data);
				getAlbums(data);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			} 
		});
	}
	
getAlbums = function(data){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				artist_id:data.message.body.artist.artist_id,
				g_album_name:"true",
				s_release_date:"DESC",
				format:"jsonp",
				page_size:"20",
				page:"1",
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/artist.albums.get?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json',
			success: function(data) {
				console.log(data);
				fillAlbums(data);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			} 
		});
	}	
	
getTrack = function(albumId){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				album_id:albumId,
				format:"jsonp",
				page_size:"20",
				page:"1",
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/album.tracks.get?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json',
			success: function(data) {
				console.log(data);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			} 
		});
	}
	
fillAlbums = function(data) {
	document.getElementById('tblAlbums').innerHTML = "";
	for(var i = 0; i < data.message.body.album_list.length; i++){
		var htmlString = "<tr>";
		htmlString += "<td><a href='javascript: linkClick(" + data.message.body.album_list[i].album.album_id + ")'>" + data.message.body.album_list[i].album.album_name + "</a></td>";
		htmlString += "</tr>";
		document.getElementById('tblAlbums').innerHTML += htmlString;
	}
}

linkClick = function(albumId) {
	console.log(albumId);
	getTrack(albumId);
}
	
$(document).ready(function(){
	artistId = localStorage.getItem("artistId");
	getArtist(artistId);
});