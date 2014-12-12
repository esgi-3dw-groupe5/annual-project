<?php include_once('header.php') ?>
<section>
	<div class="verif">
		<?php 
			include_once('connexion.php');
			$erreur = "";
			$tab = array_keys($_POST);
			if (array_diff(array_keys($_POST), $tab) == null && count($_POST) == count($tab))
			{
				if (isset($_POST['valider']))
				{
									
					if (isset($_POST['genre']))
					{
						if ($_POST['genre'] == "homme") $_POST['genre'] = 0;
						else if ($_POST['genre'] == "femme") $_POST['genre'] = 1;

						if (isset($_POST['nom']) && isset($_POST['prenom']))
						{
							if ($_POST['nom'] == $_POST['prenom'] || strlen($_POST['nom']) > 32 || strlen($_POST['prenom']) > 64) 
									$erreur = "Erreur: nom > 32 ou prenom > 64 ou nom=prenom.";
							
							if (isset($_POST['dateNais']))
							{
								if (strpos($_POST['dateNais'], "/"))
								{
									$date = explode("/", $_POST['dateNais']);
									if (checkdate($date[1], $date[0], $date[2]))
										$_POST['dateNais'] = $date[2]."-".$date[1]."-".$date[0];
								}
								else if (strpos($_POST['dateNais'], "-"))
								{
									$date = explode("-", $_POST['dateNais']);
									if (strlen($date[2]) == 4)
										if (checkdate($date[1], $date[0], $date[2]))
											$_POST['dateNais'] = $date[2]."-".$date[1]."-".$date[0];
									else if (strlen($date[0]) == 4)
										if (checkdate($date[1], $date[2], $date[0]))
											$_POST['dateNais'] = $date[0]."-".$date[1]."-".$date[2];
								}
								else $erreur = "Erreur: Format de la date incorrecte.";
								$age = ((time() - strtotime($_POST['dateNais'])) / 3600 / 24 / 365);
								if ($age < 10 || $age > 90)
								{
									$erreur = "Erreur: Vous devez avoir entre 10 et 90 ans pour vous inscrire.";
								}

								if (isset($_POST['email']) && isset($_POST['pseudo']))
								{
									if (strpos($_POST['email'], "@"))
									{
										$email = explode("@", $_POST['email']);
										if (!strpos($email[1], ".")) $erreur = "Erreur: Votre email n'est pas correct (nom de domaine).";
									} else $erreur = "Erreur: Votre email n'est pas correct (il manque le @).";
									if (strlen($_POST['pseudo']) < 4) $erreur = "Erreur: Pseudo trop court (4 caractères minimum).";
									if (isset($_POST['mdp']) && isset($_POST['mdpConf']))
									{
										if (!($_POST['mdp'] == $_POST['mdpConf'])) $erreur = "Erreur: La confirmation du mot de passe ne correspond pas à votre mot de passe.";
									}

									$req = $bdd->prepare("SELECT email, pseudo FROM Utilisateur");
									$req->execute();
									while($donnees = $req->fetch())
									{
										if ($donnees['email'] == $_POST['email'])
											$erreur = "Erreur: Email déjà existant.";
										else if ($donnees['pseudo'] == $_POST['pseudo'])
											$erreur = "Erreur: Pseudo déjà existant.";
									}
								}
							}
						}
						// echo "<pre>";
						// print_r($_POST);
						// echo "<pre>";
					}
					if (empty($erreur))
					{
						try
						{
							$tabInsert = array('genre' => $_POST['genre'],
												'nom' => $_POST['nom'],
												'prenom' => $_POST['prenom'],
												'email' => $_POST['email'],
												'pseudo' => $_POST['pseudo'],
												'mdp' => $_POST['mdp'],
												'date_naissance' => $_POST['dateNais'],
												'status' => 1);
							$insert = $bdd->prepare("INSERT INTO Utilisateur (genre, nom, prenom, email, pseudo, mdp, date_naissance, status)
													VALUES (:genre, :nom, :prenom, :email, :pseudo, :mdp, :date_naissance, :status)");
							$insert->execute($tabInsert);
							$erreur = "<h3>Votre inscription a bien été enregistrée.</h3>";
						}
						catch(Exception $e)
						{
							$erreur = 'Erreur: '. $e->getMessage();
						}
					}
				}
			}
			else
			{
				$erreur = "Erreur: Valeurs envoyées incorrectes (problème de correspondence des clés.)";
			}
			echo $erreur;

			
		?>
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
