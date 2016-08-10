(function() {
	$(function(){
		$(".dropdown-menu li a").click(function(){
			$("#hiddenArticle").val($(this).text());
			$("#chooseArticle").html($(this).text() + ' <span class="caret"></span>');
			$.ajax({
				url: "/bubbaLyrics/cms/index.php?action=getArticle",
				method: "POST",
				data: ({getArticleNumber: $(this).text()})
			})
			.done(function(data){
				escapedData = escaped(data);
				var obj = JSON.parse(escapedData);
				$("#currentPicture").html("<label>Current Picture:</label>");
				$("#selectedPicture").html("<img src='/bubbaLyrics/cms/images/" + obj.articlePictureLink + "' class='img-responsive' alt='" + obj.pictureDescription + "' />");
				$("#fileDescription").val(obj.pictureDescription);
				$("#articleTitle").val(obj.articleTitle);
				$("#articleContent").val(obj.articleContent);
				$("#editArticleSpace").html("<div class='col-md-2'></div>");
			});
			
			escaped = function (str) {
				return str.replace(/[\n]/g, '\\n').replace(/[\r]/g, '\\r').replace(/[\t]/g, '\\t'); 
			};
		});
		
		$("#cancelArticles").on('click', function(event){
				window.location.assign("/bubbaLyrics/cms/index.php");
				event.preventDefault();
		});
	});
}())