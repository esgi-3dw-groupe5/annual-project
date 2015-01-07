<?php
function db_get_article($link, $value){
	$req = $link -> prepare("SELECT title, contents FROM pp_article WHERE id = :value");
	$req->execute(array(
		':value' => $value
	));
}

function db_create_article($link, $title, $content){
	try{
		$req = $link -> prepare("INSERT INTO pp_article 
			(title, contents)
			VALUES( :title,
					:contents) ");
		$success = $req->execute(array(
					':title' => $title,
					':content' => $content,
				));
		return $success;
	}
	catch( PDOException $e ){
		
		debug($e);
		die();
	}
}