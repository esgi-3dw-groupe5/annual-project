<?php

function db_get_content($link, $content = null){
	
	switch ($content) {
		case 'value':
			# code...
			break;
		
		default:
			$query 	=	"SELECT * FROM pp_pinnackl.pp_categorie WHERE pp_categorie.display = 'yes' ORDER BY pp_categorie.order";
			$req	=	$link -> prepare($query);
			$req	->	execute();
			break;
	}
	return $req;
}