<?php
function db_connect(){
	try
	{
		$link = new PDO('mysql:host=82.239.61.199;dbname=pp_pinnackl','root','123456az.',
		array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
			)
		);
	}
	catch(Exception $e)
	{
		die("Erreur : ".$e->getMessage());
	}
	return $link;
}
// Do no use yet
// class Database {
// 	public function findId($id, $tab){
// 		$link = db_connect();
// 		$query = sprintf('SELECT * FROM %s WHERE id = :id', $tab);
// 		$result = $link -> prepare($query);
// 		$result -> execute(array(
// 			':id' => $id,
// 		));
// 		return $data = $result -> fetch();
// 	}
// 	public function findPseudo($pseudo, $tab = 'pp_users'){
// 		$link = db_connect();
// 		$query = sprintf('SELECT * FROM %s WHERE pseudo = :pseudo', $tab);
// 		$result = $link -> prepare($query);
// 		$result -> execute(array(
// 			':pseudo' => $pseudo,
// 		));
// 		return $data = $result -> fetch();
// 	}
// }