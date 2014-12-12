<?php // include_once('header.php') ?>
<section>
	<div class="verif">

	</div>

	<div class="form">
		<h1>Formulaire d'inscription</h1>
		<form method="POST" action="formInscription.php">
			<input type="radio" name="genre" value="homme" required> Monsieur
			<input type="radio" name="genre" value="femme" required> Madame</br></br>
			Nom <input type="text" name="nom" required></br></br>
			Prenom <input type="text" name="prenom" required></br></br>
			Email <input type="email" name="email" required></br></br>
			Pseudo <input type="login" name="pseudo" required></br></br>
			Mot de passe <input type="password" name="mdp" maxlength="8" required></br></br>
			Confirmation <input type="password" name="mdpConf" maxlength="8" required></br></br>
			Date de naissance <input type="date" name="dateNais" placeholder="JJ/MM/AAAA" required></br></br>
			<input type="submit" name="valider" value="Valider"></br></br>
		</form>
	</div>
</section>
</body>
</html>
