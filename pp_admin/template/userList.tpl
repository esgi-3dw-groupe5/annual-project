<tr style="border-bottom:solid thin #fff;">
	<td>
		<?php print$data['id'] ?>
	</td>
	<td>
		<?php print$data['firstname'] ?>
	</td>
	<td>
		<?php print$data['name'] ?>
	</td>
	<td>
		<?php print$data['pseudo'] ?>
	</td>
	<td>
		<?php print$data['role'] ?>
	</td>
	<td>
		<?php printf('<a href="'.$config['source'].'/pp_admin/user-edit/%s">Modifier</a>', $data['id']); ?>
	</td>
</tr>
