<?php
include('config.php');
$gameid = $_POST['gameid'];
$vote_type = $_GET['vote_type'];

switch($vote_type) {
	
	//VOTE UP
	case "up" : 
	$sql = file_get_contents('sql/voteUp.sql');
	$params = array(
		'gameid' => $gameid
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	break;
	
	//VOTE DOWN
	case "down" :
	$sql = file_get_contents('sql/voteDown.sql');
	$params = array(
		'gameid' => $gameid
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	break;
}
?>