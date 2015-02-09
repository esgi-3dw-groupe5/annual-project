<?php
function route_control(){
	global $source;
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
			$error = file_get_contents($source."template/documents/404.html");
			echo $error;
			exit;
		}
	}
}