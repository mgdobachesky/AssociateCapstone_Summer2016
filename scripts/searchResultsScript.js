(function() {
	htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li class='active'>Search</li>";
	document.getElementById('breadCrumbs').innerHTML = htmlString;
	
	fillLetter = function(data) {
	document.getElementById('tblSearchResults').innerHTML = "";
	for(var i = 0; i < data.message.body.artist_list.length; i++){
		var htmlString = "<tr>";
		htmlString += "<td><a href='javascript: linkSearchClick(" + data.message.body.artist_list[i].artist.artist_id + ")'>" + data.message.body.artist_list[i].artist.artist_name + "</a></td>";
		htmlString += "</tr>";
		document.getElementById('tblSearchResults').innerHTML += htmlString;
	}
}

linkSearchClick = function(artistId) {
	localStorage.setItem("artistId", artistId);
	window.location.assign("/bubbaLyrics/index.php?action=artist");
}

getContent = function(pageNum, searchContent){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				q_artist:searchContent,
				s_artist_rating:"DESC",
				page:pageNum,
				page_size:"12",
				format:"jsonp",
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/artist.search?",
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
	searchContent = localStorage.getItem("searchContent");
	getContent(pageNum, searchContent);
	
	$('#lnkSearchPrev').click(function(event){
		if(pageNum == 0){
			pageNum = 1;
		}
		getContent(--pageNum, searchContent);
	});
	
	$('#lnkSearchNxt').click(function(event){
		if(pageNum == 0){
			pageNum = 1;
		}
		getContent(++pageNum, searchContent);
	});
});
}())