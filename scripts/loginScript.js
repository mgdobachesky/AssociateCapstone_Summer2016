(function() {
	$(document).ready(function(){
		$(function(){
			$('#loginForm').on('submit', function(event){
				document.getElementById('loginFeedback').innerHTML = "";
				var loginDetails = $(this).serialize();
				//console.log(signUp);
				$.ajax({
					url: "/bubbaLyrics/index.php?action=loggingIn",
					method: "POST",
					data: loginDetails
				})
				.done(function(data){
					//console.log(data);
					if(data == ""){
						window.location.assign("/bubbaLyrics/index.php");
					} else {
						document.getElementById('loginFeedback').innerHTML = data;
					}
				});
				event.preventDefault();
			});
		});
	});
}())