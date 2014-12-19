<?php
require_once("controller/common.php");
require_once("model/dbconnect.php");
require_once("model/getusers.php");
function signin($POST){
	$erreur = 0;
	$messageErreur="";

	$pseudo		  = "";
	$nom 		  = "";
	$prenom 	  = "";
	$genre  	  = "";
	$email  	  = "";
	$confirmEmail = "";
	$mdp = "";
	$confirmMdp	 = "";
	if(isset($POST["valider"])) // AJAX later on
	{
		// On regarde si il n'y a pas de champs vides
		if( !empty($POST["dateNaissance"]) 
			&& !empty($POST["mdp"]) 
			&& !empty($POST["confirmMdp"]) 
			&& !empty($POST["email"]) 
			&& !empty($POST["confirmEmail"]) 
			&& !empty($POST["genre"]) 
			&& !empty($POST["nom"]) 
			&& !empty($POST["prenom"])
			&& !empty($POST["pseudo"]) ){

			/*******************************************************************/
			/****************************NOT REQUIRE****************************/
			/*******************************************************************/
			$nom 		  = variable_control($POST["nom"]);
			$prenom 	  = variable_control($POST["prenom"]);
			$genre  	  = variable_control($POST["genre"]);

			/*******************************************************************/
			/****************************REQUIRE********************************/
			/*******************************************************************/

			/*******************************************************************/
			/********************************EMAIL******************************/
			/*******************************************************************/
			$email  	  = variable_control_full($POST["email"]);
			$confirmEmail = variable_control_full($POST["confirmEmail"]);

				$messageErreur .= get_error("email", $email, $confirmEmail);
				$messageErreur .= get_error("validemail", $email);
				$messageErreur .= get_error("existemail", $email);

			/*******************************************************************/
			/********************************PSEUDO*****************************/
			/*******************************************************************/
			$pseudo 	  = variable_control($POST["pseudo"]);

				$messageErreur .= get_error("existpseudo", $pseudo);

			/*******************************************************************/
			/******************************PASSWORD*****************************/
			/*******************************************************************/
			$mdp 		  = $POST["mdp"];
			$confirmMdp	  = $POST["confirmMdp"];
				$messageErreur .= get_error("password", $mdp, $confirmMdp);
				// Check for lenght and special char requirement

			/*******************************************************************/
			/********************************DATE*******************************/
			/*******************************************************************/
			// Check the date format
		}
		else{
			$erreur = true;
		}
		// Database register
		// if nb error = 0 -> Register
	}	
	return $messageErreur;
}

function get_error($item, $parm1, $parm2 = null){
	$msg = "";
	switch ($item) {
		case 'email':
			if($parm1 != $parm2){
				$msg = "Les champs ".$item." doivent être identique.\r\n";
				$erreur++;
			}
			break;

		case 'validemail':
			if(!filter_var($parm1, FILTER_VALIDATE_EMAIL)){
				$msg = "Vous devez saisir une adresse email valide.\r\n";
				$erreur++;
			}
			break;

		case 'existemail':
			$link = db_connect();
			$result = db_get_user($link, $parm1);
			if( $result->fetch()[0] == "1"){
				$msg = "Cette adresse email est déjà utilisé.\r\n";
				$erreur++;
			}
			break;

		case 'existpseudo':
			$link = db_connect();
			$result = db_get_user($link, $parm1, "pseudo");
			if( $result->fetch()[0] == "1"){
				$msg = "Ce pseudo est déjà utilisé.\r\n";
				$erreur++;
			}
			break;

		case 'password':
			if($parm1 != $parm2){
				$msg = "Les champs ".$item." doivent être identique.\r\n";
				$erreur++;
			}
			break;
		
		default:
				$msg = "Vous n'avez pas rempli tous les champs obligatoires(*).\r\n";
				$erreur++;
			break;
	}
	return $msg;
}