<?php
	session_start();
	require("/models/cmsDbConn.php");
	require("/models/cmsFunctions.php");
	
	$action = $_REQUEST['action'];
	
	if($action == "Login"):
		$loginEmail = $_POST['loginEmail'];
		$loginPassword = $_POST['loginPassword'];
		$loginRow = loginFunc($db, $loginEmail, $loginPassword);
	
		if(!empty($loginRow['userId'])):
			$_SESSION['userId'] = $loginRow['userId'];
			$_SESSION['adminLevel'] = $loginRow['adminLevel'];
			header('Location: /bubbaLyrics/cms/index.php');
		else:
			$error = "Error loggin in";
			include $_SERVER['DOCUMENT_ROOT'] . '/bubbaLyrics/cms/views/error.php';
			exit();
		endif;
	endif;
	
	if($action == "storeNote"):
		$noteContents = $_POST['noteBox'];
		$adminName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
		$lastInsert = storeNote($db, $noteContents, $adminName);
		$json = '{"name":"' . $adminName . '", "lastInsert":' . $lastInsert . '}';
		echo $json;
		exit();
	endif;
	
	include("/views/cmsHeader.php");
	
	if($action == NULL || empty($action)):
		if($_SESSION['userId'] != NULL || !empty($_SESSION['userId'])):
			$personInfo = getPersonInfo($db, $_SESSION['userId']);
			$_SESSION['firstName'] = $personInfo['firstName'];
			$_SESSION['lastName'] = $personInfo['lastName'];
			$_SESSION['phoneNumber'] = $personInfo['phoneNumber'];
			$_SESSION['gender'] = $personInfo['gender'];
		endif;
		$notesList = getAdminNotes($db);
		include("/views/cmsHome.php");
	endif;
	
	switch ($action):
		
		case "editCarousel":
			include("/views/editCarousel.php");
		break;
		
		case "editArticles":
			include("/views/editArticles.php");
		break;
		
		case "editNote":
			if($_SESSION['userId'] != NULL || !empty($_SESSION['userId'])):
				$personInfo = getPersonInfo($db, $_SESSION['userId']);
				$_SESSION['firstName'] = $personInfo['firstName'];
				$_SESSION['lastName'] = $personInfo['lastName'];
				$_SESSION['phoneNumber'] = $personInfo['phoneNumber'];
				$_SESSION['gender'] = $personInfo['gender'];
				$id = $_REQUEST['id'];
			endif;
			$notesList = getAdminNotes($db);
			$note = getNote($db, $id);
			include("/views/cmsHome.php");
		break;
		
		case "updateNote":
			$noteContents = $_POST['noteBox'];
			$noteId = $_POST['noteId'];
			$adminName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
			updateNote($db, $noteId, $noteContents, $adminName);
		break;
		
		case "removeNote":
			if($_SESSION['userId'] != NULL || !empty($_SESSION['userId'])):
				$personInfo = getPersonInfo($db, $_SESSION['userId']);
				$_SESSION['firstName'] = $personInfo['firstName'];
				$_SESSION['lastName'] = $personInfo['lastName'];
				$_SESSION['phoneNumber'] = $personInfo['phoneNumber'];
				$_SESSION['gender'] = $personInfo['gender'];
				$id = $_REQUEST['id'];
			endif;
			$id = $_REQUEST['id'];
			deleteNote($db, $id);
			$notesList = getAdminNotes($db);
			include("/views/cmsHome.php");
		break;
		
		case "logout":
			logout();
			header('Location: /bubbaLyrics/cms/index.php');
		break;
	endswitch;
	
	include("/views/cmsFooter.php");
?>