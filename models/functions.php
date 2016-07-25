<?php

function addUser($db, $fName, $lName, $userName, $email, $password) {
	$sql = "INSERT INTO bubbalyricsusers (ID, fName, lName, userName, email, password) VALUES (NULL, :fName, :lName, :userName, :email, :password)";
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

?>