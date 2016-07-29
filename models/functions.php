<?php
	//function that adds a user to the database with the variable captured in the controller
	//if there is an error then a string of text is returned
	function addUser($db, $fName, $lName, $userName, $email, $password) {
		$sql = "INSERT INTO users (ID, fName, lName, userName, email, password, adminLevel) VALUES (NULL, :fName, :lName, :userName, :email, :password, 1)";
		try {
			$ps = $db->prepare($sql);
			$ps->bindValue(':fName', $fName);
			$ps->bindValue(':lName', $lName);
			$ps->bindValue('userName', $userName);
			$ps->bindValue(':email', $email);
			$ps->bindValue(':password', $password);
			$ps->execute();
			
		} catch(PDOException $e) {
			return("There was a problem with adding a user");
		}
	}

	//function that logs a user in
	//if this fails then NULL is returned
	function loginFunc($db, $loginUsername, $loginPwd){
		$sql = "SELECT adminLevel FROM users WHERE userName='$loginUsername' AND password='$loginPwd'";
		$results = $db->query($sql);
		$row = $results->fetch();
		return $row;
	}

	//function that sets the session variable to an empty array and destroys the current session
	function logout(){
		$_SESSION = array();
		session_destroy();
	}
?>