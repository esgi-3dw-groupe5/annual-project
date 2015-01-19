<?php
function db_create_article($link, $title_id, $title, $content, $id_category){
	// FIXME crate an article title column with : strtolower and a preg replace special character as éèà...
	try{
		$req = $link -> prepare("INSERT INTO pp_article 
			(title_id, title, content, id_category)
			VALUES( :title_id,
					:title,
					:content,
					:id_category) ");
		$success = $req->execute(array(
					':title_id' => $title_id,
					':title' => $title,
					':content' => $content,
					':id_category' => $id_category
				));
		return $success;
	}
	catch( PDOException $e ){
		debug($e);
		die();
	}
}
function db_get_articles($link){

	$req = $link -> prepare("SELECT * FROM pp_article");
	$req->execute(array(
	));
	return $req;
}

function db_get_category_tag($link, $value){

	$req = $link -> prepare("SELECT * FROM pp_categorie WHERE pp_categorie.id = :id");
	$req->execute(array(
		':id' => $value
	));
	return $req;
}
function db_get_category_id($link, $value){

	$req = $link -> prepare("SELECT * FROM pp_categorie WHERE pp_categorie.tag = :tag");
	$req->execute(array(
		':tag' => $value
	));
	return $req;
}
	
function db_get_article($link, $value, $id_category){

	$req = $link -> prepare("SELECT * FROM pp_article WHERE title_id = :value AND id_category = :id_category");
	$req->execute(array(
		':value' => $value,
		':id_category' => $id_category
	));
	return $req;
}