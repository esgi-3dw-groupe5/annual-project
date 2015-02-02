<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
require_once(__ROOT__."/controller/common.php");
require_once(__ROOT__."/controller/accessControl.php");
require_once(__ROOT__."/model/dbconnect.php");
require_once(__ROOT__."/model/dbusers.php");
require_once(__ROOT__."/model/dbcontent.php");
	function render_contents($content){
		$link = db_connect();
		switch ($content) {
			case 'connection':
				$result = db_get_content($link);
				if( !$_SESSION['user']['connected'] ){include_once(__ROOT__."/template/formLogin.tpl");} 
				if( !$_SESSION['user']['connected'] ){include_once(__ROOT__."/template/formSignin.tpl");}
				break;
			case 'menu':
				$result = db_get_content($link);
				while ($data = $result -> fetch()) {
					require(__ROOT__.'/template/contentList.tpl');
				}
				break;
			
			default:
				# code...
				break;
		}
	}

	function render_articles($page){
		require('config.php');
		$link = db_connect();
		switch ($page) {
			case 'cine':
				debug('plop');
				break;
			
			default:
				$article = get_param('article', '');
				$page = get_param('p', '');
				if($article == ''){
					$result = db_get_articles($link);
					while ( $data = $result -> fetch() ){
						$result_cat = db_get_category_tag($link, $data['id_category']);
						$data_cat = $result_cat -> fetch();
							require(__ROOT__.'/template/articleList.tpl');
					}
				}
				else if($article != ''){
					$title_id = html_entity_decode( preg_replace('/-/', ' ', $article) );
					
					$result_cat = db_get_category_id($link, $page);
					$data_cat = $result_cat -> fetch();

					$result = db_get_article($link, $title_id, $data_cat['id']);
					$data = $result -> fetch();
					if( $result -> rowCount() > 0){
						require(__ROOT__.'/template/articleRead.tpl');
					}
					else{
						// requier tpl
						echo '<h1>Oups,<br>Aucun article trouver !<br><b>:-/</b></h1>';
					}
				}
				break;
		}
	}
?>