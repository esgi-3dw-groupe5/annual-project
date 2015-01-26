<?php
	function render_articles($page){
		require('config.php');
		$link = db_connect();
		switch ($page) {
			case 'cine':
				debug('plop');
				break;
			case 'technologie' :
			$value = 4;
			display_article($value);
				break;
			case 'jeux-video' :
			$value = 2;
			display_article($value);
				break;
			case 'cine-serie' :
			$value = 5;
			display_article($value);
				break;
			case 'musique' :
			$value = 3;
			display_article($value);
				break;
			case 'sport' :
			$value = 1;
			display_article($value);
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

	function display_article($value){
		require('config.php');
		$link = db_connect();
		$req = db_get_articles_by_cat($link, $value);
		while($data = $req->fetch()){
			$result_cat = db_get_category_tag($link, $data['id_category']);
			$data_cat = $result_cat -> fetch();
				require(__ROOT__.'/template/articleList.tpl');
		}
	}
?>