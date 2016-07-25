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