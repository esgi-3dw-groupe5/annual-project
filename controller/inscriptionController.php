<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
require_once(__ROOT__."/controller/common.php");
require_once(__ROOT__."/model/dbconnect.php");
require_once(__ROOT__."/model/getusers.php");

function validate_field($POST){
	$error = 0;
	// $messageErreur="";
	$messageErreur = array(
		'0' => "",
		'1' => "", 
		'2' => "", 
		'3' => "", 
		'4' => "", 
		'5' => "", 
		'6' => "", 
		'7' => "",
		'8' => "",
		'9' => ""
	);

	$pseudo		  = "";
	$nom 		  = "";
	$prenom 	  = "";
	$genre  	  = "";
	$email  	  = "";
	$confirmEmail = "";
	$mdp 		  = "";
	$confirmMdp	  = "";
	$date	  	  = "";
	/*****************/
	/*****CodeErr*****/
	/*****************/
	// 0 -> All required field not filled
	// 1 -> Un-valid email address given
	// 2 -> Email given already exit
	// 3 -> Both email given are not the same
	// 4 -> Password given do not respect requirement
	// 5 -> Both password given are not the same
	// 6 -> Pseudo given do not respect requirement 
	// 7 -> Pseudo given already exit
	// 8 -> Date given is not a date
	// 9 -> Date given does not exit

	if(isset($POST["valider"])){ // AJAX later on

		/*******************************************************************/
		/****************************NOT REQUIRE****************************/
		/*******************************************************************/
		// On regarde si il n'y a pas de champs vides
		if( !empty($POST["genre"]) ){
			$genre  	  = variable_control($POST["genre"]);
		}
		if( !empty($POST["si_name"]) ){
			$nom 		  = variable_control($POST["si_name"]);
		}
		if( !empty($POST["si_fistname"]) ){
			$prenom 	  = variable_control($POST["si_fistname"]);
		}

		/*******************************************************************/
		/****************************REQUIRE********************************/
		/*******************************************************************/
		// On regarde si il n'y a pas de champs vides
		if( !empty($POST["date"]) ){
		/*******************************************************************/
		/********************************DATE*******************************/
		/*******************************************************************/
			$date 		  = $POST["date"];

				$messageErreur[8] = get_error("dateformat", $date, null, $error);
				$messageErreur[9] = get_error("date", $date, null, $error);
		}
		if( !empty($POST["si_psw"]) && !empty($POST["si_conf_psw"]) ){
		/*******************************************************************/
		/*******************************PASSWORD****************************/
		/*******************************************************************/
			$mdp 		  = $POST["si_psw"];
			$confirmMdp	  = $POST["si_conf_psw"];

				$messageErreur[5] = get_error("password", $mdp, $confirmMdp, $error);
			// FIXME : Check for password
		}
		if( !empty($POST["si_email"]) ){
			$email  	  = variable_control_full($POST["si_email"]);

				$messageErreur[1] = get_error("validemail", $email, null, $error);
				$messageErreur[2] = get_error("existemail", $email, null, $error);
		}
		if( !empty($POST["si_email"]) && !empty($POST["si_conf_email"]) ){
		/*******************************************************************/
		/********************************EMAIL******************************/
		/*******************************************************************/
			$email  	  = variable_control_full($POST["si_email"]);
			$confirmEmail = variable_control_full($POST["si_conf_email"]);

				$messageErreur[3] = get_error("email", $email, $confirmEmail, $error);
				$messageErreur[1] = get_error("validemail", $email, null, $error);
				$messageErreur[2] = get_error("existemail", $email, null, $error);
		}
		if(!empty($POST["si_pseudo"])){
			/*******************************************************************/
			/********************************PSEUDO*****************************/
			/*******************************************************************/
			$pseudo 	  = variable_control($POST["si_pseudo"]);

				$messageErreur[7] = get_error("existpseudo", $pseudo, null, $error);
		}
		// Database register
		// if nb error = 0 -> Register
		if($error == 0 ){
			register($pseudo,$nom,$prenom,$genre,$email,$mdp,$date);
		}
	}

	return $messageErreur;
}
function get_error($item, $parm1, $parm2 = null, $error){
	// get error memssage from db
	$msg = "";
	switch ($item) {
		case 'validemail':
			if(!filter_var($parm1, FILTER_VALIDATE_EMAIL)){
				// $codeErr = 1;
				$msg = "Vous devez saisir une adresse email valide.";
				
				$error++;
			}
			break;

		case 'existemail':
			$link = db_connect();
			$result = db_get_user($link, $parm1);
			if( $result->fetch()[0] == "1"){
				// $codeErr = 2;
				$msg = "Cette adresse email est déjà utilisé.";
				
				$error++;
			}
			break;

		case 'email':
			if($parm1 != $parm2){
				// $codeErr = 3;
				$msg = "Les champs ".$item." doivent être identique.";
				
				$error++;

			}
			break;

		case 'validpassword':
			// if(){
				// $codeErr = 4;
				$msg = "Le mot de passe ne respecte pas les carractère requis";
				
				$error++;
			// }
			break;

		case 'password':
			if($parm1 != $parm2){
				// $codeErr = 5;
				$msg = "Les champs ".$item." doivent être identique.";
				
				$error++;
			}
			break;

		case 'existpseudo':
			$link = db_connect();
			$result = db_get_user($link, $parm1, "pseudo");
			if( $result->fetch()[0] == "1"){
				// $codeErr = 6;
				$msg = "Ce pseudo est déjà utilisé.";
				
				$error++;
			}
			break;

		case 'dateformat':
			$p=0;
			if(preg_match("/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](\d\d\d\d)$/", $parm1, $dateArr)==1){
				$p=1;
			}
			else if(preg_match("/^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](\d\d\d\d)$/", $parm1, $dateArr)==1){
				$p=1;
			}
			else if(preg_match("/^(\d\d\d\d)[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])$/", $parm1, $dateArr)==1){
				$p=1;
			}
				if( $p==0 ){
					// $codeErr = 8;
					$msg = "Ceci n'est pas une date";
					
					$error++;
				}
			break;

		case 'date':
			$p=0;
			if(preg_match("/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](\d\d\d\d)$/", $parm1, $dateArr)==1){
				$p=1;
			}
			else if(preg_match("/^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](\d\d\d\d)$/", $parm1, $dateArr)==1){
				$p=1;
			}
			else if(preg_match("/^(\d\d\d\d)[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])$/", $parm1, $dateArr)==1){
				$p=1;
			}
				if( $p==1 && $dateArr[0] == 10){
					if( !checkdate($dateArr[2], $dateArr[1], $dateArr[3]) ){
						// $codeErr = 9;
						$msg = "Cette date n`exist pas";
						
						$error++;
					}
				}
			break;
		
		default:
				// $codeErr = 0;
				$msg = "Vous n'avez pas rempli tous les champs obligatoires(*).";
				
				$error++;
			break;
	}
	return $msg;
}

function register($pseudo,$nom,$prenom,$genre,$email,$mdp,$date){
	$link = db_connect();
		password_hash("rasmuslerdorf", PASSWORD_DEFAULT);	
}