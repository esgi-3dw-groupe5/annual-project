<header>
	<nav class="header">
		<?php
			render_contents('menu');
		?>
		<div class="subnav">
			<?php 
				if($_SESSION['user']['connected'])
					printf('<a href="http://127.0.0.1/annual-project/home/%s"><h3>home</h3></a>',strtolower($_SESSION['user']['pseudo']));
			?>
		</div>
	</nav>
</header>
