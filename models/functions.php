<?php

function addUser($db, $fName, $lName, $userName, $email, $password) {
	$sql = "INSERT INTO bubbalyricsusers (ID, fName, lName, userName, email, password, adminLevel) VALUES (NULL, :fName, :lName, :userName, :email, :password, 1)";
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

function loginFunc($db, $loginUsername, $loginPwd){
    $sql = "SELECT adminLevel FROM bubbalyricsusers WHERE userName='$loginUsername' AND password='$loginPwd'";
    $results = $db->query($sql);
    $row = $results->fetch();
    return $row;
}

function logout(){
    $_SESSION = array();
    session_destroy();
}

?>