<?php
//gets the list of carousel pictures from the database
function getCarousel($db){
	$sql = "SELECT * FROM carousel;";
	$results = $db->query($sql);
	return $results;
}

//gets the list of article information from the database
function getArticles($db){
	$sql = "SELECT * FROM articles;";
	$results = $db->query($sql);
	return $results;
}
?>