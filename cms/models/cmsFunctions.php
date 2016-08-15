<?php
//function that logs a user in
function loginFunc($db, $loginEmail, $loginPassword){
	try {
		$sql = "SELECT userId, adminLevel FROM userLogin WHERE email='$loginEmail' AND password='$loginPassword';";
		$results = $db->query($sql);
		$row = $results->fetch();
		return $row;
	} catch (PDOException $e) {
		exit("Database Error getting login data");
	}
}

//function that get information on the user logged in
function getPersonInfo($db, $id){
	try {
		$sql = "SELECT firstName, lastName, phoneNumber, gender FROM personInformation WHERE userId='$id';";
		$results = $db->query($sql);
		$row = $results->fetch();
		return $row;
	} catch (PDOException $e) {
		exit("Database Error getting person information");
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

//function that stores an image to the server's localstorage
function storeImage($fileType, $fileName, $uploadType){
	if (preg_match('/^image\/p?jpeg$/i', $fileType) ||
	preg_match('/^image\/gif$/i', $fileType) ||
	preg_match('/^image\/(x-)?png$/i', $fileType)) {
		//the complete path filename
		$uniqueName = time() . $fileName;
		$filename = '/xampp/htdocs/bubbaLyrics/cms/images/' . $uniqueName;
		//copy the file if it is deemed safe
		if (!is_uploaded_file($_FILES[$uploadType]['tmp_name']) || 
		!copy($_FILES[$uploadType]['tmp_name'], $filename)) {
			$error = "Could not save file as $filename.";
			include $_SERVER['DOCUMENT_ROOT'] . '/bubbaLyrics/cms/views/error.php';
			exit();
		}
		return $uniqueName;
	} else {
		$error = 'Please submit a JPEG, GIF, or PNG image file.';
		include $_SERVER['DOCUMENT_ROOT'] . '/bubbaLyrics/cms/views/error.php';
		exit();
	}
}

//function to clear out a spot for a new picture link in the carousel
function deleteCarouselPicture ($db, $slideNumber) {
	$sql = "DELETE FROM carousel WHERE slideNumber = :slideNumber;";
	$ps = $db->prepare($sql);
	$ps->bindValue(':slideNumber', $slideNumber);
	$ps->execute();
}

//function to upload a carousel picture. after deleting the old one, upload the new picture in its place
function uploadCarouselPicture($db, $storeName, $slideNumber, $fileDescription, $slideTitle, $slideContent) {
	$sql = "INSERT INTO carousel(carouselId, slideNumber, carouselPictureLink, pictureDescription, slideTitle, slideDescription) VALUES (NULL, :slideNumber, :storeName, :fileDescription, :slideTitle, :slideDescription);";
	try {
		$ps = $db->prepare($sql);
		$ps->bindValue(':slideNumber', $slideNumber);
		$ps->bindValue(':storeName', $storeName);
		$ps->bindValue(':fileDescription', $fileDescription);
		$ps->bindValue(':slideTitle', $slideTitle);
		$ps->bindValue(':slideDescription', $slideContent);
		$ps->execute();
	} catch(PDOException $e) {
		return("There was a problem adding new carousel picture");
	}
}

//function that gets information on a certain carousel picture
function slideInfo($db, $getSlide) {
	try {
		$sql = "SELECT carouselPictureLink, pictureDescription, slideTitle, slideDescription FROM carousel WHERE slideNumber='$getSlide';";
		$results = $db->query($sql);
		$slide = $results->fetch();
		return $slide;
	} catch (PDOException $e) {
		exit("Error getting slide information");
	}
}

//function to clear out a spot for a new article
function deleteArticle ($db, $articleNumber) {
	$sql = "DELETE FROM articles WHERE articleNumber = :articleNumber;";
	$ps = $db->prepare($sql);
	$ps->bindValue(':articleNumber', $articleNumber);
	$ps->execute();
}

//function to upload an article. after deleting the old one, upload the new article in its place
function uploadArticle($db, $storeName, $articleNumber, $fileDescription, $articleTitle, $articleContent) {
	$sql = "INSERT INTO articles(articleId, articleNumber, articlePictureLink, articleTitle, articleContent, pictureDescription) VALUES (NULL, :articleNumber, :storeName, :articleTitle, :articleContent, :pictureDescription);";
	try {
		$ps = $db->prepare($sql);
		$ps->bindValue(':articleNumber', $articleNumber);
		$ps->bindValue(':storeName', $storeName);
		$ps->bindValue(':articleTitle', $articleTitle);
		$ps->bindValue(':articleContent', $articleContent);
		$ps->bindValue(':pictureDescription', $fileDescription);
		$ps->execute();
	} catch(PDOException $e) {
		return("There was a problem adding new article picture");
	}
}

//function that gets information on a certain article
function articleInfo($db, $getArticle) {
	try {
		$sql = "SELECT articleId, articleNumber, articlePictureLink, articleTitle, articleContent, pictureDescription FROM articles WHERE articleNumber='$getArticle';";
		$results = $db->query($sql);
		$slide = $results->fetch();
		return $slide;
	} catch (PDOException $e) {
		exit("Error getting article information");
	}
}
?>