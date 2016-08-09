<script type="text/javascript" src="/bubbaLyrics/cms/scripts/cmsHomeScript.js"></script>

<?php if ($_SESSION['userId'] == NULL || empty($_SESSION['userId'])) { ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<fieldset>
				<legend>Login</legend>
				<form role="form" id="loginForm" name="loginForm" action="." method="post">
					<div class="form-group">
						<label for="loginEmail">Email:</label>
						<input type="text" class="form-control" id="loginEmail" name="loginEmail" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="loginPassword">Password:</label>
						<input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="Password">
					</div>
					<input type="submit" name="action" id="action" value="Login" class="btn btn-primary" />
				</form>
			</fieldset>
		</div>
		<div class="col-md-8" id="loginFeedback"></div>
	</div>
</div>
<?php } ?>

<?php if ($_SESSION['userId'] != NULL || !empty($_SESSION['userId'])) { ?>
<div class="container-fluid">
	<div class="row">
	<div class="col-md-2"></div>
		<div class="col-md-8">
			<h1>Hello <?php echo($_SESSION['firstName']); ?>!</h1>
			<br />
			<h4 id="noteTitle">Admin Notes</h4>
			<?php if($action != 'editNote') { ?><a href="#" id="addNote"><span class="glyphicon glyphicon-plus"></span> Add New Note</a> <?php } ?>
			<form role="form" id="<?php if($action == 'editNote') {echo "noteUpdate";} else {echo "noteForm";} ?>" name="noteForm" action="#">
				<fieldset>
					<div class="form-group">
						<textarea class="form-control" rows="5" id="noteBox" name="noteBox" placeholder="Type note here..."><?php echo $note['noteContent']; ?></textarea>
					</div>
						<input type="hidden" id="noteId" name="noteId" value="<?php echo $note['noteId']; ?>">
					<input type="submit" name="action" id="btnAddNote" value="<?php if($action == 'editNote') {echo "Update";} else {echo "Submit";} ?>" class="btn btn-primary" />
					<input type="submit" name="cancelNote" id="<?php if($action == 'editNote') {echo "cancelEdit";} else {echo "cancelNote";} ?>" value="Cancel" class="btn btn-primary" />
				</fieldset>
			</form>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Note</th>
							<th>Author</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<tbody id="tableBody">
					
						<?php foreach($notesList as $note): ?>
						<tr>
							<td><?php echo htmlspecialchars($note['noteContent'], ENT_QUOTES, 'UTF-8'); ?></td>
							<td><?php echo htmlspecialchars($note['adminName'], ENT_QUOTES, 'UTF-8'); ?></td>
							<td><a href="index.php?action=editNote&id=<?php echo $note['noteId']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?action=removeNote&id=<?php echo $note['noteId']; ?>"><span class="glyphicon glyphicon-remove"></span> Remove</a></td>
						</tr>
						<?php endforeach; ?>
						
					</tbody>
					
				</table>
			</div>
		</div>
	</div>
</div>
<?php } ?>