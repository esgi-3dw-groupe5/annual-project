<?php
require_once($source."controller/accessControl.php");
require_once($source."model/dbconnect.php");
require_once($source."model/dbusers.php");
require_once($source."model/dbcontent.php");
	function render_contents($content){
		global $source;
		$link = db_connect();
		switch ($content) {
			case 'connection':
				/*$result = db_get_content($link);*/
				if( !$_SESSION['user']['connected'] ){include_once($source."template/formLogin.tpl");} 
				break;
			case 'inscription':	
				if( !$_SESSION['user']['connected'] ){include_once($source."template/formSignin.tpl");}
				break;
			case 'menu':
				$result = db_get_content($link,'menu');

				while ($data = $result -> fetch()) {
					require($source.'template/contentList.tpl');
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
		switch ($page) { /* FAIRE INDEX ET INIT VAR GLOBALES*/
			case 'technologie' :
			display_article();
				break;
			case 'jeux-video' :
			display_article();
				break;
			case 'cine-serie' :
			display_article();
				break;
			case 'musique' :
			display_article();
				break;
			case 'sport' :
			display_article();
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
						// require tpl
						echo '<h1>Oups,<br>Aucun article trouvé !<br><b>:-/</b></h1>';
					}
				}
				break;
		}
	}

	function display_article(){
		global $co_msgErr;

		require('config.php');
		$link = db_connect();
		$page = get_param('p', '');
		$result = db_get_category_id($link, $page);
		$data = $result -> fetch();
		$value = $data['id']; 
		$req = db_get_articles_by_cat($link, $value);
		while($data = $req->fetch()){
			$result_cat = db_get_category_tag($link, $data['id_category']);
			$data_cat = $result_cat -> fetch();
				require(__ROOT__.'/template/articleList.tpl');
			$article = get_param('article', '');
			if($article != ''){
				$title_id = html_entity_decode( preg_replace('/-/', ' ', $article) );
					
				$result_cat = db_get_category_id($link, $page);
				$data_cat = $result_cat -> fetch();

				$result = db_get_article($link, $title_id, $data_cat['id']);
				$data = $result -> fetch();
				/*echo $data['id'];
				echo $_SESSION['user']['pseudo'];*/
			if( $result -> rowCount() > 0){
				require(__ROOT__.'/template/articleRead.tpl');
				if( $_SESSION['user']['connected'] ){require(__ROOT__.'/template/formComment.tpl');}
				
				$result_id = db_get_comments($link, $data['id']);
				while($data_comment = $result_id ->fetch()){
					require(__ROOT__.'/template/commentRead.tpl');
				}
			}
			else{
				// require tpl
				echo '<h1>Oups,<br>Aucun article trouvé !<br><b>:-/</b></h1>';
				}
			}
		}
	}
?>