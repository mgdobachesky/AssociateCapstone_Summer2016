(function() {
var fromWhere = "top";
localStorage.setItem("fromWhere", fromWhere);
	
htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li class='active'>Top Artists</li>";
document.getElementById('breadCrumbs').innerHTML = htmlString;
	
fillLetter = function(data) {
	document.getElementById('tblArtists').innerHTML = "";
	for(var i = 0; i < data.message.body.artist_list.length; i++){
		var htmlString = "<tr>";
		htmlString += "<td><a href='javascript: linkClick(" + data.message.body.artist_list[i].artist.artist_id + ")'>" + data.message.body.artist_list[i].artist.artist_name + "</a></td>";
		htmlString += "</tr>";
		document.getElementById('tblArtists').innerHTML += htmlString;
	}
}

linkClick = function(artistId) {
	localStorage.setItem("artistId", artistId);
	window.location.assign("/bubbaLyrics/index.php?action=artist");
}

getData = function(pageNum){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				s_artist_rating:"DESC",
				country:"US",
				page:pageNum,
				page_size:"12",
				format:"jsonp",
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/chart.artists.get?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json'
		})
		.done(function(data){
			//console.log(data);
			fillLetter(data);
		});
	}

$(document).ready(function(){
	var pageNum = 1;
	getData(pageNum);
    
	
	$('#lnkPrev').click(function(event){
		if(pageNum == 0){
			pageNum = 1;
		}
		getData(--pageNum);
	});
	
	$('#lnkNxt').click(function(event){
		if(pageNum == 0){
			pageNum = 1;
		}
		getData(++pageNum);
	});
});
}())