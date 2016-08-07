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