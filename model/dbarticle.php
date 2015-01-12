<?php
function db_get_article($link, $value){
<<<<<<< HEAD
	$req = $link -> prepare("SELECT title, content, id_category FROM pp_article WHERE id = :value");
=======
	$req = $link -> prepare("SELECT title, contents FROM pp_article WHERE id = :value");
>>>>>>> origin/AlexisWorkSpace
	$req->execute(array(
		':value' => $value
	));
}

<<<<<<< HEAD
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
=======
function db_create_article($link, $title, $content){
	try{
		$req = $link -> prepare("INSERT INTO pp_article 
			(title, contents)
			VALUES( :title,
					:contents) ");
		$success = $req->execute(array(
					':title' => $title,
					':content' => $content,
>>>>>>> origin/AlexisWorkSpace
				));
		return $success;
	}
	catch( PDOException $e ){
<<<<<<< HEAD
=======
		
>>>>>>> origin/AlexisWorkSpace
		debug($e);
		die();
	}
}