<?php

session_start();

require_once '../config.inc.php';

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
parse_str($formulaire, $form);

$mail = isset($form['mail']) ? $form['mail'] : Null;
$nom  = isset($form['nom']) ? $form['nom'] : Null;
$prenom  = isset($form['prenom']) ? $form['prenom'] : Null;
$idSection = isset($form['section']) ? $form['section'] : Null;

if (filter_var($mail, FILTER_VALIDATE_EMAIL) && $nom != '' && $prenom != '') {

    $passwd = $Application->randomPasswd(9);
    if ($Application->verifUnknownEmail($mail)) {
        $n = $Application->saveUser($nom, $prenom, $mail, $idSection, $passwd);
        if ($n == 1) {
            require_once INSTALL_DIR.'/phpMailer/class.phpmailer.php';
            $leMail = new PHPMailer();

            $leMail->From = "nepasrepondre@isnd.be";
            $leMail->FromName = "Merci de ne pas 'répondre'";
            $leMail->addAddress($mail, $nom);
            $leMail->Subject = 'Inscription journée pédagogique';
            $leMail->isHTML(true);

            $texte = file_get_contents('../templates/texteMail.html');
            $texte = str_replace('##nom##', $nom, $texte);
            $texte = str_replace('##prenom##', $prenom, $texte);
            $texte = str_replace('##mail##', $mail, $texte);
            $texte = str_replace('##passwd##', $passwd, $texte);
            $leMail->Body = $texte;

            if ($leMail->Send() == false)
                echo "problème lors de l'envoi du mail";
                else echo sprintf("Voyez la suite de la procédure dans le mail que nous venons de vous envoyer à l'adresse %s", $mail);
        }
        else echo "Un problème est survenu durant l'enregistrement de vos données.";
    }
    else echo "Veuillez vous connecter en utilisant le lien qui figure dans le mail que vous avez reçu";
}
else echo "Veuillez fournir toutes les informations demandées";
