<?php 
if ($_SESSION['userId'] == NULL || empty($_SESSION['userId'])) {
	include("/views/cmsLogin.php");
} 
?>

<?php if ($_SESSION['userId'] != NULL || !empty($_SESSION['userId'])) { ?>
<script type="text/javascript" src="/bubbaLyrics/cms/scripts/editArticlesScript.js"></script>
<div class="container-fluid">
	<div class="row">
		<div id="editArticleSpace"><div class="col-md-4"></div></div>
		<div class="col-md-4">
			<fieldset>
				<legend>Edit Articles</legend>
				<form role="form" id="uploadForm" name="uploadForm" action="." method="post" enctype="multipart/form-data">
				<label>File Upload</label><br />
					<div class="form-group" id="uplArticle">
						<label class="btn btn-default btn-file">
							Browse <input type="file" id="articleFileUpload" name="articleFileUpload" style="display: none;" onchange='$("#upload-file-info").html($(this).val());'>
						</label>
						&nbsp;
						<span class='label label-info' id="upload-file-info"></span>
					</div>
					<div class="dropdown" id="ddlArticle">
						<button class="btn btn-primary dropdown-toggle" id="chooseArticle" name="chooseArticle" type="button" data-toggle="dropdown">Article Number <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
						</ul>
					</div>
					<input type="hidden" name="hiddenArticle" id="hiddenArticle">
					<div class="form-group">
						<label for="fileDescription">File Description</label>
						<input type="text" class="form-control" id="fileDescription" name="fileDescription" maxlength="40" placeholder="Enter a description...">
					</div>
					<div class="form-group">
						<label for="fileDescription">Article</label>
						<input type="text" class="form-control" id="articleTitle" name="articleTitle" maxlength="40" placeholder="Enter an article title...">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="5" id="articleContent" name="articleContent" placeholder="Enter article content..."></textarea>
					</div>
					<input type="hidden" name="action" value="uploadArticleFile">
					<input type="submit" value="Upload" id="submitArticle" class="btn btn-primary" />
					<input type="button" name="cancelArticles" id="cancelArticles" value="Cancel" class="btn btn-primary" />
				</form>
			</fieldset>
		</div>
		<div class="col-md-4">
			<div id="currentPicture"></div>
			<div id="selectedPicture"></div>
		</div>
	</div>
</div>
<?php } ?>