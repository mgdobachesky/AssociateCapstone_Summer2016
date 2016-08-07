<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bubba Lyrics - CMS</title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/bubbaLyrics/cms/styles/stylesheet.css">
</head>
<body>
	 <form id="cmsHeader">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="index.php">BubbaLyrics - CMS</a>
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php?action=editCarousel">Edit Carousel</a></li>
									<li><a href="index.php?action=editArticles">Edit Articles</a></li>
                                </ul>
								
								<?php if ($_SESSION['userId'] != NULL || !empty($_SESSION['userId'])) { ?>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.php?action=logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                                </ul>
								<?php } ?>
								
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </form>