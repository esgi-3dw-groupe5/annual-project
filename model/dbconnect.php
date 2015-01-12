<?php
function db_connect(){
	try
	{
		$link = new PDO('mysql:host=localhost;dbname=pp_pinnackl','root','',
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