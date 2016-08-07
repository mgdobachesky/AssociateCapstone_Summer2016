<?php
	//function that logs a user in
	function loginFunc($db, $loginEmail, $loginPassword){
		try {
			$sql = "SELECT userId, adminLevel FROM userLogin WHERE email='$loginEmail' AND password='$loginPassword';";
			$results = $db->query($sql);
			$row = $results->fetch();
			return $row;
		} catch (PDOException $e) {
			exit("<br />Database Error getting login data");
		}
	}
	
	//function that get information on the user logged in
	function getPersonInfo($db, $id){
		try {
			$sql = "SELECT firstName, lastName, phoneNumber, gender FROM personalInformation WHERE userId='$id';";
			$results = $db->query($sql);
			$row = $results->fetch();
			return $row;
		} catch (PDOException $e) {
			exit("<br />Database Error getting person information");
		}
	}
	
	//function that logs a user out
	function storeNote($db, $noteContents, $adminName){
		$sql = "INSERT INTO adminNotes(noteId, noteContent, adminName) VALUES (NULL, :noteContents, :adminName);";
		try {
			$ps = $db->prepare($sql);
			$ps->bindValue(':noteContents', $noteContents);
			$ps->bindValue(':adminName', $adminName);
			$ps->execute();	
			return $db->lastInsertId();
		} catch(PDOException $e) {
			return("There was a problem adding note");
		}
	}
	
	//gets the list of admin notes from the database
	function getAdminNotes($db){
		$sql = "SELECT * FROM adminNotes ORDER BY noteId DESC;";
		$results = $db->query($sql);
		return $results;
	}
	
	//gets a specific note
	function getNote($db, $id){
		$sql = "SELECT noteId, noteContent, adminName FROM adminNotes WHERE noteId='$id';";
		$results = $db->query($sql);
		$note = $results->fetch();
		return $note;
	}
	
	//updates a note in the database
	function updateNote($db, $id, $noteContent, $adminName){
		try{
			$sql = "UPDATE adminNotes SET noteContent = :noteContent, adminName = :adminName WHERE noteId = :id;";
			$ps = $db->prepare($sql);
			$ps->bindValue(':id', $id);
			$ps->bindValue(':noteContent', $noteContent);
			$ps->bindValue(':adminName', $adminName);
			return $ps->execute();
		} catch (PDOException $e) {
			die ("There was a problem updating this song.");
		}
	}
	
	//deletes a note from the database
	function deleteNote($db, $id){
		$sql = "DELETE FROM adminNotes WHERE noteId = :id;";
		$ps = $db->prepare($sql);
		$ps->bindValue(':id', $id);
		$ps->execute();
	}
	
	//function that logs a user out
	function logout(){
		$_SESSION = array();
		session_destroy();
	}
?>