<header>
	<!-- <h1>Pinnackl</h1> -->
	<img class="titre" src="images/titre.gif">
	<img class="logo" src="images/logo-gris.gif">
	<!-- <img src="images/fond.png"> -->
	<div id="clock">

    </div>

	<nav class="nav">
		<!-- <div class="subnav" id="index">
			<a href="/annual-project"><h3>index</h3></a>
		</div> -->
		<a href="http://127.0.0.1/annual-project/cine-serie"><div class="subnav" id="cine">
			<h3>Cinéma/Série</h3>
		</div></a>
		<a href="http://127.0.0.1/annual-project/technologie"><div class="subnav" id="techno">
			<h3>Technologies</h3>
		</div></a>
		<a href="http://127.0.0.1/annual-project/jeux-video"><div class="subnav" id="esport">
			<h3>E-sport</h3>
		</div></a>
		<a href="http://127.0.0.1/annual-project/musique"><div class="subnav" id="musique">
			<h3>Musique</h3>
		</div></a>
		<a href="http://127.0.0.1/annual-project/sport"><div class="subnav" id="sport">
			<h3>Sport</h3>
		</div></a>
		<?php if($_SESSION['user']['connected']) { ?>
			<a href="http://127.0.0.1/annual-project/home/%s"><div class="subnav" id="compte">
				<?php
					printf('<h3>Mon Compte</h3>',strtolower($_SESSION['user']['pseudo']));
				?>
			</div></a>
		<?php } ?>
	</nav>
</header>
