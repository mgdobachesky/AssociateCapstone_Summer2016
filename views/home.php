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
								<li class="active">Home</li>
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
			<br />
    
            <div class="container">
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
                        <div class="item active">
							<img src="/bubbaLyrics/images/c1.jpg" alt="Item1" style="width:800px;height:500px">
                        
                            <div class="carousel-caption">
                                <h3>Featured Stuff</h3>
                                <p>Duo reges constructio interrete. Sed quid minus probandum quam esse aliquem beatum nec satis beatum</p>
                            </div>
                        </div>

                        <div class="item">
							<img src="/bubbaLyrics/images/c2.jpg" alt="Item2" style="width:800px;height:500px">
                            <div class="carousel-caption">
                                <h3>Featured Stuff</h3>
                                <p>Quamvis enim depravatae non sint, pravae tamen esse possun sin tantum modo</p>
                            </div>
                        </div>
    
                        <div class="item">
							<img src="/bubbaLyrics/images/c3.jpg" alt="Item3" style="width:800px;height:500px">
                            <div class="carousel-caption">
                                <h3>Featured Stuff</h3>
                                <p>Hic nihil fuit, quod quaereremus. Quae in controversiam veniunt, de iis, si placet, disseramus.</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="/bubbaLyrics/images/c4.jpg" alt="Item4" style="width:800px;height:500px">
                            <div class="carousel-caption">
                                <h3>Featured Stuff</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quasi vero, inquit, perpetua oratio rhetorum solum, non etiam philosophorum sit.</p>
                            </div>
                        </div>
                        
                        <div class="item">
							<img src="/bubbaLyrics/images/c5.jpg" alt="Item5" style="width:800px;height:500px">
                            <div class="carousel-caption">
                                <h3>Featured Stuff</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quasi vero, inquit, perpetua oratio rhetorum solum, non etiam philosophorum sit.</p>
                            </div>
                        </div>
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
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="imgAbt">
                            <img width="300" height="250" src="https://media.timeout.com/images/100286017/image.jpg" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3><strong>Article Title</strong></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet. Vestibulum sapien. Proin quam. Etiam ultrices. Suspendisse in justo eu magna luctus suscipit. Sed lectus. Integer euismod lacus luctus magna. Quisque cursus, metus vitae pharetra auctor, sem massa mattis sem, at interdum magna augue eget diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lacinia molestie dui. Praesent blandit dolor. Sed non quam. In vel mi sit amet augue congue elementum. Morbi in ipsum sit amet pede facilisis laoreet. Donec lacus nunc, viverra nec.</p>
                    </div>
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="imgAbt">
                            <img width="300" height="250" src="https://pixabay.com/static/uploads/photo/2014/12/03/05/53/string-555070_960_720.jpg" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3><strong>Article Title</strong></h3>
                       <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luc Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luc</p>
                    </div>
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="imgAbt">
                            <img width="300" height="250" src="http://socialtwoonenine.com/wp-content/uploads/2015/08/LiveMusic.jpg" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3><strong>Article Title</strong></h3>
                        <p>Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu. Phasellus accumsan cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque posuere. Praesent turpis. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. </p>
                    </div>
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="imgAbt">
                            <img width="300" height="250" src="https://www.ethos3.com/wp-content/uploads/2016/01/music-for-presentation.jpg" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3><strong>Article Title</strong></h3>
                        <p>Quisque malesuada placerat nisl. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Sed augue ipsum, egestas nec, vestibulum et, malesuada adipiscing, dui. Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Mauris sollicitudin fermentum libero. Praesent nonummy mi in odio. Nunc interdum lacus sit amet orci. Vestibulum rutrum, mi nec elementum vehicula, eros quam gravida nisl, id fringilla neque ante vel mi. Morbi mollis tellus ac sapien. Phasellus volutpat, metus eget egestas mollis, lacus lacus blandit dui, id egestas quam mauris ut lacus. Fusce vel dui. Sed in libero ut nibh placerat accumsan. Proin faucibus arcu quis ante. In consectetuer turpis ut velit. Nulla sit amet est. Praesent metus tellus, elementum eu, semper a, adipiscing nec, purus. Cras risus ipsum, faucibus ut, ullamcorper id, varius ac, leo. Suspendisse feugiat. Suspendisse enim turpis, dictum sed, iaculis a, condimentum nec, nisi. Praesent nec nisl a purus blandit viverra. Praesent ac massa at ligula laoreet iaculis. Nulla neque dolor, sagittis eget, iaculis quis, molestie non, velit. Mauris turpis nunc, blandit et, volutpat molestie, porta ut, ligula. Fusce pharetra convallis urna. Quisque ut nisi. Donec mi odio, faucibus at, scelerisque quis,</p>
                    </div>
                </div>
            </div>   
        </div>
    </body>
</html>  