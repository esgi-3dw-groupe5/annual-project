<?php
require_once($source."controller/common.php");
require_once($source."controller/accessControl.php");
require_once($source."model/dbconnect.php");
require_once($source."model/dbusers.php");
require_once($source."model/dbarticle.php");


function validate_article($POST,$value){
	access_control();
	$error = 0;
	$errorMessage = array(
		'0' => ""
	);

	$title		  = "";
	$content	  = "";
	$id_category  = "";
	/*****************/
	/*****CodeErr*****/
	/*****************/
	// ********************Article********************
	// 0 -> All required field not filled

	if(isset($POST["at_submit"])){
		if(isset($POST['ajax'])) $ajax = $POST['ajax'];


		if(!empty($POST["at_title"])){
		/*******************************************************************/
		/*******************************TITLE*******************************/
		/*******************************************************************/
			$title = $POST["at_title"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}

		if(!empty($POST["at_content"])){
		/*******************************************************************/
		/*******************************TITLE*******************************/
		/*******************************************************************/
			$content = $POST["at_content"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}
		if(!empty($POST["at_category"])){
		/*******************************************************************/
		/******************************CATEGORY*****************************/
		/*******************************************************************/
			$id_category = $POST["at_category"];
		}
		else{
			$errorMessage[0] = get_error_article("default", null);
			$error++;
		}
		$author = $_SESSION['user']['pseudo'];
		if ($error == 0
			&& !empty($title)
			&& !empty($content)
			&& !empty($id_category)){
			$title_id = cleanString($title);
			if($value == "create"){
				$sucess = submit_article($title,$title_id,$content, $id_category, $author);
			}
			elseif ($value == "update") {
				$success = update_article($title,$title_id,$content,$id_category,$value);
			}
		}
	}

	return $errorMessage;
}

function get_error_article($item, $parm1){
	$msg = "";
	switch ($item){
		case 'title' :
			break;
		default:
				$msg = "Vous n'avez pas rempli tous les champs obligatoires(*).";
	}
	return $msg;
}

function submit_article($title,$title_id,$content,$id_category,$author)
{
	$link = db_connect();
	$req  = db_create_article($link,$title,$title_id,$content,$id_category,$author);
	return $req;
}

function delete_article($id)
{
	$link = db_connect();
	$req  = db_delete_article($link,$id);
	return $req;
}

function update_article($title,$title_id,$content,$id_category,$value)
{
	$link = db_connect();
	$req  = db_update_article($link, $title,$title_id,$content,$id_category,$value);
	return $req;
}

?>