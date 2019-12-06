<?php
include('config.php');
include('functions.php');

//if(!empty($_POST)) :
$name = $_POST['name'];
$price = $_POST['price'];
$gameid = $_GET['gameid'];

switch($_GET['action']) {
	
	case "edit" :
	$sql = file_get_contents('sql/editGame.sql');
	$params = array(
		'gameid' => $gameid,
		'name' => $name,
		'price' => $price
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	//$games = $statement->fetchAll(PDO::FETCH_ASSOC);
	header("LOCATION: admin.php?msg=Game+Has+Been+Edited!");
	exit();
	break;
	
	case "add" :
	$sql = file_get_contents('sql/addGame.sql');
	$params = array(
		'name' => $name,
		'price' => $price
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	
	$last_id_inserted = $database->lastInsertId();
	
	$sql = file_get_contents('sql/addGametoVotes.sql');
	$params = array(
		'gameid' => $last_id_inserted,
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	//$games = $statement->fetchAll(PDO::FETCH_ASSOC);
	header("LOCATION: admin.php?msg=Game+Has+Been+Added!");
	exit();
	break;
	
	
}//end switch

//endif;//end check post