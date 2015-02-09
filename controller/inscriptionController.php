<?php
global $source;
require_once($source."controller/common.php");
require_once($source."controller/accessControl.php");
require_once($source."model/dbconnect.php");
require_once($source."model/dbusers.php");

function validate_field($POST){
	$ajax = null;

	$error = 0;
	// $errorMessage="";
	$errorMessage = array(
		'0' => "",
		'1' => "", 
		'2' => "", 
		'3' => "", 
		'4' => "", 
		'5' => "", 
		'6' => "", 
		'7' => "",
		'8' => "",
		'9' => "",
		'10' => "",
		'11' => "",
		'12' => ""
	);

	$pseudo		  = "";
	$name 		  = "";
	$firstname 	  = "";
	$gender  	  = "";
	$email  	  = "";
	$confirmEmail = "";
	$password 	  = "";
	$confirmPsw	  = "";
	$date	  	  = "";
	/*****************/
	/*****CodeErr*****/
	/*****************/
	// ********************Singin********************
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
	// *********************Login*********************
	// 10 -> Un-valid email address given
	// 11 -> All required field not filled
	// 12 -> Bad login given

	if(isset($POST["si_submit"])){ // AJAX later on

		if(isset($POST['ajax'])) $ajax = $POST['ajax'];

		/*******************************************************************/
		/****************************NOT REQUIRE****************************/
		/*******************************************************************/
		// On regarde si il n'y a pas de champs vides
		if( !empty($POST["gender"]) ){
			$gender  	  = variable_control($POST["gender"]);
		}
		if( !empty($POST["si_name"]) ){
			$name 		  = variable_control($POST["si_name"]);
		}
		if( !empty($POST["si_fistname"]) ){
			$firstname 	  = variable_control($POST["si_fistname"]);
		}

		/*******************************************************************/
		/****************************REQUIRE********************************/
		/*******************************************************************/
		if(	empty($POST["si_email"]) &&
			empty($POST["si_conf_email"]) &&
			empty($POST["si_psw"]) &&
			empty($POST["si_conf_psw"]) &&
			empty($POST["si_pseudo"]) ){
				$errorMessage[0] = get_error("default", null);
					$error++;
		}
		// On regarde si il n'y a pas de champs vides
		if( !empty($POST["date"]) ){
		/*******************************************************************/
		/********************************DATE*******************************/
		/*******************************************************************/
			$date 		  = $POST["date"];

				$errorMessage[8] = get_error("dateformat", $date, null);
				$errorMessage[9] = get_error("date", $date, null);
					if($errorMessage[8]!= "" || $errorMessage[9]!= "")
						$error++;
		}
		if( !empty($POST["si_psw"]) ){
		/*******************************************************************/
		/*******************************PASSWORD****************************/
		/*******************************************************************/
			$password 	  = $POST["si_psw"];

				$errorMessage[4] = get_error("validpassword", $password);
					if($errorMessage[4]!= "")
						$error++;
		}
		if( !empty($POST["si_psw"]) && !empty($POST["si_conf_psw"]) ){
		/*******************************************************************/
		/*******************************PASSWORD****************************/
		/*******************************************************************/
			$password 	  = $POST["si_psw"];
			$confirmPsw	  = $POST["si_conf_psw"];

				$errorMessage[4] = get_error("validpassword", $password);
				$errorMessage[5] = get_error("password", $password, $confirmPsw);
					if($errorMessage[4]!= "" || $errorMessage[5]!= "")
						$error++;
		}
		if( !empty($POST["si_email"]) ){
		/*******************************************************************/
		/********************************EMAIL******************************/
		/*******************************************************************/
			$email  	  = variable_control_full($POST["si_email"]);

				$errorMessage[1] = get_error("validemail", $email, null);
				$errorMessage[2] = get_error("existemail", $email, null);
					if($errorMessage[1]!= "" || $errorMessage[2]!= "")
						$error++;
		}
		if( !empty($POST["si_email"]) && !empty($POST["si_conf_email"]) ){
		/*******************************************************************/
		/********************************EMAIL******************************/
		/*******************************************************************/
			$email  	  = variable_control_full($POST["si_email"]);
			$confirmEmail = variable_control_full($POST["si_conf_email"]);

				$errorMessage[3] = get_error("email", $email, $confirmEmail);
				$errorMessage[1] = get_error("validemail", $email, null);
				$errorMessage[2] = get_error("existemail", $email, null);
					if($errorMessage[1]!= "" || $errorMessage[2]!= "" || $errorMessage[3]!= "")
						$error++;
		}
		if(!empty($POST["si_pseudo"])){
			/*******************************************************************/
			/********************************PSEUDO*****************************/
			/*******************************************************************/
			$pseudo 	  = variable_control($POST["si_pseudo"]);

				$errorMessage[7] = get_error("existpseudo", $pseudo, null);
					if($errorMessage[7]!= "")
						$error++;
		}

		// if nb error = 0 -> Register
		if( $error == 0 
			&& !empty($pseudo)
			&& !empty($email)
			&& !empty($confirmEmail)
			&& !empty($password)
			&& !empty($confirmPsw)
			&& !empty($date)
			&& $ajax === null
			&& isset($POST['si_submit'])
		){
		$success = register(trim($pseudo),trim($name),trim($firstname),trim($gender),$email,$password,$date);
		access_control();
		set_user_session(true, $pseudo, $email);
			// header('location: http://127.0.0.1/annual-project/');
			header('location: '.$_SESSION['url']);
		}
	}

	if(isset($POST['li_submit'])){
		
		if( !empty($POST['li_login']) ){
		/*******************************************************************/
		/********************************EMAIL******************************/
		/*******************************************************************/
			$email 	=	$POST['li_login'];

				$errorMessage[10] = get_error("validemail", $email, null);
					if($errorMessage[10]!= "")
						$error++;
		}
		if( empty($POST['li_password']) ){
		/*******************************************************************/
		/*******************************PASSWORD****************************/
		/*******************************************************************/
			$password 	=	$POST['li_password'];

				$errorMessage[11] = get_error("notfill", $password, null);
					if($errorMessage[11]!= "")
						$error++;
		}
		if( !empty($POST['li_password']) && !empty($POST['li_login']) ){
		/*******************************************************************/
		/*******************************CONNEXION***************************/
		/*******************************************************************/
			$email 		=	$POST['li_login'];
			$password 	=	$POST['li_password'];

				$errorMessage[10] = get_error("validemail", $email, null);
					if($errorMessage[10]!= "")
						$error++;
		}
		// if nb error = 0 -> Connect
		if( $error == 0 
			&& !empty($email)
			&& !empty($password)
			&& $ajax === null
			&& isset($POST['li_submit'])
		){
			$connection = get_error("connection", $email, $password);
			if( isset($connection['pseudo']) ){
				access_control();
				set_user_session( true, $connection['pseudo'], $connection['email'], $connection['role'] );
					header('location: '.$_SESSION['url']);
					// header('location: /');
			}
			else{
				$errorMessage[12] = $connection;
			}
		}
	}

	return $errorMessage;
}
// FIXME : rename functinon in get error connectino
function get_error($item, $parm1, $parm2 = null){
	// get error memssage from db
	$msg = "";
	switch ($item) {
		case 'validemail':
			if(!filter_var($parm1, FILTER_VALIDATE_EMAIL)){
				// $codeErr = 1;
				$msg = "Vous devez saisir une adresse email valide.";
			}
			break;

		case 'existemail':
			$link = db_connect();
			$result = db_get_user($link, $parm1);
			if( $result->fetch()[0] == "1"){
				// $codeErr = 2;
				$msg = "Cette adresse email est déjà utilisé.";
			}
			break;

		case 'email':
			if($parm1 != $parm2){
				// $codeErr = 3;
				$msg = "Les champs email doivent être identique.";

			}
			break;

		case 'validpassword':

			// if (!preg_match("/.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/", $parm1)){
			if (!preg_match("/.*^(?=.{8,20})(?=.*[a-z])(?=.*[0-9])(?=.*\W).*$/",$parm1) 
					|| strlen($parm1)<8
					|| strlen($parm1)>20){
 				$msg = "Le mot de passe ne respecte pas les carractère requis";
			}
			break;

		case 'password':
			if($parm1 != $parm2){
				// $codeErr = 5;
				$msg = "Les champs password doivent être identique.";
			}
			break;

		case 'existpseudo':
			$link = db_connect();
			$result = db_get_user($link, $parm1, "pseudo");
			if( $result->fetch()[0] == "1"){
				// $codeErr = 6;
				$msg = "Ce pseudo est déjà utilisé.";
			}
			break;

		case 'dateformat':
			$p=0;
			if(preg_match("/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](\d\d\d\d)$/", $parm1, $dateArr)==1){$p=1;}
			else if(preg_match("/^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](\d\d\d\d)$/", $parm1, $dateArr)==1){$p=1;}
			else if(preg_match("/^(\d\d\d\d)[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])$/", $parm1, $dateArr)==1){$p=1;}
				if( $p==0 ){
					// $codeErr = 8;
					$msg = "Ceci n'est pas une date";
				}
			break;

		case 'date':
			$p=0;
			if(preg_match("/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](\d\d\d\d)$/", $parm1, $dateArr)==1){$p=1;}
			else if(preg_match("/^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](\d\d\d\d)$/", $parm1, $dateArr)==1){$p=1;}
			else if(preg_match("/^(\d\d\d\d)[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])$/", $parm1, $dateArr)==1){$p=1;}
				if( $p==1 && $dateArr[0] == 10){
					if( !checkdate($dateArr[2], $dateArr[1], $dateArr[3]) ){
						// $codeErr = 9;
						$msg = "Cette date n`exist pas";
	
					}
				}
			break;

		case 'connection':
			$link = db_connect();
			$result = db_get_user($link, $parm1, "connexion");
			$data = $result->fetch();

				if( password_verify($parm2, $data['password']) ){
					$connection = array(
						'pseudo' 	=> $data['pseudo'], 
						'email' 	=> $data['email'], 
						'password' 	=> $data['password'], 
						'status' 	=> $data['status'], 
						'role' 		=> $data['role'] 
						);
					return $connection;
				}
				else{
					$msg = "Login ou mot de passe invalide,\n\r
					si vous ne vous souvenez plus de vos identifiant cliquer ici pour les réinitialiser ";	
				}
			break;

		case 'notfill' :
				// $codeErr = 11;
				$msg = "Vous n'avez pas rempli tous les champs obligatoires(*).";
			break;

		default:
				// $codeErr = 0;
				$msg = "Vous n'avez pas rempli tous les champs obligatoires(*).";
			break;
	}
	return $msg;
}

function register($pseudo,$name,$firstname,$gender,$email,$password,$date){
	$link = db_connect();
	
	$hash_psw = password_hash($password, PASSWORD_DEFAULT);

	$db_date="";
	if(preg_match("/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](\d\d\d\d)$/", $date, $dateArr)==1){
		// debug($dateArr);
		$db_date = $dateArr[3]."-".$dateArr[2]."-".$dateArr[1];
		// echo $db_date;
	}
	else if(preg_match("/^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](\d\d\d\d)$/", $date, $dateArr)==1){
		// debug($dateArr);
		$db_date = $dateArr[3]."-".$dateArr[1]."-".$dateArr[2];
		// echo $db_date;
	}
	else if(preg_match("/^(\d\d\d\d)[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])$/", $date, $dateArr)==1){
		// debug($dateArr);
		$db_date = $dateArr[1]."-".$dateArr[3]."-".$dateArr[2];
		// echo $db_date;
	}

	$req = db_create_user($link, $gender, $name, $firstname, $email, $hash_psw, $pseudo, $db_date);
	return $req;
}