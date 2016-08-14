<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bubba Lyrics</title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    
    <!--jQuery/jQuery UI-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
    <!--Bootstrap-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="/bubbaLyrics/styles/styles.css">
</head>
    <body>
	<script type="text/javascript" src="/bubbaLyrics/scripts/headerScript.js"></script>
	
        <div class="container-fluid" id="mainContainer">
		
            <div class="page-header">     
                <div class="header">
                    <a href="/bubbaLyrics/index.php"><span class="glyphicon glyphicon-fire"></span></a>
                    Bubba Lyrics
                    <p>Your go to source for finding the lyrics to the songs you love!</p>
                    <div class="social-icons">
                    <a href="https://facebook.com"><img src="/bubbaLyrics/images/fb.png" width="35" height="35" alt="Facebook" /></a>
                    <a href="https://twitter.com"><img src="/bubbaLyrics/images/tw.png" width="35" height="35" alt="Twitter" /></a>
                    <a href="https://youtube.com"><img src="/bubbaLyrics/images/yt.png" width="35" height="35" alt="Youtube" /></a>
                        
                    
                    </div>
                </div>
            </div>
			
            <nav class="navbar navbar-default" >
                <div id="nav1" class="container-fluid">
                    <div class="navbar-header">
                        <a class="btn btn-large btn btn-primary" style="float:left; margin-top:10px; width:150px;" href="/bubbaLyrics/index.php?action=findArtist">Top Artists</a>
                        <ul class="nav navbar-nav">
                            <ol id="breadCrumbs" class="breadcrumb" style="float:left; margin-top: 10px; margin-left:50px;">
							</ol>
                        </ul>
                    </div>
                    
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/bubbaLyrics/index.php?action=signUp" style="color:white"><span class="glyphicon glyphicon-check" style="color:white;"></span> Sign Up</a></li>
						<li><a href="/bubbaLyrics/index.php?action=login" style="color:white"><span class="glyphicon glyphicon-log-in" style="color:white;"></span> Login</a></li>
						<li><a href="/bubbaLyrics/index.php?action=profile" style="color:white"><span class="glyphicon glyphicon-user" style="color:white;"></span> Profile</a></li>
						<li><a href="/bubbaLyrics/index.php" style="color:white"><span class="glyphicon glyphicon-user" style="color:white;"></span> Logout</a></li>
					</ul>
    
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group" >
                            <input type="text" id="searchContent" class="form-control" placeholder="Search Artists..." />
                        </div>
                        <a class="btn btn-large btn btn-primary" id="searchClick"  href="/bubbaLyrics/index.php?action=searchResults">Go!</a>
                    </form>
                </div>           
            </nav>