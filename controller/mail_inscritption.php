<?php 


$TO = "antoine.humbert@neoxia.com"; // Destinataire, a remplacer par $_SESSION['mail']

$subject = "Inscritption Pinnackl";

$h = "From: ".$TO." \n";
$h .='Content-Type: multipart/mixed;'."\n";

$boundary ="didondinaditondelosdudosdodudundodudindon"."\r\n\n";


if (isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['details']))
{	

	$message = $boundary;
	$message .= $_POST['name']."\r\n";
	$message .= $_POST['last_name']."\r\n";
	$message .= $_POST['details']."\r\n"; 

	mail($TO, $subject, $message, $h); 
	//header('Location: recrutement.php'); 
}
?> 