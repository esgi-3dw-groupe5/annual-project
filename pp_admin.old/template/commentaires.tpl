<li>
	<?php 

	if ($data['status'] == 1 )
	{
		$comment = "Signalé";
	}

	elseif ($data['status'] == 0 )
	{
		$comment = "Valide";
	}
	printf('<h3 class="email">%s</h3>
			<h3>%s</h3>
			<h3>%s</h3>
			<h3>%s</h3>
			<span class="link">
			<a href="http://127.0.0.1/annual-project/pp_admin/?comment=%s&delete=delete">Supprimer</a>
			</span>', $data['comment'], $data['author'],$comment, $data['date_comment'], $data['id']); ?>
</li>

<hr>