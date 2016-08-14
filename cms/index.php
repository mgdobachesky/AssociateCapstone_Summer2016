<?php
//start the session and require important pages
session_start();
require("/models/cmsDbConn.php");
require("/models/cmsFunctions.php");
//request the action that determines where to direct the user
$action = $_REQUEST['action'];
//this switch is mainly used for passing database information to ajax
switch ($action):
	//case the stores a note into the db
	//after that, it sends the content of the note to ajax to be dynamically added to the page
	case "storeNote":
		$noteContents = $_POST['noteBox'];
		$adminName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
		$lastInsert = storeNote($db, $noteContents, $adminName);
		$json = '{"name":"' . $adminName . '", "lastInsert":' . $lastInsert . '}';
		echo $json;
		exit();
	break;
	//case that responds to an ajax call, returning a json string with data containing the carousel picture information
	case "getPicture":
		$getSlide = $_POST['getSlide'];
		$slideInfo = slideInfo($db, $getSlide);
		$json = '{"slideLink":"' . $slideInfo['carouselPictureLink'] . '", "slideDescription":"' . $slideInfo['pictureDescription'] . '"}';
		echo $json;
		exit();
	break;
	//case that responds to an ajax call, returning a json string with data containing the article information
	case "getArticle":
		$getArticle = $_POST['getArticleNumber'];
		$articleInfo = articleInfo($db, $getArticle);
		$json = '{"articlePictureLink":"' . $articleInfo['articlePictureLink'] . '", "pictureDescription":"' . $articleInfo['pictureDescription'] . '", "articleTitle":"' . $articleInfo['articleTitle'] .'", "articleContent":"' . $articleInfo['articleContent'] .'"}';
		echo $json;
		exit();
	break;
endswitch;
//the header is included for all other actions, which require html pages to be compiled
include("/views/cmsHeader.php");
//this conditional statement is used to direct the user to the home page if the action is not assigned
if($action == NULL || empty($action)):
	//grab the admin notes from the database
	$notesList = getAdminNotes($db);
	include("/views/cmsHome.php");
endif;
//this switch is used for supplying the content of to-be-compiled html pages
//it also handles the loggin in and out of users
switch($action):
	//case that logs a user in
	case "Login":
		//grab the data sent over by the form
		$loginEmail = $_POST['loginEmail'];
		$loginPassword = $_POST['loginPassword'];
		//check that data against the database
		$loginRow = loginFunc($db, $loginEmail, $loginPassword);
		//if a user id exists for the entered information, set session variables the user and collect user information
		if(!empty($loginRow['userId'])):
			$_SESSION['userId'] = $loginRow['userId'];
			$_SESSION['adminLevel'] = $loginRow['adminLevel'];
			if($_SESSION['userId'] != NULL || !empty($_SESSION['userId'])):
				//collect information on the logged in user
				$personInfo = getPersonInfo($db, $_SESSION['userId']);
				$_SESSION['firstName'] = $personInfo['firstName'];
				$_SESSION['lastName'] = $personInfo['lastName'];
				$_SESSION['phoneNumber'] = $personInfo['phoneNumber'];
				$_SESSION['gender'] = $personInfo['gender'];
			endif;
			header('Location: /bubbaLyrics/cms/index.php');
		else:
			$error = "Error loggin in.";
			include $_SERVER['DOCUMENT_ROOT'] . '/bubbaLyrics/cms/views/error.php';
			exit();
		endif;
	break;
	//case that is used to build the carousel page
	case "editCarousel":
		include("/views/editCarousel.php");
	break;
	//case that is used to build the article page
	case "editArticles":
		include("/views/editArticles.php");
	break;
	//case that runs a function that logs a user out
	case "logout":
		logout();
		header('Location: /bubbaLyrics/cms/index.php');
	break;
endswitch;
//this switch is used for the handling of database interactions
switch ($action):
	//case that is used to upload carousel information
	case "uploadCarouselFile":
		if($_POST['hiddenSlide'] != "") {
			//collect file information
			$fileType = $_FILES['carouselFileUpload']['type'];
			$fileName = $_FILES['carouselFileUpload']['name'];
			$uploadType = 'carouselFileUpload';
			//run function that stores the image
			$storeName = storeImage($fileType, $fileName, $uploadType);
			//collect information used to update a specific slide
			$slideNumber = $_POST['hiddenSlide'];
			$fileDescription = $_POST['fileDescription'];
			//delete and then add the new carousel information for specified slide
			deleteCarouselPicture($db, $slideNumber);
			uploadCarouselPicture($db, $storeName, $slideNumber, $fileDescription);
			include("/views/editCarousel.php");
		} else {
			$error = "Please choose a slide number to edit.";
			include $_SERVER['DOCUMENT_ROOT'] . '/bubbaLyrics/cms/views/error.php';
			exit();
		}
	break;
	//case that is used to upload article information
	case "uploadArticleFile":
		if($_POST['hiddenArticle'] != "") {
			//collect file information
			$fileType = $_FILES['articleFileUpload']['type'];
			$fileName = $_FILES['articleFileUpload']['name'];
			$uploadType = 'articleFileUpload';
			//run a function that will store the article image
			$storeName = storeImage($fileType, $fileName, $uploadType);
			//collect information used to update a specific article
			$articleNumber = $_POST['hiddenArticle'];
			$fileDescription = $_POST['fileDescription'];
			$articleTitle = $_POST['articleTitle'];
			$articleContent = $_POST['articleContent'];
			//delete and then update the specified article
			deleteArticle($db, $articleNumber);
			uploadArticle($db, $storeName, $articleNumber, $fileDescription, $articleTitle, $articleContent);
			include("/views/editArticles.php");
		} else {
			$error = "Please choose an article number to edit.";
			include $_SERVER['DOCUMENT_ROOT'] . '/bubbaLyrics/cms/views/error.php';
			exit();
		}
	break;
	//case that allows the user to edit notes
	case "editNote":
		//get the id of the note to edit
		$id = $_REQUEST['id'];
		//get list of notes to display as usual
		$notesList = getAdminNotes($db);
		//get specific note to fill in form information with
		$note = getNote($db, $id);
		//reload the page with the updated note
		include("/views/cmsHome.php");
	break;
	//case the updates a note after the user has changed its text and chosen to submit the changes
	case "updateNote":
		//get information on the updated note and update the database entry with specified id
		$noteContents = $_POST['noteBox'];
		$noteId = $_POST['noteId'];
		$adminName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
		updateNote($db, $noteId, $noteContents, $adminName);
	break;
	//case that removes a specific note
	case "removeNote":
		//get the id of the note to delete
		$id = $_REQUEST['id'];
		//run a function that deletes the specified note and then reload the page
		deleteNote($db, $id);
		$notesList = getAdminNotes($db);
		//reload the page without the deleted note
		include("/views/cmsHome.php");
	break;
endswitch;
//the footer is added after an html page content has been compiled to seal the page
include("/views/cmsFooter.php");
?>