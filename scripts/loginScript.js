//*************************************************************************************************************************
//The purpose of this script is to either log a user in or display appropriate error messages
//*************************************************************************************************************************

(function() {
	//append to the nav bar the breadcrumbs for this page
	htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li class='active'>Login</li>";
	document.getElementById('breadCrumbs').innerHTML = htmlString;
	
	$(document).ready(function(){
		//get login data and determine if it is valid or not
		$(function(){
			$('#loginForm').on('submit', function(event){
				document.getElementById('loginFeedback').innerHTML = "";
				var loginDetails = $(this).serialize();
				$.ajax({
					url: "/bubbaLyrics/index.php?action=loggingIn",
					method: "POST",
					data: loginDetails
				})
				.done(function(data){
					if(data == ""){
						//if user exists, login and redirect to home page
					   window.location.assign("/bubbaLyrics/index.php");
                        
					} else {
						//if user does not exist, display appropriate feedback
						document.getElementById('loginFeedback').innerHTML = data;   
					}
                    
				});
				event.preventDefault();
			});
		});
	});
}())