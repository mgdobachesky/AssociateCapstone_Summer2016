$(function(){
	$('#signUpForm').on('submit', function(event){
		var signUp = $(this).serialize();
		//console.log(signUp);
		$.ajax({
			url: "/bubbaLyrics/index.php?action=signUp",
			method: "POST",
			data: signUp
		})
		.done(function(data){
			
		});
		event.preventDefault();
	});
});

$(document).ready(function(){
	
});