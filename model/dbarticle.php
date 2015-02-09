<?php
function db_create_article($link, $title, $title_id, $content, $id_category, $author){
	// FIXME crate an article title column with : strtolower and a preg replace special character as éèà...

	try{
		$req = $link -> prepare("INSERT INTO pp_article 
			(title_id, title, content, id_category, author)
			VALUES( :title_id,
					:title,
					:content,
					:id_category,
					:author) ");
		$success = $req->execute(array(
					':title_id' => $title_id,
					':title' => $title,
					':content' => $content,
					':id_category' => $id_category,
					':author' => $author
				));
		return $success;
	}
	catch( PDOException $e ){
		debug($e);
		die();
	}
}

function db_get_articles($link){

	$req = $link -> query("SELECT * FROM pp_article");
	// $req->execute();
	return $req;
}

function db_get_articles_rss($link,$limitation,$index_selection){

	$req = $link -> prepare("SELECT * FROM pp_article ORDER BY `date` DESC LIMIT 0, 10");
	$req->execute(array(
		/*':index_selection' => $index_selection,
		':limitation' => $limitation*/
	));
	return $req;
}


function db_get_articles_by_cat($link, $value){

	$req = $link -> prepare("SELECT * FROM pp_article WHERE pp_article.id_category = :id");
	$req->execute(array(
		':id' => $value
	));
	return $req;
}

function db_get_category($link){

	$req = $link -> prepare("SELECT * FROM pp_categorie");
	$req->execute();
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

function db_get_one_article($link,$value){

	 $req = $link -> prepare("SELECT * FROM pp_article WHERE id = :value");
	 $req->execute(array(
	  ':value' => $value
	 ));
	 return $req;
	}

function db_delete_article($link, $value){
	$req = $link -> prepare("DELETE FROM pp_article WHERE id = :value");
	$req->execute(array(
		':value' => $value
	));
}

function db_update_article($link,$title,$title_id,$content,$id_category,$value){
	$req = $link -> prepare("UPDATE FROM pp_article SET title   = :title,
														content = :content, 
														title_id = :title_id, 
														id_category = :id_category WHERE id = :value");
	$req->execute(array(
		':title'   => $title,
		':content' => $content,
		':title_id'=> $title_id,
		':id_category'=> $id_category,
		':value'   => $value
	));
}