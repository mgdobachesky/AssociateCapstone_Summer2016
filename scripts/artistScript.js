//*************************************************************************************************************************
//The purpose of this script is to get the artist id that was put in localstorage by the findArtist script 
//After that, use the id to pull up information on the artist, displaying his/her ablums as clickable links
//When an album is clicked it will display songs as clickable links
//When a song is clicked the song link will be stored in local storage to be used later by the lyricsScript
//*************************************************************************************************************************

(function() {
	//get and use the fromWhere variable to determine what breadcrumbs to display
	var fromWhere = localStorage.getItem("fromWhere");
	
	//append to the nav bar the breadcrumbs for this page
	if (fromWhere == "top") {
		htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li><a href='/bubbaLyrics/index.php?action=findArtist'>Top Artists</a></li><li class='active'>Artist</li>";
		document.getElementById('breadCrumbs').innerHTML = htmlString;	
	}
	else {
		htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li><a href='/bubbaLyrics/index.php?action=searchResults'>Search</a></li><li class='active'>Artist</li>";
		document.getElementById('breadCrumbs').innerHTML = htmlString;	
	}
		
	//get information on the artist such as picture and bio, then post on the artist page
	artistInfo = function(artistMbid) {
		$.ajax({
			type: "GET",
			url: "http://ws.audioscrobbler.com/2.0/",
			data: {
				method: "artist.getinfo",
				mbid: artistMbid,
				api_key: "eb771d0706bad3455c555dc8b00f4235",
				format: "json"
			},
			dataType: "jsonp"
		})
		.done(function(data){
			var img = document.createElement("img");
			img.src = data.artist.image[3]['#text'];
			var src = document.getElementById("artistPic");
			src.appendChild(img);
			
			var bioString = "<p>" + data.artist.bio.content +"</p>";
			document.getElementById('artistBio').innerHTML = bioString;	
		});
	}
		
	//get information on an artist and pass the data to a function that gets the artist's albums
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
			contentType: 'application/json'
		})
		.done(function(data){
			document.getElementById('artistName').innerHTML = data.message.body.artist.artist_name;
			getAlbums(data, pageNum);
		});
	}
	
	//use the artist id to get all of his/her albums and pass them to a function that displays them
	//use the page number to determine what page of albums is displayed
	getAlbums = function(data, pageNum){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				artist_id:data.message.body.artist.artist_id,
				g_album_name:1,
				s_release_date:"DESC",
				format:"jsonp",
				page_size:10,
				page:pageNum,
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/artist.albums.get?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json'
		})
		.done(function(data){
			fillAlbums(data);
		});
	}	
	
	//display the list of albums for an artist as clickable links
	fillAlbums = function(data) {
		document.getElementById('tblAlbums').innerHTML = "";
		for(var i = 0; i < data.message.body.album_list.length; i++){
			var htmlString = "<tr>";
			//if the album only has one song, display the word "single" next to it
			if(data.message.body.album_list[i].album.album_release_type == "Single"){
				htmlString += "<td><a href='javascript: albumClick(" + data.message.body.album_list[i].album.album_id + "," + "\"" + data.message.body.album_list[i].album.album_mbid + "\"" + ")'>" + data.message.body.album_list[i].album.album_name + " (Single)</a></td>";
			} else {
				htmlString += "<td><a href='javascript: albumClick(" + data.message.body.album_list[i].album.album_id + "," + "\"" + data.message.body.album_list[i].album.album_mbid + "\"" + ")'>" + data.message.body.album_list[i].album.album_name + "</a></td>";
			}
			htmlString += "</tr>";
			document.getElementById('tblAlbums').innerHTML += htmlString;
		}
	}
	
	//when an album link is clicked, run a function that gets and displays information for that album
	albumClick = function(albumId, albumMbid) {
		localStorage.setItem("albumId", albumId);
		localStorage.setItem("albumMbid", albumMbid);
		getTracks(albumId);
	}
		
	//get the data of all the songs that the passed in album has
	getTracks = function(albumId){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				album_id:albumId,
				f_has_lyrics:1,
				format:"jsonp",
				page_size:100,
				page:1,
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/album.tracks.get?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json'
		})
		.done(function(data){
			fillSongs(data);
			//try to display the tracks, or else display the the text "No tracks on record for this album"
			try {
				document.getElementById('albumName').innerHTML = data.message.body.track_list[0].track.album_name;
			}
			catch(error) {
				document.getElementById('albumName').innerHTML = "No tracks on record for this album";
			}
		});
	}

	//create a list of clickable links for each of the songs the specified album has
	fillSongs = function(data) {
		document.getElementById('tblSongs').innerHTML = "";
		for(var i = 0; i < data.message.body.track_list.length; i++){
			var htmlString = "<tr>";
			htmlString += "<td><a href='javascript: songClick(" + data.message.body.track_list[i].track.track_id + "," + "\"" + data.message.body.track_list[i].track.track_mbid + "\"" +")'>" + data.message.body.track_list[i].track.track_name + "</a></td>";
			htmlString += "</tr>";
			document.getElementById('tblSongs').innerHTML += htmlString;
		}
	}

	//store the chosen song's id in local storage for use in the lyricsScript, then redirect the use to the lyrics page
	songClick = function(songId, songMbid) {
		localStorage.setItem("songId", songId);
		localStorage.setItem("songMbid", songMbid);
		window.location.assign("/bubbaLyrics/index.php?action=lyrics");
	}
	
	$(document).ready(function(){
		//set the page number to one and get the artist id
		var pageNum = 1;
		artistId = localStorage.getItem("artistId");
		artistMbid = localStorage.getItem("artistMbid");
		
		//function that gets information on the artist
		artistInfo(artistMbid);
		
		//use the artist id to get and display information about the selected artist
		//pass in the page number to be used later to determine what page of albums to display
		getArtist(artistId, pageNum);
	   
		//when the previous button is clicked, get information on the artist
		//pass in the previous page of albums to be used in a later function
		$('#albumPrev').click(function(event){
			if(pageNum == 0){
				pageNum = 1;
			}
			getArtist(artistId, --pageNum);
		});
		
		//when the next button is clicked, get information on the artist
		//pass in the next page of albums to be used in a later function
		$('#albumNxt').click(function(event){
			if(pageNum == 0){
				pageNum = 1;
			}
			getArtist(artistId, ++pageNum);
		});
		
	});
}())