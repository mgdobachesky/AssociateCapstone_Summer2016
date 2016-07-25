//Accordion JQuery
$(function() {
	$(document).ready(function(){
		htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li class='active'>Profile</li>";
		document.getElementById('breadCrumbs').innerHTML = htmlString;
		
		var icons = {
			header: "ui-icon-circle-arrow-e",
			activeHeader: "ui-icon-circle-arrow-s"
		};
		$( "#accordion" ).accordion({
			icons: icons
		});
		$( "#toggle" ).button().click(function() {
			if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
				$( "#accordion" ).accordion( "option", "icons", null );
			} else {
				$( "#accordion" ).accordion( "option", "icons", icons );
			}
		});
	});
}())