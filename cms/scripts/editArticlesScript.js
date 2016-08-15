(function() {
	$(function(){
		//create a dropdown list containing a number for each of the articles
		$(".dropdown-menu li a").click(function(){
			$("#hiddenArticle").val($(this).text());
			$("#chooseArticle").html($(this).text() + ' <span class="caret"></span>');
			//when an article is chosen from the list, invoke an ajax call that gets information on that article
			$.ajax({
				url: "/bubbaLyrics/cms/index.php?action=getArticle",
				method: "POST",
				data: ({getArticleNumber: $(this).text()})
			})
			//after information on an article is retrieved, dynamically display in on the page
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
			//escaped is a function that replaces newline characters, tabs, and returns with a json-readable equivilent
			escaped = function (str) {
				return str.replace(/[\n]/g, '\\n').replace(/[\r]/g, '\\r').replace(/[\t]/g, '\\t'); 
			};
		});
		//if a user choses to cancel updating an article, he is redirected to the home page
		$("#cancelArticles").on('click', function(event){
				window.location.assign("/bubbaLyrics/cms/index.php");
				event.preventDefault();
		});
	});
}())