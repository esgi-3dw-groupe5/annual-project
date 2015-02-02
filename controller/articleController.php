<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
require_once(__ROOT__."/controller/common.php");
require_once(__ROOT__."/controller/accessControl.php");
require_once(__ROOT__."/model/dbconnect.php");
require_once(__ROOT__."/model/dbusers.php");
require_once(__ROOT__."/model/dbarticle.php");


function validate_article($POST){
	$eror = 0;
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
		/*******************************************************************/
		/****************************REQUIRE********************************/
		/*******************************************************************/
		if(	empty($POST["at_title"]) &&
			empty($POST["at_content"]) &&
			empty($POST["at_category"]) ){
				$errorMessage[0] = get_error_article("default", null);
					$error++;
		}

		if(!empty($POST["at_title"])){
		/*******************************************************************/
		/*******************************TITLE*******************************/
		/*******************************************************************/
			$title = $POST["at_title"];
		}

		if(!empty($POST["at_content"])){
		/*******************************************************************/
		/*******************************TITLE*******************************/
		/*******************************************************************/
			$content = $POST["at_content"];
		}
		if(!empty($POST["at_category"])){
		/*******************************************************************/
		/******************************CATEGORY*****************************/
		/*******************************************************************/
			$id_category = $POST["at_category"];
		}
		$sucess = submit_article($title, $title, $content, $id_category);
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

function submit_article($title,$title,$content,$id_category)
{
	$link = db_connect();
	$req  = db_create_article($link,$title,$title,$content,$id_category);
	return $req;
}

function delete_article($id_category)
{
	$link = db_connect();
	$req  = db_delete_article($link,$id_category);
	return $req;
}

function update_article($title, $content, $id_category)
{
	$link = db_connect();
	$req  = db_update_article($link, $title, $content, $id_category);
	return $req;
}

?>