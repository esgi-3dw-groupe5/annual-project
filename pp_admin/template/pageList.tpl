
	<tr style="border-bottom:solid thin #fff;">
		<td>
			<?php print$data['id'] ?>
		</td>
		<td>
			<?php print$data['tag'] ?>
		</td>
		<td>
			<?php print$data['name_category'] ?>
		</td>
		<td>
			<?php print$data['p_order'] ?>
		</td>
		<td>
			<?php print$data['display'] ?>
		</td>
		<td>
			<?php print$data['connected'] ?>
		</td>
		<td>
			<?php print$data['color'] ?>
		</td>
		<td>
			<?php printf('<a href="'.$config['source'].'/pp_admin/page-edit/%s">Modifier</a>', $data['id']); ?>
		</td>
	</tr>
