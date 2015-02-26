<?php
function db_connect(){
	global $config;
	if(!isset($config)){
		$source = $_SERVER['DOCUMENT_ROOT'].'/annual-project/';
		require_once($source."config.php");
	}
	$db_host = $config['db_host'];
	$db_name = $config['db_name'];
	$db_login = $config['db_login'];
	$db_password = $config['db_password'];
	try
	{
		// $link = new PDO('mysql:host=pinnacklpwpadmin.mysql.db;dbname='.$db_name,$db_login,$db_password,
		$link = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_login,$db_password,
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