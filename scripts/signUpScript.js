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
				
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				//the nested if conditional statements could probably be compressed to one
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				
				//send data to be placed in database if it passes the required conditions
				if(valPassword == valRePassword && valEmail == valReEmail){
					if(valEmail != "" && valPassword != ""){
						$.ajax({
							url: "/bubbaLyrics/index.php?action=signUpDetails",
							method: "POST",
							data: signUp
						})
						
						//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
						//if the username or email the username selected already exitst then the user account will not be created and the user will not log in
						//this is because the email or username column in the database is unique
						//therefore, on index.php, when the script attempts to sign in the user he will not be signed in and "1" will be returned for the value of varStuff
						//this causes some problems, for instance a blank field is added to the database if a user attempts to sign up with and existing email or username
						//this method should be changed to work in a better way
						//maybe run a query looking for the username or email before it is added, then only add it if no results are found, else the display error message
						//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
						
						//send data to controller to automatically sign in the user
						.done(function(data){
							$.post("/bubbaLyrics/index.php?action=signUpLog", signUp)
							.done(function(varStuff){
								if(varStuff == "0"){
									window.location.assign("/bubbaLyrics/index.php");
								}
								else {
									document.getElementById('signUpFeedback').innerHTML += "Error: That email is already in use <br>";
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