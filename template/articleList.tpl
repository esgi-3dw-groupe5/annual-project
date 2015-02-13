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
		<a onclick="change_state_read_after(this)" data-id-article="<?php print($data['id']); ?>" name="at_read_later" id="at_read_later">Lire plus tard</a>
		<script type="text/javascript">
			function change_state_read_after(article){
				var send = {};
				var id_article = $(article).attr('data-id-article');

				state = 1;
				send.id_article = id_article;
				send.state = state;
				send.at_read_later = "at_read_later";

				$.ajax({
					type : "POST",
     				url  : "http://127.0.0.1/annual-project/controller/coreAjax.php",
     				data : send,
     				success: function(data){
     					console.log(data);
     				},
     				dataType :"json"
  				});
			}
		</script>
		<a onclick="change_state_read(this)" data-id-article="<?php print($data['id']); ?>" name="at_read" id="at_read">  Lu</a>
		<script type="text/javascript">
			function change_state_read(article){
				var send = {};
				var id_article = $(article).attr('data-id-article');

				state = 0;
				send.id_article = id_article;
				send.state = state;
				send.at_read_later = "at_read";

				$.ajax({
					type : "POST",
     				url  : "http://127.0.0.1/annual-project/controller/coreAjax.php",
     				data : send,
     				success: function(data){
     					console.log(data);
     				},
     				dataType :"json"
  				});
			}
		</script>
		<br>
	</a>