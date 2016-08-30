<script type="text/javascript" src="/bubbaLyrics/scripts/lyricsScript.js"></script>
	
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">
			<h2><div id="lyricTitle" class="center"></div></h2>
			<h4><div id="albumTitle" class="center"></div></h4>
			<br />
			<div id="playWidget" class="center" ></div>
			<br />
			<strong><div id="songTitle" class="center"></div></strong>
			<br />
			<div id="lyricSpace" class="center"></div>
		</div>
		<br />
		<br />

		<div class="col-lg-2"></div>

		<div class="col-lg-2">
			<?php if(isset($_SESSION['spotifyUserId']) && $_SESSION['spotifyUserId'] != NULL) { ?>
			<?php $api = unserialize($_SESSION['api']);$me = $api->me();$playlists = $api->getUserPlaylists($me->id, array('limit' => 20));?>
			<div class="container-fluid playlistOptions center">
				<!-- Trigger the modal with a button -->
				<div id="addButton"></div>
				<!-- Modal -->
				<div class="modal fade" id="addSongPlaylist" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add to Playlist</h4>
							</div>
							<div class="modal-body">
								<?php
								echo "<div class='list-group'>";
								foreach ($playlists->items as $playlist) {
									//get information on the playlist
									$playlistName = $playlist->name;
									$playlistId = $playlist->id;
									//display a link to the playlist with the playlist name as the title
									echo "<a href='javascript:setPlaylistId(&quot;" . $playlistId . "&quot;);' class='list-group-item'>" . $playlistName . "</a>";
								}
								echo "</div>";
								?>
								<div id="addFeedback"></div>
							</div>
							<div class="modal-footer">
								<button type="button" id="addSongPlaylistButton" class="btn btn-success">Add</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid playlistOptions center">
				<!-- Trigger the modal with a button -->
				<div id="removeButton"></div>
				<!-- Modal -->
				<div class="modal fade" id="removeSongPlaylist" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Remove from Playlist</h4>
							</div>
							<div class="modal-body">
								<?php
								echo "<div class='list-group'>";
								foreach ($playlists->items as $playlist) {
									//get information on the playlist
									$playlistName = $playlist->name;
									$playlistId = $playlist->id;
									//display a link to the playlist with the playlist name as the title
									echo "<a href='javascript:setPlaylistId(&quot;" . $playlistId . "&quot;);' class='list-group-item'>" . $playlistName . "</a>";
								}
								echo "</div>";
								?>
								<div id="removeFeedback"></div>
							</div>
							<div class="modal-footer">
								<button type="button" id="removeSongPlaylistButton" class="btn btn-danger">Remove</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>