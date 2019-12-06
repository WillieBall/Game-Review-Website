<?php
//GET ALL GAMES 
function getGames($database) {
	$sql = file_get_contents('sql/getGames.sql');
	$statement = $database->prepare($sql);
	$statement->execute();
	$games = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $games;
}
//GET GAME
function getGame($gameid, $database) {
	$sql = file_get_contents('sql/getGame.sql');
	$statement = $database->prepare($sql);
		$params = array(
		'gameid' => $gameid
	);
	$statement->execute($params);
	$games = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $games;
}
function getGenre($gameid, $database) {
	$sql = file_get_contents('sql/getGenre.sql');
	$params = array(
		'gameid' => $gameid
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$genres = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $genres;
}
function searchGames($term, $database) {
	$term = $term . '%';
	
	$sql = file_get_contents('sql/searchGames.sql');
	$params = array(
		'term' => $term
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$game_search = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $game_search;
}

//CHECK IF ADMIN OR NOT
function checkAdmin($userID, $database) {
	$sql = file_get_contents('sql/getAdmin.sql');
	$stmt = $database->prepare($sql);
	$stmt->execute(array(
		'userid' => $userID
	));
	$admin = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	//is not admin so redirect to sign in page
	if($admin[0]['isadmin'] == 0) { 
	header("LOCATION: signin.php?error=No+Admin+Privs"); 
	die(); 
	} 
}

//CHECK IF ADMIN OR NOT
function checkAdminNav($userID, $database) {
	$sql = file_get_contents('sql/getAdmin.sql');
	$stmt = $database->prepare($sql);
	$stmt->execute(array(
		'userid' => $userID
	));
	$admin = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	//is not admin so redirect to sign in page
	if($admin[0]['isadmin'] == 0) { 
	return false;
	}else{
	return true;
	}
}

	//get function 
	function get($key) {
	if(isset($_GET[$key])) {
		return $_GET[$key];
	}
	
	else {
		return '';
	}
}