<?php
	$date = date_create($data['date']);
?>
<div class="content">
	<h2><?php print $data['title']; ?></h2>
	<br> 
	<div class="article-body">
		<?php print $data['content']; ?>
	<div>
	<br>
	<div>
		<span>Ecrit par : <?php print $data['author']; ?><span>
	</div>
	<div>
		<span>Publier le : <?php print date_format($date, 'd/m/Y'); ?><span>
	</div>
</div>
