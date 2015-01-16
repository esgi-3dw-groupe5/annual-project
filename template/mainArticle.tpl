<!--*************************************-->
<!--********* ARTICLES TEMPLATE *********-->
<!--*************************************-->
<div class="core-article">
	<?php
		$article = get_param('article', '');
		if($article == ''){
			$result = db_get_articles($link);
			while ( $data = $result -> fetch() ){
				$result_cat = db_get_category_tag($link, $data['id_category']);
				$data_cat = $result_cat -> fetch();
				echo $data['title_id'];
	?>
			<div class="article-line inline">
				<?php printf('<a href="/annual-project/%s/%s">', $data_cat['tag'], preg_replace('/\s+/', '-', strtolower($data['title_id'])) ); ?>
					<span class="article-image">
						<img src="">
					</span>
					<span class="article-title">
						<?php printf('<b>%s</b>', $data['title']); ?>
					</span>
				</a>
			</div>
	<?php
			}
		}
		else if($article != ''){
			$title_id = html_entity_decode( preg_replace('/-/', ' ', $article) );
			$result = db_get_article($link, $title_id);
			$data = $result -> fetch();
			if( $result -> rowCount() > 0){
	?>
				<div>
					<?php printf('<h2>%s</h2>', $data['title']);?>
					<?php printf('<div class="article-body">%s</div>',$data['content']); ?>
				</div>
	<?php
			}
			else{
				// requier tpl
				echo '<h1>Oups,<br>Aucun article trouver !<br><b>:-/</b></h1>';
			}
		}
	?>
</div>