<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bubba Lyrics</title>  
    <meta chartset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bubbaLyrics/styles.css">
	  
</head>
    <body>
	
        <div class="container-fluid" id="mainContainer">
		
            <div class="page-header">     
                <div class="header">
                    <a href="/bubbaLyrics/index.php?action=home"><span class="glyphicon glyphicon-fire"></span></a>
                    Bubba Lyrics
                    <p>Your go to source for finding the lyrics to the songs you love!</p>
                    <div class="social-icons">
                    <a href="https://facebook.com"><img src="/bubbaLyrics/images/fb.png" width="35" height="35" alt="Facebook" /></a>
                    <a href="https://twitter.com"><img src="/bubbaLyrics/images/tw.png" width="35" height="35" alt="Twitter" /></a>
                    <a href="https://youtube.com"><img src="/bubbaLyrics/images/yt.png" width="35" height="35" alt="Youtube" /></a>  
                    </div>
                </div>
            </div>
			
            <nav class="navbar navbar-default" style="padding-bottom:14px;">
                <div id="nav1" class="container-fluid">
                    <div class="navbar-header">
                        <a class="btn btn-large btn btn-primary" style="float:left; margin-top:10px;" href="/bubbaLyrics/index.php?action=findArtist">Top Artists</a>
                    </div>
                    
					<ul class="nav navbar-nav navbar-right">
					
						<?php if($_SESSION['userid'] == 1) { ?>
							<li><a href="/bubbaLyrics/index.php?action=profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
							<li><a href="/bubbaLyrics/index.php?action=logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
						<?php } ?>
						
						<?php if($_SESSION['userid'] == NULL || empty($_SESSION['userid'])) { ?>
							<li><a href="/bubbaLyrics/index.php?action=signUp"><span class="glyphicon glyphicon-check"></span> Sign Up</a></li>
							<li><a href="/bubbaLyrics/index.php?action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<?php } ?>
						
					</ul>
    
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group" >
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <a class="btn btn-large btn btn-primary"  href="/bubbaLyrics/index.php?action=searchResults">Go!</a>
                    </form>
                </div>          
            </nav>