(function() {
	$(document).ready(function(){
		$('#searchClick').on('click', function(event){
			var searchContent = document.getElementById('searchContent').value;
			//console.log(searchContent);
			localStorage.setItem("searchContent", searchContent);
			window.location.assign("/bubbaLyrics/index.php?action=searchResults");
				
			event.preventDefault();
		});
	});
}())