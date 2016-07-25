(function() {
	htmlString = "<li><a href='/bubbaLyrics/index.php'>Home</a></li><li class='active'>Sign Up</li>";
	document.getElementById('breadCrumbs').innerHTML = htmlString;

	$(document).ready(function(){
		$(function(){
			$('#signUpForm').on('submit', function(event){
				document.getElementById('signUpFeedback').innerHTML = "";
				var signUp = $(this).serialize();
				var valPassword = document.forms["signUpForm"]["pwd"].value;
				var valRePassword = document.forms["signUpForm"]["rePwd"].value;
				var valEmail = document.forms["signUpForm"]["email"].value;
				var valReEmail = document.forms["signUpForm"]["reEmail"].value;
				if(valPassword == valRePassword && valEmail == valReEmail){
					if(valEmail != "" && valPassword != ""){
						$.ajax({
							url: "/bubbaLyrics/index.php?action=signUpDetails",
							method: "POST",
							data: signUp
						})
						.done(function(data){
							$.post("/bubbaLyrics/index.php?action=signUpLog", signUp)
							.done(function(varStuff){
								//alert(varStuff);
								if(varStuff == "0"){
									window.location.assign("/bubbaLyrics/index.php");
								}
								else {
									document.getElementById('signUpFeedback').innerHTML += "Error: That username has already been taken <br>";
								}
							});
							//alert("Thanks for signing up! You will now be redirected to the home page.");
						});
                        
					}
				}
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