<?php
require_once($source."controller/common.php");
require_once($source."controller/accessControl.php");
require_once($source."model/dbconnect.php");
require_once($source."model/dbusers.php");
require_once($source."model/dbarticle.php");
require_once($source."model/dbcomment.php");


function validate_comment($POST){
	access_control();
	$error = 0;
	$errorMessage = array(
		'0' => ""
	);
	$content	  = "";
	/*****************/
	/*****CodeErr*****/
	/*****************/
	// ********************Comment********************
	// 0 -> All required field not filled

	if(isset($POST["co_submit"])){
		if(isset($POST['ajax'])) $ajax = $POST['ajax'];
		/*******************************************************************/
		/****************************REQUIRE********************************/
		/*******************************************************************/
		if(	empty($POST["co_content"])){
				$errorMessage[0] = get_error_comment("default", null);
					$error++;
		}

		if(!empty($POST["co_content"]) && strlen($POST["co_content"])>7){
		/*******************************************************************/
		/*******************************CONTENT******************************/
		/*******************************************************************/
			$content = strip_tags($POST["co_content"],'<p>');
		}
		else{
				$errorMessage[0] = get_error_comment("default", null);
					$error++;
		}
		$link =db_connect();

		$id_author = $_SESSION['user']['pseudo'];

		$article = get_param('article','');
		$page = get_param('p', '');


		$result_cat = db_get_category_id($link, $page);
		$data_cat = $result_cat -> fetch();

		$result = db_get_article($link,$article,$data_cat['id']);
		$data = $result -> fetch();

		// if nb error = 0 -> COmment
		if($error == 0){
			$sucess = submit_comment($content, $data['id'], $id_author);
		}
	}

	return $errorMessage;
}

function report_comment($POST){
	//FIXME access id_comment
	$link = db_connect();
	$id_comment = $POST['id'];
	$req = db_report_comment($link,$id_comment);
	return $req;
}

function get_error_comment($item, $parm1){
	$msg = "";
	switch ($item){
		case 'title' :
			break;
		default:
				$msg = "Vous n'avez pas rempli tous les champs obligatoires(*).";
	}
	return $msg;
}

function submit_comment($content, $id_article, $id_author)
{
	$link = db_connect();
	$req  = db_create_comment($link,$content, $id_article, $id_author);
	return $req;
}

function delete_comment($id)
{
	$link = db_connect();
	$req  = db_delete_comment($link,$id);
	return $req;
}

function update_comment($content, $id)
{
	$link = db_connect();
	$req  = db_update_comment($link, $content, $id);
	return $req;
}

?>