<?php

function db_get_content($link, $content = null){
	access_control();
	switch ($content) {
		case 'menu':
			if($_SESSION['user']['connected']){ // makea connectedf status table
				$connected = 'yes';
			}
			else{
				$connected = 'no';
			}

			if($_SESSION['user']['role'] == 'administrator'){ // makea connectedf status table
				$role = 'admin';
			}
			else{
				$role = '';
			}

		$query = "SELECT * FROM pp_categorie WHERE connected IN (SELECT connected FROM pp_categorie WHERE connected = :connected ) OR 
					connected IN (SELECT connected FROM pp_categorie WHERE connected = :role)
					OR connected = 'all'";

		$req	=	$link -> prepare($query);
		$req	->	execute(array(
		':connected' => $connected,
		':role' => $role
		));
		break;

		default:

		break;
	}
	return $req;
}