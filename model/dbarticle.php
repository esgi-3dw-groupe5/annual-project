<?php
function db_get_article($link, $value){

	$req = $link -> prepare("SELECT title, content, id_category FROM pp_article WHERE id = :value");
	$req->execute(array(
		':value' => $value
	));
}

function db_create_article($link, $title, $content, $id_category){
	try{
		$req = $link -> prepare("INSERT INTO pp_article 
			(title, content, id_category)
			VALUES( :title,
					:content,
					:id_category) ");
		$success = $req->execute(array(
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