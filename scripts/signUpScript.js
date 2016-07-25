(function() {
	$(document).ready(function(){
		$(function(){
			$('#signUpForm').on('submit', function(event){
				var signUp = $(this).serialize();
				//console.log(signUp);
				$.ajax({
					url: "/bubbaLyrics/index.php?action=signUpDetails",
					method: "POST",
					data: signUp
				})
				.done(function(data){
					window.location.assign("/bubbaLyrics/index.php?action=home");
				});
				event.preventDefault();
			});
		});
	});
}())