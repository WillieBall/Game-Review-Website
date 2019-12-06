<?php
class getuser {
	public $userID;
	public $user_name;
	public $database;
	
	
	
	function __construct($userID, $database)
	{	
	//grab id and name using PDO query
   $sql = file_get_contents('sql/getUser.sql');
	$stmt = $database->prepare($sql);
	$stmt->execute(array(
		'userid' => $userID
	));
	$getuser = $stmt->fetchAll(PDO::FETCH_ASSOC);



		//SET our Variables
		//$this->user_name = $getuser[0]["username"];
		$this->userID = $getuser[0]["userid"];
		$this->user_name = $getuser[0]["username"];;

}
}