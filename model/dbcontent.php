<?php

function db_get_content($link, $content = null){
	access_control();
	switch ($content) {
		case 'page':
				if($_SESSION['user']['connected']){ // makea connectedf status table
					$connected = 'yes';
				}
				else{
					$connected = 'no';
				}

				if($_SESSION['user']['role'] == 'administrator'){ // makea connectedf status table
					$role = $_SESSION['user']['role'];
				}
				else{
					$role = '';
				}

			$query = "SELECT * FROM pp_page 
					WHERE 
						(connected IN (SELECT connected FROM pp_page WHERE connected = :connected ) 
						OR 
						connected IN (SELECT connected FROM pp_page WHERE connected = :role)
						OR
						connected = 'all')
					ORDER BY pp_page.p_order";

			$req	=	$link -> prepare($query);
			$req	->	execute(array(
			':connected' => $connected,
			':role' => $role
			));
			break;
		case 'menu':
			if($_SESSION['user']['connected']){ // makea connectedf status table
				$connected = 'yes';
			}
			else{
				$connected = 'no';
			}

			if($_SESSION['user']['role'] == 'administrator'){ // makea connectedf status table
				$role = $_SESSION['user']['role'];
			}
			else{
				$role = '';
			}

		$query = "SELECT * FROM pp_page 
					WHERE 
						(connected IN (SELECT connected FROM pp_page WHERE connected = :connected ) 
						OR 
						connected IN (SELECT connected FROM pp_page WHERE connected = :role)
						OR
						connected = 'all')
					AND display = 'yes'
					ORDER BY pp_page.p_order";

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