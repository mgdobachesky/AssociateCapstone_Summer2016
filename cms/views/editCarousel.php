<?php 
if ($_SESSION['userId'] == NULL || empty($_SESSION['userId'])) {
	include("/views/cmsLogin.php");
} 
?>

<?php if ($_SESSION['userId'] != NULL || !empty($_SESSION['userId'])) { ?>
<script type="text/javascript" src="/bubbaLyrics/cms/scripts/editCarouselScript.js"></script>
<div class="container-fluid">
	<div class="row">
		<div id="editCarouselSpace"><div class="col-md-4"></div></div>
		<div class="col-md-4">
			<fieldset>
				<legend>Edit Carousel</legend>
				<form role="form" id="uploadForm" name="uploadForm" action="." method="post" enctype="multipart/form-data">
				<label>File Upload</label><br />
					<div class="form-group" id="uplCarousel">
						<label class="btn btn-default btn-file">
							Browse <input type="file" id="carouselFileUpload" name="carouselFileUpload" style="display: none;" onchange='$("#upload-file-info").html($(this).val());'>
						</label>
						&nbsp;
						<span class='label label-info' id="upload-file-info"></span>
					</div>
					<div class="dropdown" id="ddlSlide">
						<button class="btn btn-primary dropdown-toggle" id="chooseSlide" name="chooseSlide" type="button" data-toggle="dropdown">Slide Number <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
						</ul>
					</div>
					<input type="hidden" name="hiddenSlide" id="hiddenSlide">
					<div class="form-group">
						<label for="desc">File Description</label>
						<input type="text" class="form-control" id="fileDescription" name="fileDescription" placeholder="Enter a description...">
					</div>
					<input type="hidden" name="action" value="uploadCarouselFile">
					<input type="submit" value="Upload" id="submitCarousel" class="btn btn-primary" />
					<input type="button" name="cancelCarousel" id="cancelCarousel" value="Cancel" class="btn btn-primary" />
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