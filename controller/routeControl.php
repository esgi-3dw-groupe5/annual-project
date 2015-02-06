<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
function route_control(){
	$link = db_connect();
	
	$page = get_param('p', ''); 
	$article = get_param('article', '');

	if($page != ''){
		$result = db_get_content($link,'menu');	
		$data = $result -> fetchAll();

		$category = [];
		foreach ($data as $key => $value) {
			$category[] = $value['tag'];
		}

		if ( !in_array($page, $category) ){
			header("HTTP/1.x 404 Not Found");
			$error = file_get_contents(__ROOT__."/template/documents/404.html");
			echo $error;
			exit;
		}
	}
}