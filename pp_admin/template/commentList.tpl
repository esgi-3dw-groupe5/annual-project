
<tr style="border-bottom:solid thin #fff;">
	<td>
		<?php print$data['comment'] ?>
	</td>
	<td>
		<?php print$data['author'] ?>
	</td>
	<td>
		<?php printf('<a href="'.$config['source'].'/pp_admin/comment-edit/%s">Mettre a jour la commentaire</a>', $data['id']); ?>
	</td>
</tr>