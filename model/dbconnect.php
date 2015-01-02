<?php
function db_connect(){
	try
	{
		$link = new PDO('mysql:host=localhost;dbname=projetphp','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die("Erreur : ".$e->getMessage());
	}
	return $link;
}