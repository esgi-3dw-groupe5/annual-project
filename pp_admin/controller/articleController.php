<?php
require_once($source."pp_admin/controller/common.php");
require_once($source."pp_admin/controller/accessControl.php");
require_once($source."pp_admin/model/dbconnect.php");
require_once($source."pp_admin/model/dbusers.php");
require_once($source."pp_admin/model/dbarticle.php");


function validate_article($POST,$FILES,$value){
	access_control();
	$error = 0;
	$errorMessage = array(
		'0' => "",
		'13'=> "",
		'14'=> ""
	);

	$title		  = "";
	$content	  = "";
	$id_category  = "";
	/*****************/
	/*****CodeErr*****/
	/*****************/
	// ********************Article********************
	// 0 -> All required field not filled
	// 13 -> Wrong image's format

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

		if(!empty($FILES["at_image"]['name'])){
		/*******************************************************************/
		/******************************CATEGORY*****************************/
		/*******************************************************************/
			$valid_extension = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
			$extension_upload = strtolower(  substr(  strrchr($FILES['at_image']['name'], '.')  ,1)  );

			if ( !in_array($extension_upload,$valid_extension) ){
				$errorMessage[13] = get_error_article("format", null);
				$error++;
			}

			if ($FILES['at_image']['size'] > 2095125){
				$errorMessage[14] = get_error_article("weight", null);
				$error++;
			}
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
				global $source;
				imagepng(imagecreatefromstring(file_get_contents($FILES['at_image']['tmp_name'])),$source."images/image_article/{$title_id}.png");
				list($width,$height)=getimagesize($source."images/image_article/{$title_id}.png");
				$newwidth=60;
				$newheight=($height/$width)*$newwidth;
				$src = imagecreatefrompng($source."images/image_article/{$title_id}.png");
				$tmp = imagecreatetruecolor($newwidth,$newheight);
				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				imagepng($tmp,$source."images/miniature_article/{$title_id}.png");
				imagedestroy($src);
				imagedestroy($tmp);
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
		case 'format':
			$msg = "Le format de l'image n'est pas correct.";
			break;
		case 'weight':
			$msg = "La taille du fichier ne doit pas excéder 2mo.";
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


function read($POST,$status,$id_user,$id_article){
	$link = db_connect();
	if($status == 'read' || $status == 'unread'){
		$req = db_read($link,$id_user,$id_article,$status);		
	}
	elseif($status == 'notset_nonlu'){
		$status = 'unread';
		$req = db_read_later($link,$id_user,$id_article,$status);
	}
	elseif($status == 'notset_lu'){
		$status = 'read';
		$req = db_read_later($link,$id_user,$id_article,$status);
	}	

	return $req;
}


?>