(function() {
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
							window.location.assign("/bubbaLyrics/index.php");
						});
					}
				}
				if(valPassword != valRePassword || valPassword == "") {
					document.getElementById('signUpFeedback').innerHTML += "Password was retyped incorrectly <br />";
				}
				if(valEmail != valReEmail || valEmail == "") {
					document.getElementById('signUpFeedback').innerHTML += "Email was retyped incorrectly <br />";
				}
				event.preventDefault();
			});
		});
	});
}())