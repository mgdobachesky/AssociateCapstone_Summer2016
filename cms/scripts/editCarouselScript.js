(function() {
	$(function(){
		$(".dropdown-menu li a").click(function(){
			$("#hiddenSlide").val($(this).text());
			$("#chooseSlide").html($(this).text() + ' <span class="caret"></span>');
			$.ajax({
				url: "/bubbaLyrics/cms/index.php?action=getPicture",
				method: "POST",
				data: ({getSlide: $(this).text()})
			})
			.done(function(data){
				var obj = JSON.parse(data);
				$("#currentPicture").html("<label>Current Picture:</label>");
				$("#selectedPicture").html("<img src='/bubbaLyrics/cms/images/" + obj.slideLink + "' class='img-responsive' alt='" + obj.slideDescription + "' />");
			});
		});
	});
}())