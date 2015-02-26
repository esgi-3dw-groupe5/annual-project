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

		case 'page-edit': 
			$edit = get_param('edit', '');
			$query = "SELECT * FROM pp_page WHERE id = :id";
			$req =	$link -> prepare($query);
			$req ->	execute(array(
					':id' => $edit
				));

			break;

		case 'user-edit': 
			$edit = get_param('edit', '');
			$query = "SELECT * FROM pp_users WHERE id = :id";
			$req =	$link -> prepare($query);
			$req ->	execute(array(
					':id' => $edit
				));

			break;


		case 'allpage':
			$query = "SELECT * FROM pp_page ORDER BY pp_page.p_order";
			$req	=	$link -> prepare($query);
			$req	->	execute();
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
		$req	=	$link -> prepare("SELECT * FROM pp_page WHERE tag = :page");
		$req	->	execute(array(
		':page' => $content,
		));
		break;
	}
	return $req;
}

function validate_page($POST){
	access_control();
	$error = 0;
	$errorMessage = array(
		'0' => "",
	);

	$id = "";
	$tag	  = "";
	$name_category  = "";
	$order	  = "";
	$display	  = "";
	$connected  = "";
	/*****************/
	/*****CodeErr*****/
	/*****************/
	// ********************Page********************


	if(isset($POST["at_update_page_submit"])){
		if(!empty($POST["at_id"])){
			$id = $POST["at_id"];
		}

		if(!empty($POST["at_tag"])){
		/*******************************************************************/
		/*******************************TAG*******************************/
		/*******************************************************************/
			$tag = $POST["at_tag"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}

		if(!empty($POST["at_name_category"])){
		/*******************************************************************/
		/******************************NAME CATEGORY*****************************/
		/*******************************************************************/
			$name_category = $POST["at_name_category"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}

		if(!empty($POST["at_order"])){
		/*******************************************************************/
		/******************************order*****************************/
		/*******************************************************************/
			$order = $POST["at_order"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}


		if(!empty($POST["at_display"])){
		/*******************************************************************/
		/******************************display*****************************/
		/*******************************************************************/
			$display = $POST["at_display"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}

		if(!empty($POST["at_connected"])){
		/*******************************************************************/
		/******************************connected*****************************/
		/*******************************************************************/
			$connected = $POST["at_connected"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}

		
			$success = update_page($id,$tag,$name_category,$order,$display,$connected);
		}
	

	return $errorMessage;
}


function validate_user($POST){
	access_control();
	$error = 0;
	$errorMessage = array(
		'0' => "",
	);

	$id = "";
	$firstname	  = "";
	$name  = "";
	$pseudo	  = "";
	$role	  = "";
	$connected  = "";
	/*****************/
	/*****CodeErr*****/
	/*****************/
	// ********************Page********************


	if(isset($POST["at_update_user_submit"])){
		if(!empty($POST["at_id"])){
			$id = $POST["at_id"];
		}

		if(!empty($POST["at_firstname"])){
		/*******************************************************************/
		/*******************************firstname*******************************/
		/*******************************************************************/
			$firstname = $POST["at_firstname"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}

		if(!empty($POST["at_name"])){
		/*******************************************************************/
		/******************************NAME CATEGORY*****************************/
		/*******************************************************************/
			$name = $POST["at_name"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}

		if(!empty($POST["at_pseudo"])){
		/*******************************************************************/
		/******************************pseudo*****************************/
		/*******************************************************************/
			$pseudo = $POST["at_pseudo"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}


		if(!empty($POST["at_role"])){
		/*******************************************************************/
		/******************************role*****************************/
		/*******************************************************************/
			$role = $POST["at_role"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}
		
			$success = db_update_user($id,$firstname,$name,$pseudo,$role);
		}
	

	return $errorMessage;
}

function update_page($id,$tag,$name_category,$order,$display,$connected) {
	$link = db_connect();
	$req = $link -> prepare("UPDATE pp_page SET 	tag = :tag,
													name_category = :name_category, 
													p_order = :order, 
													display = :display,
													connected = :connected WHERE id = :id");
	$req->execute(array(
		':id' 			 => $id,
		':tag'   		 => $tag,
		':name_category' => $name_category,
		':order'		 => $order,
		':display'		 => $display,
		':connected'   	 => $connected,
	));
	return $req;
}