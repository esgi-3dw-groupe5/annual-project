	<div>
		<?php printf('<h2>%s</h2>', $data['title']);?>
		<?php printf('<div class="article-body">%s</div>',$data['content']); ?>
		<?php printf('<p>Ecrit par : %s   le : %s </p>', $data['author'], $data['date']);?>
	</div>
