<?php
	function render_article($article){
		$link = db_connect();
		switch ($page) {
			case 'cine':
				debug('plop');
				break;
			
			default:
				
				require(__ROOT__.'/template/mainArticle.tpl');
				break;
		}
	}
	function render_articles($page){
		$link = db_connect();
		switch ($page) {
			case 'cine':
				debug('plop');
				break;
			
			default:
				
				require(__ROOT__.'/template/mainArticle.tpl');
				break;
		}
	}
?>