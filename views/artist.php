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
	<script type="text/javascript" src="/bubbaLyrics/scripts/artistScript.js"></script>
	<script type="text/javascript" src="http://tracking.musixmatch.com/t1.0/AMa6hJCIEzn1v8RuOP"></script>
    
</head>
    <body>
        <div class="container-fluid" id="mainContainer">
              
            <div class="page-header">     
                <div class="header">
                    <a href="/bubbaLyrics/views/home.php"><span class="glyphicon glyphicon-fire"></span></a>
                    Bubba Lyrics
                    <p>Your go to source for finding the lyrics to the songs you love!</p>
                    <div class="social-icons">
                    <a href="https://facebook.com"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/F_icon.svg/2000px-F_icon.svg.png" width="35" height="35" alt="Facebook" /></a>
                    <a href="https://twitter.com"><img src="http://icons.iconarchive.com/icons/limav/flat-gradient-social/512/Twitter-icon.png" width="35" height="35" alt="Twitter" /></a>
                    <a href="https://youtube.com"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Youtube_icon.svg/2000px-Youtube_icon.svg.png" width="35" height="35" alt="Youtube" /></a>  
                    </div>
                </div>
            </div>
			
            <nav class="navbar navbar-default" style="padding-bottom:14px;">
                <div id="nav1" class="container-fluid">
                    <div class="navbar-header">
                        <a class="btn btn-large btn btn-primary" style="float:left; margin-top:10px;" href="/bubbaLyrics/views/findArtist.php">Top Artists</a>
                        <ul class="nav navbar-nav">
                            <ol class="breadcrumb">
                            <li><a href="/bubbaLyrics/views/home.php">Home</a></li>
                            <li><a href="/bubbaLyrics/views/findArtist.php">Find Artist</a></li>
                            <li class="active">Artist</li>
							</ol>
                        </ul>
                    </div>
                    
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/bubbaLyrics/views/profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
						<li><a href="/bubbaLyrics/views/signUp.php"><span class="glyphicon glyphicon-check"></span> Sign Up</a></li>
						<li><a href="/bubbaLyrics/views/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
    
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group" >
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <a class="btn btn-large btn btn-primary"  href="/bubbaLyrics/views/searchResults.php">Go!</a>
                    </form>
                </div>          
            </nav>
            
			<div class="row">
				<div class="container-fluid">
					<div class="col-md-12" style="background-color:grey; color:white;">
						<h1 id="songName"></h1>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="container-fluid">
					
					<div class="col-md-6">
						<div class="panel panel-primary">
							<!-- Default panel contents -->
							<div class="panel-heading">Albums</div>
							<table id="tblAlbums" class="table table-hover"></table>
						</div>
						<ul class="pager">
							<li id="albumPrev"><a href="#">Previous</a></li>
							<li id="albumNxt"><a href="#">Next</a></li>
						</ul>
					</div>
				
					<div class="col-md-6">
						<div class="panel panel-primary">
							<!-- Default panel contents -->
							<div id="albumName" class="panel-heading">Songs</div>
							<table id="tblSongs" class="table table-hover"></table>
						</div>
					</div>
					
				</div>
			</div>
			
        </div>
    </body>
</html>