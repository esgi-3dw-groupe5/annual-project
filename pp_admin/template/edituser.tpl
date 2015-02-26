<form  method="post" name="at_update_user_form" id="at_update_user_form" action="<?php printf($config['source'].'/pp_admin/user-edit/%s', $data['id']); ?>">
	<tr style="border-bottom:solid thin #fff;">
		<td>
			<input type="text"  name="at_id" value ="<?php print$data['id'] ?>" readonly/>
		</td>
		<td>
			<input type="text"  name="at_firstname" value ="<?php print$data['firstname'] ?>" readonly/>
		</td>
		<td>
			<input type="text" name="at_name" value ="<?php print$data['name'] ?>">
		</td>
		<td>
			<input type="text"   name="at_pseudo" value ="<?php print$data['pseudo'] ?>">
		</td>
		<td>
			<select name="at_role" id="at_role">
		      <?php
		        $link = db_connect();
		        $role = $link -> prepare("SELECT * FROM pp_role");
		        $role -> execute();
		        while($affiche = $role->fetch())
		        {	
		        	$selected = '';
		        	if ($data['role'] == $affiche['role'])
						$selected = 'selected';
		          echo '<option value="'.$affiche['role'].'"'.$selected.'>'.$affiche['role'].'</option>';
		        } 
		      ?>
		    </select>
		</td>
	</tr>

 <div>
    <input type="submit" name="at_update_user_submit" value="modifier_user">
  </div>
</form>