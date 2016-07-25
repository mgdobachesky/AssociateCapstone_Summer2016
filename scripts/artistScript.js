getArtist = function(artistId, pageNum){
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
				//console.log(data);
				document.getElementById('songName').innerHTML = data.message.body.artist.artist_name;
				getAlbums(data, pageNum);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			} 
		});
	}
	
getAlbums = function(data, pageNum){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				artist_id:data.message.body.artist.artist_id,
				g_album_name:"true",
				s_release_date:"DESC",
				format:"jsonp",
				page_size:"10",
				page:pageNum,
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/artist.albums.get?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json',
			success: function(data) {
				//console.log(data);
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
				page_size:"100",
				page:"1",
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/album.tracks.get?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json',
			success: function(data) {
				//console.log(data);
				fillSongs(data);
				document.getElementById('albumName').innerHTML = data.message.body.track_list[0].track.album_name;
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
		htmlString += "<td><a href='javascript: albumClick(" + data.message.body.album_list[i].album.album_id + ")'>" + data.message.body.album_list[i].album.album_name + "</a></td>";
		htmlString += "</tr>";
		document.getElementById('tblAlbums').innerHTML += htmlString;
	}
}

fillSongs = function(data) {
	document.getElementById('tblSongs').innerHTML = "";
	for(var i = 0; i < data.message.body.track_list.length; i++){
		var htmlString = "<tr>";
		htmlString += "<td><a href='javascript: songClick(" + data.message.body.track_list[i].track.track_id + ")'>" + data.message.body.track_list[i].track.track_name + "</a></td>";
		htmlString += "</tr>";
		document.getElementById('tblSongs').innerHTML += htmlString;
	}
}

storeSongId = function(songId) {
	//console.log(data);
	localStorage.setItem("songId", songId);
	window.location.assign("lyrics.html");
}

albumClick = function(albumId) {
	//console.log(albumId);
	getTrack(albumId);
}

songClick = function(songId) {
	//console.log(songId);
	storeSongId(songId);
}
	
$(document).ready(function(){
	var pageNum = 1;
	artistId = localStorage.getItem("artistId");
	getArtist(artistId, pageNum);
	
	$('#albumPrev').click(function(event){
		if(pageNum == 0){
			pageNum = 1;
		}
		getArtist(artistId, --pageNum);
	});
	
	$('#albumNxt').click(function(event){
		if(pageNum == 0){
			pageNum = 1;
		}
		getArtist(artistId, ++pageNum);
	});
	
});