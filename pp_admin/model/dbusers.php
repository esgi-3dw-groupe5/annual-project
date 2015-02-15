<?php
function db_get_user($link, $value, $case = "email"){
	switch ($case) {
		case 'email':
				$req = $link -> prepare("SELECT CASE WHEN EXISTS ( SELECT ".$case." FROM pp_users WHERE email = :value )THEN 1 ELSE 0 END ");
				$req->execute(array(
					':value' => $value
				));
			break;
		case 'pseudo':
				$req = $link -> prepare("SELECT CASE WHEN EXISTS ( SELECT ".$case." FROM pp_users WHERE pseudo = :value )THEN 1 ELSE 0 END ");
				$req->execute(array(
					':value' => $value
				));
			break;

		case 'connexion':
				$req = $link -> prepare("SELECT pseudo, email, password, status, role, actif FROM pp_users WHERE email = :value");
				$req->execute(array(
					':value' => $value
				));
			break;
		
		default:
			# code...
			break;
	}
	return $req;
}

function db_create_user($link, $gender, $name, $firstname, $email, $password, $pseudo, $date, $cle){
	try{
		$req = $link -> prepare("INSERT INTO pp_users 
			(gender, firstname, name, pseudo, email, password, birth_date,cle)
			VALUES( :gender,
					:firstname,
					:name,
					:pseudo,
					:email,
					:password,
					:birth_date,
                    :cle) ");
		$success = $req->execute(array(
					':gender' => $gender,
					':firstname' => $firstname,
					':name' => $name,
					':pseudo' => $pseudo,
					':email' => $email,
					':password' => $password,
					':birth_date' => $date,
					':cle' => $cle
				));
		return $success;
	}
	catch( PDOException $e ){
		
		debug($e);
		die();
	}


}

function db_get_all_user($link){

	$req = $link -> prepare("SELECT * FROM pp_users");
	$req->execute();
	return $req;
}

function db_get_role_user($link,$value){

	$req = $link -> prepare("SELECT role FROM pp_users WHERE id:value");
	$req->execute(array(
		':value'   => $value
	));
	return $req;
}

function db_get_user_id($link){
	access_control();
	$pseudo = $_SESSION['user']['pseudo'];
	$req = $link -> prepare("SELECT id FROM pp_users WHERE pseudo = :pseudo");
	$req->execute(array(
		':pseudo'   => $pseudo
	));
	return $req;	
}

function db_update_cle_user($link,$cle){
    access_control();
    $pseudo = $_SESSION['user']['pseudo'];
    $req = $link->prepare("UPDATE pp_users SET cle = :cle WHERE pseudo like :pseudo ");
    $req->bindParam(':cle', $cle);
    $req->bindParam(':pseudo', $pseudo);
    $req->execute();
}

function db_get_actif_user($link){
    access_control();
    $pseudo = $_SESSION['user']['pseudo'];
    $req = $link -> prepare("SELECT actif FROM pp_users WHERE pseudo = :pseudo");
    $req->execute(array(
        ':pseudo'   => $pseudo
    ));
    return $req;	
}