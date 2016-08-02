//*************************************************************************************************************************
//The purpose of this script is to grab the data from the sign-up form and, if verified, add the user to the database
//If all goes successfully, the user should also automatically be logged in
//*************************************************************************************************************************

(function() {
	//append to the nav bar the breadcrumbs for this page
	htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li class='active'>Sign Up</li>";
	document.getElementById('breadCrumbs').innerHTML = htmlString;

	$(document).ready(function(){
		$(function(){
			//when the submit button is clicked, verify the information and add the user to the database if conditions are met
			$('#signUpForm').on('submit', function(event){
				//clear previous feedback and get form information
				document.getElementById('signUpFeedback').innerHTML = "";
				var signUp = $(this).serialize();
				var valPassword = document.forms["signUpForm"]["pwd"].value;
				var valRePassword = document.forms["signUpForm"]["rePwd"].value;
				var valEmail = document.forms["signUpForm"]["email"].value;
				var valReEmail = document.forms["signUpForm"]["reEmail"].value;
				
				//send data to be placed in database if it passes the required conditions
				if(valPassword == valRePassword && valEmail == valReEmail){
					if(valEmail != "" && valPassword != ""){
						$.ajax({
							url: "/bubbaLyrics/index.php?action=signUpDetails",
							method: "POST",
							data: signUp
						})
						//send data to controller to automatically sign in the user
						.done(function(data){
							$.post("/bubbaLyrics/index.php?action=loggingIn", signUp)
							.done(function(data){
								if(data == ""){
								//if email does not exist, sign up and redirect to home page
								   window.location.assign("/bubbaLyrics/index.php");
									
								} else {
									//if email does exist, display appropriate feedback
									document.getElementById('signUpFeedback').innerHTML = data;   
								}
							});
						});
					}
				}
				
				//if there was a problem matching the verification fields, display a message telling the user what something didn't work
				if(valPassword != valRePassword || valPassword == "") {
					document.getElementById('signUpFeedback').innerHTML += "Error: Password was retyped incorrectly <br>";
				}
				if(valEmail != valReEmail || valEmail == "") {
					document.getElementById('signUpFeedback').innerHTML += "Error: Email was retyped incorrectly";
				}
                
				event.preventDefault();
			});
		});
	});
}())