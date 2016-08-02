//*************************************************************************************************************************
//The purpose of this script is to get the search string from the headerScript and display a list of results
//Get the search string, then use it to generate data based on artists that match in some way
//The information is then used to create a list of clickable links
//When a link is clicked, the artist id is stored and the user is redirected to the artist page
//*************************************************************************************************************************

(function() {
	//append to the nav bar the breadcrumbs for this page
	htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li class='active'>Search</li>";
	document.getElementById('breadCrumbs').innerHTML = htmlString;

	//get a result set based on the text that the user decided to search with
	getContent = function(pageNum, searchContent){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				q_artist:searchContent,
				s_artist_rating:"DESC",
				page:pageNum,
				page_size:12,
				format:"jsonp",
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/artist.search?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json'
		})
		.done(function(data){
			fillLetter(data);
		});
	}
	
	//use the result set to create a list of matched songs as clickable links
	fillLetter = function(data) {
		document.getElementById('tblSearchResults').innerHTML = "";
		for(var i = 0; i < data.message.body.artist_list.length; i++){
			var htmlString = "<tr>";
			htmlString += "<td><a href='javascript: linkSearchClick(" + data.message.body.artist_list[i].artist.artist_id + "," + "\"" + data.message.body.artist_list[i].artist.artist_mbid + "\"" + ")'>" + data.message.body.artist_list[i].artist.artist_name + "</a></td>";
			htmlString += "</tr>";
			document.getElementById('tblSearchResults').innerHTML += htmlString;
		}
	}
	
	//when a link has been clicked, store the id for that artist then redirect the user to the the artist page
	linkSearchClick = function(artistId, artistMbid) {
		localStorage.setItem("artistId", artistId);
		localStorage.setItem("artistMbid", artistMbid);
		window.location.assign("/bubbaLyrics/index.php?action=artist");
	}

	$(document).ready(function(){
		//set the page number for the result set to 1
		var pageNum = 1;
		
		//get the text that the user typed into the textbox, which was saved to local storage in the headerScript
		searchContent = localStorage.getItem("searchContent");
		
		//run a function that gets a result set based on what a user searched, starting with the first page of results
		getContent(pageNum, searchContent);
		
		//when the previous button is clicked, display the previous page of results
		$('#lnkSearchPrev').click(function(event){
			if(pageNum == 0){
				pageNum = 1;
			}
			getContent(--pageNum, searchContent);
		});
		
		//when the next button is clicked, display the next page of results
		$('#lnkSearchNxt').click(function(event){
			if(pageNum == 0){
				pageNum = 1;
			}
			getContent(++pageNum, searchContent);
		});
	});
}())