<div id="toggle_commentaire">
	<?php printf('<h2>%s</h2>', $data_comment['author']);?>
	<?php 
	if($data_comment['status'] == 1){
		printf('<p>Ce commentaire a été signalé.</p>');
	}
	elseif ($data_comment['status'] == 0) {
		printf('<div class="article-body">%s</div>',$data_comment['comment']); 
	}?>

	<?php printf('<p>Posté le : %s</p>', $data_comment['date_comment']);?>
</div>
<hr>
