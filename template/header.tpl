<header>
	<img class="logo" src="images/logo-gris.png">

	<!-- <img class="logo" src="images/logo-gris.png"> -->
	<!-- <img src="images/fond.png"> -->
	<div id="clock">

    </div>

	<nav class="nav">
		<a class="subnav" id="index" href="/annual-project">Accueil</a>
		<a class="subnav" id="cine" href="http://127.0.0.1/annual-project/cine-serie">Cinéma/Série</a>
		<a class="subnav" id="techno" href="http://127.0.0.1/annual-project/technologie">Technologies</a>
		<a class="subnav" id="esport" href="http://127.0.0.1/annual-project/jeux-video">E-sport</a>
		<a class="subnav" id="musique" href="http://127.0.0.1/annual-project/musique">Musique</a>
		<a class="subnav" id="sport" href="http://127.0.0.1/annual-project/sport">Sport</a>
		<?php if($_SESSION['user']['connected']) { ?>
			<a class="subnav" id="compte" href="http://127.0.0.1/annual-project/home/%s">
				<?php
					printf('Mon Compte',strtolower($_SESSION['user']['pseudo']));
				?>
			</a>
		<?php } ?>
	</nav>
</header>
