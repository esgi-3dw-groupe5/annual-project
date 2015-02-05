<form action="<?php print($_SESSION['url']); ?>" method="post" name="<?php print($data_comment['id']); ?>" id="co_form">
<div>
	<?php printf('<h2>%s</h2>', $data_comment['author']);?>
	<?php printf('<div class="article-body">%s</div>',$data_comment['comment']); ?>
	<?php printf('<p>Posté le : %s</p>', $data_comment['date_comment']);?>
</div>
	<input type="submit" name="co_report" value="signaler">
</form>