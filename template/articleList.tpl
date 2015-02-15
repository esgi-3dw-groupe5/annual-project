<!--*************************************-->
<!--********* ARTICLES TEMPLATE *********-->
<!--*************************************-->
<?php 
$title = preg_replace('/\s+/', '-', strtolower($data['title_id']));
?>
<div class="article-inline">
	<span class="article-image" style="background:#<?php print($data_cat['color']);?>;"></span>
	<?php printf('<a href="%s/%s/%s">', $uri, $data_cat['tag'], $title); ?>
		<span class="article-title">
			<?php printf('<b>%s</b>', $data['title']); ?>
		</span>
	</a>
	<?php if( $_SESSION['user']['connected'] ){?>
		<input id="<?php print($data['id']);?>" class="read" 	<?php print$read 	?> 	type="button" name="" value="">
		<input id="<?php print($data['id']);?>" class="unread" 	<?php print$unread 	?> 	type="button" name="" value="">
	<?php } ?>
</div>

	