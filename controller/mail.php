<?php

function signmail($pseudo,$firstname,$email,$cle){
    
    
    ob_start(); // turn on output buffering
    include('signmail.php');
    $res = ob_get_contents(); // get the contents of the output buffer
    ob_end_clean(); //  clean (erase) the output buffer and turn off output buffering

    
    
        
    
    $mail = $email; // Déclaration de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
    $passage_ligne = "\r\n";
    }
    else
    {
    $passage_ligne = "\n";
    }
    //=====Déclaration des messages au format texte et au format HTML.
    //$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
    
    
    $message_html = $res;
    //==========

    
    
    //=====Création de la boundary
    $boundary = "-----=".md5(rand());
    //==========

    //=====Définition du sujet.
    $sujet = "Bienvenue sur Pinnackl ".$firstname." !";
    //=========

    //=====Création du header de l'e-mail.
    $header = "From: \"Pinnackl\"<pinnakle.work@gmail.com>".$passage_ligne;
    $header.= "Reply-to: \"Pinnackl\" <pinnakle.work.com>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    //==========

    //=====Création du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;

    //=====Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========



    ini_set("SMTP", "smtp.celeste.fr");
    ini_set("sendmail_from", $mail);


    //=====Envoi de l'e-mail.
    mail($mail,$sujet,$message,$header);
    //==========
}
    ?>