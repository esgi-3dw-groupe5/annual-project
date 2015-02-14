<!--*************************************-->
<!--********* ARTICLES TEMPLATE *********-->
<!--*************************************-->
<?php 
	$title = preg_replace('/\s+/', '-', strtolower($data['title_id']));
	printf('<a href="%s/%s/%s">', $config['source'], $data_cat['tag'], $title ); ?>
		<span class="article-image">
			<img src="">
		</span>
		<span class="article-title">
			<?php printf('<b>%s</b>', $data['title']); ?>
		</span>
	</a>