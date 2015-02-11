<?php
require_once($source."controller/accessControl.php");
require_once($source."model/dbconnect.php");
require_once($source."model/dbusers.php");
require_once($source."model/dbcontent.php");
	function render_contents($content){
		global $source;
		$link = db_connect();

		$result = db_get_category($link);
		if($content == ''){display_all_articles();}
		while($data = $result -> fetch()){
			if($data['tag'] == $content ){
				display_article();
			}
			else{}
		}	

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
			case 'form_article':
				global $at_msgErr;

				if( $_SESSION['user']['connected'] ){include_once($source."template/formArticle.tpl");}
				break;
			default:
				# code...
				break;
		}
	}


	function display_all_articles(){
		global $source;
		require('config.php');
		$link = db_connect();
		$result = db_get_articles($link);
		while($data = $result -> fetch()){
			$result_cat = db_get_category_tag($link, $data['id_category']);
			$data_cat = $result_cat -> fetch();
			require($source.'template/articleList.tpl');
		}
		
	}

	function display_article(){
		global $source;
		global $co_msgErr;

		require('config.php');
		$link = db_connect();
		$page = get_param('p', '');
		$article = get_param('article', '');

		$result = db_get_category_id($link, $page);
		$data = $result -> fetch();
		$value = $data['id']; 
		$req = db_get_articles_by_cat($link, $value);

		while($data = $req->fetch()){
			if($article == ''){
				$result_cat = db_get_category_tag($link, $data['id_category']);
				$data_cat = $result_cat -> fetch();
					require($source.'template/articleList.tpl');
			}
			elseif($article != ''){
					
				$result_cat = db_get_category_id($link, $page);
				$data_cat = $result_cat -> fetch();

				$result = db_get_article($link, $article, $data_cat['id']);
				$data = $result -> fetch();
			if( $result -> rowCount() > 0){
				require($source.'template/articleRead.tpl');
				if( $_SESSION['user']['connected'] ){require($source.'template/formComment.tpl');}
				
				$result_id = db_get_comments($link, $data['id']);
				while($data_comment = $result_id ->fetch()){
					require($source.'template/commentRead.tpl');
				}
				break;
			}
			else{
				// require tpl
				echo '<h1>Oups,<br>Aucun article trouvé !<br><b>:-/</b></h1>';
				break;
				}
			}
		}
	}
?>