<script type="text/javascript" src="/bubbaLyrics/scripts/profileScript.js"></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			<?php 
			//prepare the session and api variable that were created in the controller
			$api = unserialize($_SESSION['api']);
			
			//me gets all profile data, after that use to manipulate
			$me = $api->me();
			
			//get playlist data for a user
			$playlists = $api->getUserPlaylists($me->id, array('limit' => 5));
			
			//get display name
			$display_name = $me->display_name;
			echo "<h1>" . $display_name . "</h1>";
			
			//get profile picture
			$pictures = $me->images;
			$img = $pictures[0]->url;
			echo "<img src='" . $img . "' id='profilePicture' />";
			
			echo "<div class='inline-block'>";
			
			//get spotify account
			$external_urls = $me->external_urls;
			$external_url = $external_urls->spotify;
			echo "<br /><h4><a href='" . $external_url . "'>Spotify Account</a></h4>";
			
			//get email
			$email = $me->email;
			echo "<h4>" . $email . "</h4>";

			//get followers
			$followers = $me->followers;
			$total = $followers->total;
			echo "<h4>Followers: " . $total . "</h4>";
			
			echo "</div>";

			//set element that will hold the playlist widget
			echo "<div id='spotifyPlaylist'></div>";
			?>
		</div>
		
		
		
		
		
		
	
		<div class="col-md-4">
		
		<div class="container">
		  <!-- Trigger the modal with a button -->
		  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#createPlaylistModal">Create Playlist</button>

		  <!-- Modal -->
		  <div class="modal fade" id="createPlaylistModal" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Create Playlist</h4>
				</div>
				<div class="modal-body">
				
				<form>
					<div class="form-group">
					  <label for="createPlaylistName">Playlist Name:</label>
					  <input type="text" class="form-control" id="createPlaylistName">
					</div>
				 </form>
				</div>
				<div class="modal-footer">
					<button type="button" id="createPlaylistButton" class="btn btn-primary" data-dismiss="modal">Create</button>
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			  </div>
			  
			</div>
		  </div>
		  
		</div>

		
		
		
		
		<br />
		
		
		
		
		
		
		
		<div class="container">
		  <!-- Trigger the modal with a button -->
		  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#updatePlaylistModal">Update Playlist</button>

		  <!-- Modal -->
		  <div class="modal fade" id="updatePlaylistModal" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Update Playlist</h4>
				</div>
				<div class="modal-body">
				
				
				<form>
					<div class="form-group">
					  <label for="updatePlaylistName">Playlist Name:</label>
					  <input type="text" class="form-control" id="updatePlaylistName">
					</div>
				 </form>
				
				<?php
				foreach ($playlists->items as $playlist) {
					//get information on the playlist
					$playlistName = $playlist->name;
					$playlistId = $playlist->id;
					
					//display a link to the playlist with the playlist name as the title
					echo "<div class='inline-block'>";
					echo "<h4><a href='javascript:updateSpotifyPlaylist(&quot;" . $playlistId . "&quot;, &quot;" . $playlistName . "&quot; );'>" . $playlistName . "</a></h4>";
					
					echo "</div>";
					echo "<br />";
				}
				
				
				?>
				
				</div>
				<div class="modal-footer">
					<button type="button" id="updatePlaylistButton" class="btn btn-primary" data-dismiss="modal">Update</button>
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			  </div>
			  
			</div>
		  </div>
		  
		</div>
		
		
		
		
		
		
		
		
			<?php
			//run a foreach loop to display each user playlist
			foreach ($playlists->items as $playlist) {
				//get information on the playlist
				$playlistName = $playlist->name;
				$playlistUri = $playlist->uri;
				$pictures = $playlist->images;
				$img = $pictures[0]->url;
				
				//display a link to the playlist with the playlist name as the title
				echo "<div class='inline-block'>";
				echo "<h4><a href='javascript:spotifyPlaylist(&quot;" . $playlistUri . "&quot;);'>" . $playlistName . "</a></h4>";
				
				//display the playlist image
				echo "<img src='" . $img . "' class='playlist' />";
				echo "</div>";
			}
			?>
		</div>
	</div>
</div>