<header>
	<!-- <h1>Pinnackl</h1> -->
	<img class="titre" src="images/titre.gif">
	<img class="logo" src="images/logo-gris.gif">
	<!-- <img src="images/fond.png"> -->
	<div id="clock">

    </div>

	<nav class="nav">
		<div class="subnav" id="index">
			<a href="/annual-project"><h3>index</h3></a>
		</div>
		<div class="subnav">
			<a href="http://127.0.0.1/annual-project/cine-serie"><h3>Cinéma/Série</h3></a>
		</div>
		<div class="subnav" id="techno">
			<a href="http://127.0.0.1/annual-project/technologie"><h3>Technologies</h3></a>
		</div>
		<div class="subnav" id="esport">
			<a href="http://127.0.0.1/annual-project/jeux-video"><h3>E-sport</h3></a>
		</div>
		<div class="subnav" id="musique">
			<a href="http://127.0.0.1/annual-project/musique"><h3>Musique</h3></a>
		</div>
		<div class="subnav" id="sport">
			<a href="http://127.0.0.1/annual-project/sport"><h3>Sport</h3></a>
		</div>
		<div class="subnav" id="compte">
			<?php 
				if($_SESSION['user']['connected'])
					printf('<a href="http://127.0.0.1/annual-project/home/%s"><h3>home</h3></a>',strtolower($_SESSION['user']['pseudo']));
			?>
		</div>
	</nav>
</header>
