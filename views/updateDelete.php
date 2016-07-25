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
                            <li><a href="/bubbaLyrics/views/profile.php">Profile</a></li>
                            <li class="active">Update/Delete Song</li>
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
            
            
            
            
            <div id="signup" class="container">
                <h2><strong>Update/Delete Song</strong></h2>
                <form role="form">
                    <div class="form-group" >
                        <label for="search">Search:</label>
                        <input type="text" class="form-control" placeholder="Search for a song to edit...">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="artist">Artist:</label>
                        <input type="artist" class="form-control" id="artist" placeholder="Enter artist...">
                    </div>
                
                    <div class="form-group">
                      <label for="album">Album:</label>
                      <input type="album" class="form-control" id="album" placeholder="Enter album...">
                    </div>
      
                    <div class="form-group">
                      <label for="genre">Genre:</label>
                      <input type="genre" class="form-control" id="genre" placeholder="Enter genre...">
                    </div>
      
                    <div class="form-group">
                      <label for="song">Song:</label>
                      <input type="song" class="form-control" id="song" placeholder="Enter song name...">
                    </div>
      
                    <div class="form-group">
                      <label for="rating">Rating:</label>
                      <input type="rating" class="form-control" id="rating" placeholder="Enter song rating...">
                    </div>
                    
                    <div class="form-group">
                      <label for="lyrics">Lyrics:</label>
                        <textarea class="form-control" rows="5" id="lyrics"></textarea>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
            
            
            
            <footer>
                
            </footer>     
        </div>
    </body>
</html>