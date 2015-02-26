<?php
if(!isset($source)) $source = $_SERVER['DOCUMENT_ROOT']."/";

function signmail($pseudo,$firstname,$email,$cle){

    global $source;

    ob_start(); // turn on output buffering
    include($source.'template/signmail.tpl');
    $res = ob_get_contents(); // get the contents of the output buffer
    ob_end_clean(); //  clean (erase) the output buffer and turn off output buffering





    $mail = $email; // Déclaration de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(gmail|hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
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

    require_once($source.'controller/mailer/PHPMailerAutoload.php');

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.pinnackl.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'noreply@pinnackl.com';                 // SMTP username
    $mail->Password = 'Icge0ylb!';                           // SMTP password
    // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->From = 'noreply@pinnackl.com';
    $mail->FromName = 'Pinnackl.com';
    $mail->addAddress($email);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('pinnackl.work@gmail.com', 'Information');
    // $mail->addCC('pinnackl.work@gmail.com');
    // $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    // //=====Création du header de l'e-mail.
    // $header = "From: \"Pinnackl\"<pinnakle.work@gmail.com>".$passage_ligne;
    // $header.= "Disposition-Notification-To: \"Pinnackl\"<pinnakle.work@gmail.com>".$passage_ligne;
    // $header.= "MIME-Version: 1.0".$passage_ligne;
    // $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    // //==========

    //=====Création du message.
    // $message = $passage_ligne."--".$boundary.$passage_ligne;

    //=====Ajout du message au format HTML
    // $message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
    // $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message= $passage_ligne.$message_html.$passage_ligne;
    //==========
    // $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    // $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========



    // ini_set("SMTP", "smtp.numericable.fr");
    // ini_set("sendmail_from", $mail);


    // //=====Envoi de l'e-mail.
    // mail($mail,$sujet,$message,$header);
    // //==========

    $mail->Subject = $sujet;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    if(!$mail->send()) {
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    // echo 'Message has been sent';
    }
}
?>