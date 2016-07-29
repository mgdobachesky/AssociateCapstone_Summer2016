//*************************************************************************************************************************
//The purpose of this script is to get a list of artists and display them on the find artists page as a set of links
//From there the user will be able to click an artist and be redirected to that specific artists page
//*************************************************************************************************************************

(function() {
	//fromWhere used to determine how the breadcrumbs will be set later on
	var fromWhere = "top";
	localStorage.setItem("fromWhere", fromWhere);
		
	//append to the nav bar the breadcrumbs for this page
	htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li class='active'>Top Artists</li>";
	document.getElementById('breadCrumbs').innerHTML = htmlString;
		
	//display each artist from the dataset as a clickable link
	fillLetter = function(data) {
		document.getElementById('tblArtists').innerHTML = "";
		for(var i = 0; i < data.message.body.artist_list.length; i++){
			var htmlString = "<tr>";
			htmlString += "<td><a href='javascript: linkClick(" + data.message.body.artist_list[i].artist.artist_id + ")'>" + data.message.body.artist_list[i].artist.artist_name + "</a></td>";
			htmlString += "</tr>";
			document.getElementById('tblArtists').innerHTML += htmlString;
		}
	}

	//when an artist link has been clicked, save that artist id in local storage and then redirect to the artist page
	linkClick = function(artistId) {
		localStorage.setItem("artistId", artistId);
		window.location.assign("/bubbaLyrics/index.php?action=artist");
	}

	//get information from an API, then run another function with that data as input
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
			fillLetter(data);
		});
	}

	$(document).ready(function(){
		//display the list of artists, starting with the first page
		var pageNum = 1;
		getData(pageNum);
		
		//display the previous list of artists when previous is clicked
		$('#lnkPrev').click(function(event){
			if(pageNum == 0){
				pageNum = 1;
			}
			getData(--pageNum);
		});
		
		//display the next list of artists when next is clicked
		$('#lnkNxt').click(function(event){
			if(pageNum == 0){
				pageNum = 1;
			}
			getData(++pageNum);
		});
	});
}())