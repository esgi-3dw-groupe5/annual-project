<?php
function db_create_comment($link, $content, $id_article, $id_author){
	try{
		$req = $link -> prepare("INSERT INTO pp_comment 
			(id_article, comment, author)
			VALUES( :id_article,
					:comment,
					:author) ");
		$success = $req->execute(array(
					':id_article' => $id_article,
					':comment' => $content,
					':author' => $id_author
				));
		return $success;
	}
	catch( PDOException $e ){
		debug($e);
		die();
	}
}

function db_get_comments($link, $id_article){

	$req = $link -> prepare("SELECT * FROM pp_comment WHERE pp_comment.id_article = :id ORDER BY date_comment DESC");
	$req->execute(array(
		':id' => $id_article
	));
	return $req;
}

function db_delete_comment($link, $value){
	$req = $link -> prepare("DELETE FROM pp_comment WHERE id = :value");
	$req->execute(array(
		':value' => $value
	));
}

function db_update_comment($link,$content,$value){
	$req = $link -> prepare("UPDATE FROM pp_comment SET comment = :comment WHERE id = :value");
	$req->execute(array(
		':content' => $content,
		':value'   => $value
	));
}

function db_get_all_comments($link){

	$req = $link -> prepare("SELECT * FROM pp_comment");
	$req->execute();
	return $req;
}
