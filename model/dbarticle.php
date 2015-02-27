<?php
function db_create_article($link, $title, $title_id, $content, $id_category, $author){
	// FIXME crate an article title column with : strtolower and a preg replace special character AS éèà...

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

function db_get_articles($link){ // complete with the session limit values
	access_control();
	
	$range = range('b', 'z');

	$i = 0;
	$result = db_get_category($link);

	$facet = get_cookie();
	$request = "";
	while ($data = $result -> fetch()){
		if(array_key_exists($data['tag'], $facet)){
			if($request == "")
				$request = sprintf("SELECT * FROM (SELECT *, pp_article.date AS a_date FROM pp_article WHERE id_category = %s LIMIT %s) AS a ",$data['id'] , $facet[$data['tag']]);
			else
				$request .= sprintf(" UNION SELECT * FROM (SELECT *, pp_article.date AS a_date FROM pp_article WHERE id_category = %s LIMIT %s) AS %s", $data['id'], $facet[$data['tag']] , $range[$i]);
		}	
		$i++;
	}
	$query = $request." order by a_date DESC";
	$req = $link -> prepare($query);
	$req -> execute();
	return $req;
}

function db_get_articles_rss($link,$LIMITation,$index_selection){

	$req = $link -> prepare("SELECT * FROM pp_article ORDER BY `date` DESC LIMIT 0, 10");
	$req->execute(array(
		/*':index_selection' => $index_selection,
		':LIMITation' => $LIMITation*/
	));
	return $req;
}


function db_get_articles_by_cat($link, $value){

	$req = $link -> prepare("SELECT * FROM pp_article WHERE pp_article.id_category = :id order by date DESC");
	$req->execute(array(
		':id' => $value
	));
	return $req;
}

function db_get_category($link){

	$req = $link -> query("SELECT * FROM pp_category");
	return $req;
}

function db_get_category_tag($link, $value){

	$req = $link -> prepare("SELECT * FROM pp_category WHERE pp_category.id = :id");
	$req->execute(array(
		':id' => $value
	));
	return $req;
}
function db_get_category_id($link, $value){

	$req = $link -> prepare("SELECT * FROM pp_category WHERE pp_category.tag = :tag");
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
	return $req;
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
	return $req;
}

function db_read_later($link,$id_user,$id_article,$status){
	$req = $link -> prepare("INSERT INTO pp_user_history (id_user,id_article,status) VALUES (:id_user,:id_article,:status)");
	$req->execute(array(
		':id_user' 	  => $id_user,
		':id_article' => $id_article,
		':status'     => $status
	));
	return $req;
}

function db_read($link,$id_user,$id_article,$status){
	$req = $link -> prepare("UPDATE pp_user_history SET status = :status WHERE id_user = :id_user AND id_article = :id_article");
	$req->execute(array(
		'status'	  => $status,
		':id_user' 	  => $id_user,
		':id_article' => $id_article
	));
	return $req;
}

function db_get_status($link, $id_user, $id_article){
	$req = $link -> prepare("SELECT status FROM pp_user_history WHERE id_user = :id_user AND id_article = :id_article");
    $req->execute(array(
        ':id_user'    => $id_user,
        ':id_article' => $id_article
    ));
    return $req;
}

function db_get_user_article($link,$id_user){
	$req = $link -> prepare("SELECT id_article FROM pp_user_history WHERE id_user = :id_user AND status = 'unread'");
	$req->execute(array(
		':id_user' => $id_user
	));

	return $req;
}
