<!--*************************************-->
<!--********* ARTICLES TEMPLATE *********-->
<!--*************************************-->
<?php 
	$title = preg_replace('/\s+/', '-', strtolower($data['title_id']));
?>
		<div class="content">
			<?php printf('<a href="%s/%s/%s">', $uri, $data_cat['tag'], $title ); ?>
				<span class="article-image">
					<img src="">
				</span>
				<span class="article-title">
					<?php printf('<b>%s</b>', $data['title']); ?>
				</span>
			</a>
			<?php if( $_SESSION['user']['connected'] ){?>
			<img src="/annual-project/images/etoile_vide.png" onclick="change_state_read_after(this)" data-id-article="<?php print($data['id']); ?>" name="at_read_later" id="at_read_later" >
			<script type="text/javascript">
				function change_state_read_after(article){

					if(document.getElementById("at_read_later").src=="/annual-project/images/etoile_pleine.png"){
					document.getElementById("at_read_later").src="/annual-project/images/etoile_vide.png";
					}
					else{
					document.getElementById("at_read_later").src="/annual-project/images/etoile_pleine.png";
					}
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
			<?php } ?>
		</div>

	