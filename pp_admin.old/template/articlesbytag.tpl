<li>
	<?php 
	echo "print";
	printf('
			<h3 class="email">%s</h3>
			<span class="link">				
			<a href="http://127.0.0.1/pp_admin/?article=%s&edit=edit">Modifier</a>
			<a href="http://127.0.0.1/pp_admin/?article=%s&delete=delete">Supprimer</a>			
			</span>', $data['title'], $data['id'], $data['id']); ?>
</li>
<hr>