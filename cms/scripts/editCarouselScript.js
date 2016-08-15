(function() {
	$(function(){
		//create a dropdown list with a number for each carousel picture
		$(".dropdown-menu li a").click(function(){
			$("#hiddenSlide").val($(this).text());
			$("#chooseSlide").html($(this).text() + ' <span class="caret"></span>');
			//when a picture is chosen from the dropdown, invoke an ajax call that gets information on that carousel slide
			$.ajax({
				url: "/bubbaLyrics/cms/index.php?action=getPicture",
				method: "POST",
				data: ({getSlide: $(this).text()})
			})
			//after information is retrieved, dynamically display it on the web page
			.done(function(data){
				var obj = JSON.parse(data);
				$("#currentPicture").html("<label>Current Picture:</label>");
				$("#selectedPicture").html("<img src='/bubbaLyrics/cms/images/" + obj.slideLink + "' class='img-responsive' alt='" + obj.slideDescription + "' />");
				$("#fileDescription").val(obj.slideDescription);
				$("#editCarouselSpace").html("<div class='col-md-2'></div>");
			});
		});
		//if the user chooses to cancel updating the carousel, redirect him to the home page
		$("#cancelCarousel").on('click', function(event){
			window.location.assign("/bubbaLyrics/cms/index.php");
			event.preventDefault();
		});
	});
}())