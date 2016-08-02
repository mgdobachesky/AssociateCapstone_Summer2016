<?php
	//function that checks if an email exists in the database or not
	function checkEmailExists($db, $email) {
		$sql = "SELECT COUNT(*) FROM userLogin WHERE email = $email";
		$results = $db->query($sql);
		return $results;
	}

	//function that adds a users login information to the database
	function addUserLogin($db, $email, $password) {
		$sql = "INSERT INTO userLogin (userId, adminLevel, email, password) VALUES (NULL, 1, :email, :password)";
		try {
			$ps = $db->prepare($sql);
			$ps->bindValue(':email', $email);
			$ps->bindValue(':password', $password);
			$ps->execute();
			return $db->lastInsertId();			
		} catch(PDOException $e) {
			return("There was a problem adding user");
		}
	}
	
	//function that adds a users personal information to the database
	function addUserDetails($db, $lastInsertId, $fName, $lName, $phone, $gender) {
		$sql = "INSERT INTO personalInformation (personalInformationId, userId, firstName, lastName, phoneNumber, gender) VALUES (NULL, :userId, :fName, :lName, :phone, :gender)";
		try {
			$ps = $db->prepare($sql);
			$ps->bindValue(':userId', $lastInsertId);
			$ps->bindValue(':fName', $fName);
			$ps->bindValue(':lName', $lName);
			$ps->bindValue(':phone', $phone);
			$ps->bindValue(':gender', $gender);
			$ps->execute();
		} catch (PDOException $e) {
			return("There was a problem adding user details");
		}
	}

	//function that logs a user in
	//if this fails then NULL is returned
	function loginFunc($db, $loginEmail, $loginPwd){
		$sql = "SELECT userId FROM userLogin WHERE email='$loginEmail' AND password='$loginPwd'";
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