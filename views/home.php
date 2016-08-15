<script type="text/javascript" src="/bubbaLyrics/scripts/homeScript.js"></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
					<li data-target="#myCarousel" data-slide-to="4"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php foreach($carouselItems as $carouselItem): ?>
						<div class="<?php if($carouselItem['slideNumber'] == "1") {echo "item active";} else {echo "item";} ?>">
							<img src="/bubbaLyrics/cms/images/<?php echo htmlspecialchars($carouselItem['carouselPictureLink'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($carouselItem['pictureDescription'], ENT_QUOTES, 'UTF-8'); ?>" />
							<div class="carousel-caption">
								<h3><?php echo htmlspecialchars($carouselItem['slideTitle'], ENT_QUOTES, 'UTF-8'); ?></h3>
								<p><?php echo htmlspecialchars($carouselItem['slideDescription'], ENT_QUOTES, 'UTF-8'); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div class="row">
		<div class="col-md-12">
			<div class="newsHead">
				<h3>What's New?</h3>
			</div>
			<div id="accordion">
				<?php foreach($articleItems as $articleItem): ?>
				<h3><?php echo htmlspecialchars($articleItem['articleTitle'], ENT_QUOTES, 'UTF-8'); ?></h3>
				<div>
					<div class="col-md-8">
						<div class="articleStyle">
							<p><?php echo nl2br(htmlspecialchars($articleItem['articleContent'], ENT_QUOTES, 'UTF-8')); ?></p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="imgAbt">
							<img src="/bubbaLyrics/cms/images/<?php echo htmlspecialchars($articleItem['articlePictureLink'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($articleItem['articlePictureDescription'], ENT_QUOTES, 'UTF-8'); ?>" class="articlePictures" />
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<br />
				<br />
			</div>
		</div>
	</div>
</div>