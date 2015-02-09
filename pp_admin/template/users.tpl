<li>
<?php 
	printf('<h3>%s</h3>
			<h3 class="email">%s</h3>
			<h3>%s</h3>
			<span class="link"> 
				<a href="http://127.0.0.1/annual-project/pp_admin/?id=%s&edit=edit">Modifier</a>
				<a href="http://127.0.0.1/annual-project/pp_admin/?id=%s&delete=delete">Supprimer</a>			
			</span>			
			
			', $data['pseudo'], $data['email'],$data['role'], $data['id'], $data['id']); ?>
</li>
<hr>