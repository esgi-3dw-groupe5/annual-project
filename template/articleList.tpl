<!--*************************************-->
<!--********* ARTICLES TEMPLATE *********-->
<!--*************************************-->
<?php 
$title = preg_replace('/\s+/', '-', strtolower($data['title_id']));
?>

<div class="article-inline">
	<span class="article-image" style="background:#<?php print($data_cat['color']);?>;"></span>
	<?php printf('<a class="article-title" href="%s%s/%s">',$uri, $data_cat['tag'], $title); ?>
		<span>
			<?php printf('<b>%s</b>', $data['title']); ?>
		</span><br>
		<span class="article-preview">
			<?php printf('%s...',$preview); ?>
		</span>
	</a>
	<?php if( $_SESSION['user']['connected'] ){?>
		<input id="<?php print($data['id']);?>" class="read" 	<?php print$read 	?> 	type="button" name="" value="">
		<input id="<?php print($data['id']);?>" class="unread" 	<?php print$unread 	?> 	type="button" name="" value="">
	<?php } ?>
</div>


	