<script type="text/javascript" src="/bubbaLyrics/scripts/loginScript.js"></script>

<div id="login" class="container" style="float:left;">
	<h2><strong>Login</strong></h2>
	<form role="form" id="loginForm" action="#" name="loginForm">
	
		<div class="form-group">
		  <label for="username">Username:</label>
		  <input type="text" class="form-control" id="loginUsername" name="loginUsername" placeholder="Enter username...">
		</div>

		<div class="form-group">
		  <label for="loginPwd">Password:</label>
		  <input type="password" class="form-control" id="loginPwd" name="loginPwd" placeholder="Enter password...">
		</div>
		
		<div class="checkbox">
		  <label><input type="checkbox"> Remember me</label>
		</div>
		
		<input type="submit" name="loginSubmit" id="loginSubmit" value="Login" class="btn btn-primary" />
		
	</form>
</div>
<div id="loginFeedback" style="float:left;"></div>