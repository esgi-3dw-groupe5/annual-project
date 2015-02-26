<form  method="post" name="at_update_page_form" id="at_update_page_form" action="<?php printf($config['source'].'/pp_admin/page/%s', $data['id']); ?>">
	<tr style="border-bottom:solid thin #fff;">
		<td>
			<input type="text"  name="at_id" value ="<?php print$data['id'] ?>" readonly/>
		</td>
		<td>
			<input type="text" name="at_tag" value ="<?php print$data['tag'] ?>">
		</td>
		<td>
			<input type="text"   name="at_name_category" value ="<?php print$data['name_category'] ?>">
		</td>
		<td>
			<input type="text"  name="at_order" value ="<?php print$data['p_order'] ?>">
		</td>
		<td>
			<select name="at_display">
				<?php 
					$selected_yes = '';
					$selected_no = '';
					if ($data['display'] == 'yes')
						$selected_yes = 'selected';
					if ($data['display'] == 'no')
						$selected_no = 'selected';
					
						echo "<option value='yes'".$selected_yes.">Yes </option>"; 
						echo "<option value='no'".$selected_no.">No</option>";

				?>
			</select>
		</td>
		<td>
			<select name="at_connected">

			<?php 
					$selected_yes = '';
					$selected_no = '';
					$selected_all = '';
					$selected_administrator = '';
					$selected_moderator ='';
					$selected_editor ='';

					if ($data['connected'] == 'yes')
						$selected_yes = 'selected';
					if ($data['connected'] == 'no')
						$selected_no = 'selected';
					if ($data['connected'] == 'all')
						$selected_all = 'selected';
					if ($data['connected'] == 'administrator')
						$selected_administrator = 'selected';
					if ($data['connected'] == 'editor')
						$selected_editor = 'selected';
					if ($data['connected'] == 'moderator')
						$selected_moderator = 'selected';
					
						echo "<option value='yes'".$selected_yes.">Yes </option>"; 
						echo "<option value='no'".$selected_no.">No</option>";
						echo "<option value='all'".$selected_all.">All </option>"; 
						echo "<option value='administrator'".$selected_administrator.">Administrateur</option>";
						echo "<option value='editor'".$selected_editor.">Editeur</option>"; 
						echo "<option value='moderator'".$selected_moderator.">Modérateur</option>";
				?>
			</select>
		</td>
		<td>
			<input type="text" name="at_color" value ="<?php print$data['color'] ?>" >
		</td>
	</tr>

 <div>
    <input type="submit" name="at_update_page_submit" value="modifier_page">
  </div>
</form>