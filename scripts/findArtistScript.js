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
	console.log(artistId);
}

getData = function(regEx, pageNum){
		$.ajax({
			type: "GET",
			data: {
				apikey:"74a4faf48aaa62dbbaa400179d5fc478",
				q_artist:regEx,
				s_artist_rating:"DESC",
				page:pageNum,
				page_size:"20",
				format:"jsonp",
				callback:"jsonp_callback"
			},
			url: "http://api.musixmatch.com/ws/1.1/artist.search?",
			dataType: "jsonp",
			jsonpCallback: 'jsonp_callback',
			contentType: 'application/json',
			success: function(data) {
				console.log(data);
				fillLetter(data);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			} 
		});
	}

$(document).ready(function(){
	var pageNum = 1;
	var idRec = "";
	var regRec = "";
	var clickFunc = {id:['#lstA', '#lstB', '#lstC', '#lstD', '#lstE', '#lstF', '#lstG', '#lstH', '#lstI', '#lstJ', '#lstK', '#lstL', '#lstM', '#lstN', '#lstO', '#lstP', '#lstQ', '#lstR', '#lstS', '#lstT', '#lstU', '#lstV', '#lstW', '#lstX', '#lstY', '#lstZ'], reg:['/^[aA]/', '/^[bB]/', '/^[cC]/', '/^[dD]/', '/^[eE]/', '/^[fF]/', '/^[gG]/', '/^[hH]/', '/^[iI]/', '/^[jJ]/', '/^[kK]/', '/^[lL]/', '/^[mM]/', '/^[nN]/', '/^[oO]/', '/^[pP]/', '/^[qQ]/', '/^[rR]/', '/^[sS]/', '/^[tT]/', '/^[uU]/', '/^[vV]/', '/^[wW]/', '/^[xX]/', '/^[yY]/', '/^[zZ]/']};
	for(var i = 0; i < clickFunc.id.length; i++){
		$(clickFunc.id[i]).click({param: clickFunc.reg[i]}, function(event){
			getData(event.data.param, pageNum);
			idRec = "lst" + event.target.childNodes[0].textContent;
			regRec = event.data.param;
		});
	}
	
	$('#lnkPrev').click(function(event){
		if(pageNum == 0){
			pageNum = 1;
		}
		if(regRec!= ""){
			getData(regRec, --pageNum);
		}
	});
	$('#lnkNxt').click(function(event){
		if(pageNum == 0){
			pageNum = 1;
		}
		if(regRec != ""){
			getData(regRec, ++pageNum);
		}
	});
});