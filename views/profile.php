<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bubba Lyrics</title>  
    <meta chartset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <
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
                            <li class="active">Profile<li>
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
                <div class="row">
                    <div class="col-lg-2" style="padding-left: 0px; padding-right: 0px; margin-right:25px;">
						<strong>
							<p>Member Access: Admin</p>
							<p>Privileges:&nbsp;<a href="add.php">Add</a>|<a href="updateDelete.php">Update</a>|<a href="updateDelete.php">Delete</a></p>
						</strong>
                        
                        <div class="container">
                            <br />
                            <br />
                            <strong><p>Favorite Genres:</p></strong>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Choose One:
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Genre</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Genre</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Genre</a></li>
                            </ul>
                          </div>
						</div>
                        
                        <div class="container">
                             <br>
                            <strong><p>Favorite Artists:</p></strong>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Choose One:
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Artist</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Artist</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Artist</a></li>
                            </ul>
                          </div>
                       </div>
                        
                         <div class="container">
                             <br>
                            <strong><p>Favorite Songs:</p></strong>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Choose One:
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Song</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Song</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Song</a></li>
                            </ul>
                          </div>
						</div>
						<button type="submit" class="btn btn-primary" style="margin-left:15px; margin-top:100px;">Update Profile</button>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                        <!-- Default panel contents -->
                            <div class="panel-heading">Favorite Genres</div>
                          <!-- List group -->
                          <ul class="list-group">
                            <li class="list-group-item">Rock</li>
                            <li class="list-group-item">Genre</li>
                            <li class="list-group-item">Genre</li>
                            <li class="list-group-item">Genre</li>
                            <li class="list-group-item">Genre</li>
                          </ul>
                        </div>
					</div>
                    
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                        <!-- Default panel contents -->
                          <div class="panel-heading">Favorite Artists</div>
 
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><a href="artist.php">Dream Theater</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Artist</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Artist</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Artist</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Artist</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Artist</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Artist</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Artist</a></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                        <!-- Default panel contents -->
                          <div class="panel-heading">Favorite Songs</div>
 
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><a href="lyrics.php">The Looking Glass</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Song</a></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
			
        </div>
    </body>
</html>
            