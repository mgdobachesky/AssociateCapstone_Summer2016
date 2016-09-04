<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bubba Lyrics</title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="/bubbaLyrics/styles/bubbaLyrics.ico" />
    <script src="/bubbaLyrics/styles/jquery/jquery.min.js"></script>
	<script src="/bubbaLyrics/styles/jquery-ui/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="/bubbaLyrics/styles/jquery-ui/jquery-ui.min.css">
	<script src="/bubbaLyrics/styles/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/bubbaLyrics/styles/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bubbaLyrics/styles/stylesheet.css">
</head>

<body>
	<script type="text/javascript" src="/bubbaLyrics/scripts/headerScript.js"></script>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" id="navbarFire" href="/bubbaLyrics/index.php"><span class="glyphicon glyphicon-fire"></span></a>
							<a class="navbar-brand" id="topArtistButton" href="/bubbaLyrics/index.php?action=findArtist">Top Artists</a>
						</div>
						<div class="collapse navbar-collapse" id="myNavbar">
							<ol id="breadCrumbs" class="breadcrumb hidden-xs"></ol>
							<ul class="nav navbar-nav navbar-right">
							<?php if ($_SESSION['spotifyUserId'] != NULL && !empty($_SESSION['spotifyUserId'])) { ?>
								<li><a href="/bubbaLyrics/index.php?action=profile" id="btnProfile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
								<li><a href="javascript:logoutBox();" id="btnLogout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
							<?php } else { ?>
								<li><a href="/bubbaLyrics/index.php?action=login" id="btnloginSignup"><span class="glyphicon glyphicon-check"></span> Signup / Login</a></li>
							<?php } ?>
							</ul>
							<form class="navbar-form navbar-right" role="search">
								<div class="form-group">
									<input type="text" id="searchContent" class="form-control" placeholder="Search Artists..." />
								</div>
								<a class="btn btn-large btn btn-primary" id="searchClick"  href="/bubbaLyrics/index.php?action=searchResults">Go!</a>
							</form>
						</div>
					</div>           
				</nav>
				<br />
				<br />	
				<div class="jumbotron">
					<div class="container-fluid center">
						<a id="fireGlyph" href="/bubbaLyrics/index.php"><span class="glyphicon glyphicon-fire"></span></a>
						<h1 id="mainHeader" class="papyrus">Bubba Lyrics</h1>
						<p class="papyrus">Your go to source for the songs you love!</p>
					</div>
				</div>
			</div>
		</div>
	</div>