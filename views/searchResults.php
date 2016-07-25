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
                            <li class="active">Search Results</li>
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
            
            
            
            
            
            <div class="container">
                <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Search Results</div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Song</th>
                        <th>Artist</th>
                        <th>Album</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><a href="lyrics.php">The Looking Glass</a></td>
                        <td><a href="artist.php">Dream Theater</a></td>
                        <td><a href="artist.php">Dream Theater(Album)</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">Song 2</a></td>
                        <td><a href="#">Artist 2</a></td>
                        <td><a href="#">Album 2</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">Song 3</a></td>
                        <td><a href="#">Artist 3</a></td>
                        <td><a href="#">Album 3</a></td>
                      </tr>
                        <tr>
                        <td><a href="#">Song 4</a></td>
                        <td><a href="#">Artist 4</a></td>
                        <td><a href="#">Album 4</a></td>
                      </tr>
                        <tr>
                        <td><a href="#">Song 5</a></td>
                        <td><a href="#">Artist 5</a></td>
                        <td><a href="#">Album 5</a></td>
                      </tr>
                        <tr>
                        <td><a href="#">Song 6</a></td>
                        <td><a href="#">Artist 6</a></td>
                        <td><a href="#">Album 6</a></td>
                      </tr>
                        <tr>
                        <td><a href="#">Song 7</a></td>
                        <td><a href="#">Artist 7</a></td>
                        <td><a href="#">Album 7</a></td>
                      </tr>
                        <tr>
                        <td><a href="#">Song 8</a></td>
                        <td><a href="#">Artist 8</a></td>
                        <td><a href="#">Album 8</a></td>
                      </tr>
                        <tr>
                        <td><a href="#">Song 9</a></td>
                        <td><a href="#">Artist 9</a></td>
                        <td><a href="#">Album 9</a></td>
                      </tr>
                        <tr>
                        <td><a href="#">Song 10</a></td>
                        <td><a href="#">Artist 10</a></td>
                        <td><a href="#">Album 10</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>

                <ul class="pager">
                    <li><a href="#">Previous</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
  
            <footer>
                
            </footer>     
        </div>
    </body>
</html>