<?php

session_start();

$appli = 'inscriptionMat';

if (isset($_SESSION[$appli])) {

    require_once '../config.inc.php';

    require_once INSTALL_DIR.'/inc/classes/class.Application.php';
    $Application = new Application();

    $formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
    parse_str($formulaire, $form);

    $erreur = 0;

    if ($erreur == 0) {
        // vérification du champ "captcha" du formulaire
        $resultat = $_SESSION[$appli]['captcha'];
        if ($resultat != strtoupper(trim($form['captcha'])))
            $erreur = 1;
        }

    if ($erreur == 0) {
        // tentative d'enregistrement de la demande
        $id = $Application->saveDemande($form);
        // si l'enregistrement ne se passe pas bien, retour avec la valeur 0
        if ($id == 'NA')
            $erreur = 2;
        }

    if ($erreur == 0) {
        // validation de l'adresse mail
        $salut = $form['salut'];
        $mail = $form['mail'];
        $nom = $form['nom'];
        $prenom = $form['prenom'];
        $nomEnfant = $form['nomEnfant'];
        $dateNaissance = $form['dateNaissance'];
        $prenomEnfant = $form['prenomEnfant'];
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL) && $nom != '' && $prenom != '')
            $erreur = 3;
        }

    if ($erreur == 0) {
        // tentative d'envoi de mail
        require_once INSTALL_DIR.'/phpMailer/class.phpmailer.php';
        $leMail = new PHPMailer();

        $leMail->From = "Ne_pas_repondre@isnd.be";
        $leMail->FromName = "Ne pas répondre | ISND - Maternelle";
        $leMail->addBCC('direction.maternelle@isnd.be');
        $leMail->addAddress($mail, sprintf('%s %s', $nom, $prenom));
        $leMail->Subject = 'ISND MATERNEL - Demande d\'inscription';
        $leMail->isHTML(true);

        $data = $Application->getTexteType('confirmation');
        $texte = $data['texte'];

        $texte = str_replace('##salutation##', $salut, $texte);
        $texte = str_replace('##nomParent##', $nom, $texte);
        $texte = str_replace('##prenomParent##', $prenom, $texte);
        
        $texte = str_replace('##nomEnfant##', $nomEnfant, $texte);
        $texte = str_replace('##prenomEnfant##', $prenomEnfant, $texte);
        $texte = str_replace('##dateNaissance##', $dateNaissance, $texte);

        $link = sprintf('https://isnd.be/maternel/inscription/index.php?action=login&id=%s', $id);
        $texte = str_replace('##lien##', sprintf('<a href="'.$link.'">'.$link.'</a>'), $texte);

        $leMail->Body = $texte;
        if ($leMail->Send() != true)
            $erreur = 4;
        }

    switch ($erreur) {
        case 0:
            $message = "Voyez la suite  de la procédure dans le mail que nous venons de vous envoyer à l'instant à l'adresse <a href='maitlo:{$mail}'>".$mail."</a>";
            $message .= "<br>Si vous ne recevez pas ce mail, veuillez vérifier dans les 'Indésirables' et vérifier, une fois encore, l'adresse mail que vous avez indiquée.";
            echo json_encode(array(
                    'erreur' => false,
                    'message' => $message
                    ));
            break;
        case 1:
            $message = 'Si vous n\'êtes pas un robot, veuillez vérifier le résultat de la question de sécurité.';
            echo json_encode(array(
                'erreur' => true,
                'message' => $message
                ));
            break;
        case 2:
            $message = 'Soucis sur la base de données '.$id;
            echo json_encode(array(
                'erreur' => true,
                'message' => $message
                ));
            break;
        case 3:
            echo json_encode(array(
                'erreur' => true,
                'message' => "L'adresse mail que vous avez donnée semble problématique. Nous ne pouvons traiter votre demande."
                ));
            break;
        case 4:
            echo json_encode(array(
                'erreur' => true,
                'message' => 'Problème lors de l\'envoi du mail. Veuillez contacter l\'école par téléphone.'
                ));
            break;
        }

    }
    else echo json_encode(array(
        'erreur' => true,
        'message' => 'Veuillez raffraîchir la page',
        ));
