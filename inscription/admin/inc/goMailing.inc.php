<?php

setlocale(LC_ALL, 'fr_FR.utf8');

require_once '../../config.inc.php';

// définition de la class USER utilisée en variable de SESSION
require_once INSTALL_DIR.'/inc/classes/classUser.inc.php';

session_start();

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

if (!(isset($_SESSION[APPLICATION]))) {
    exit;
}
$User = $_SESSION[APPLICATION];

$mailFrom = $User->getMail();

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
parse_str($formulaire, $form);

$listeRV = $Application->getDatesRV();

// construction de la liste de mailing
$listeMail = array();
foreach ($form['cb'] as $id){
    $listeMail[$id] = $Application->getRecord($id);
    $idRV = $listeMail[$id]['idRV'];
    $listeMail[$id]['rv'] = $listeRV[$idRV];
}

require_once INSTALL_DIR.'/phpMailer/class.phpmailer.php';
$mailParent = new PHPmailer();

$mailParent->IsHTML(true);
$mailParent->CharSet = 'UTF-8';
$mailParent->Subject = 'Inscription à l\'ISND';

// entête du mail
$dataEntete = $Application->getTexteType('enteteMail');
$entete = $dataEntete['texte'];
$entete = str_replace('##date##', date("d/m/Y"), $entete);

// corps du mail
$data = $Application->getTexteType('invitation');
$texteType = $data['texte'];

// le statut de l'inscription passera en "invitationEnvoyee" si le mail est indiqué comme OK
// voir plus bas "if ($ok) {...}"
$statut = 'invitationEnvoyee';

$listeEnvois = array();
foreach ($listeMail AS $id => $data) {
    $texte = $texteType;
    $mailParent->ClearAddresses();
    $mailParent->From = $User->getMail();
    $mailParent->FromName = 'ISND - Section Maternelle';

    $jour = $data['rv']['date']; $heure = $data['rv']['heure'];

    $texte = str_replace('##salutation##', $data['salutation'], $texte);
    $texte = str_replace('##nomParent##', $data['nomParent'], $texte);
    $texte = str_replace('##prenomParent##', $data['prenomParent'], $texte);
    $texte = str_replace('##date##', $data['date'], $texte);
    $texte = str_replace('##prenomEnfant##', $data['prenomEnfant'], $texte);
    $texte = str_replace('##nomEnfant##', $data['nomEnfant'], $texte);
    $texte = str_replace('##nomClasse##', $data['nomClasse'], $texte);
    $texte = str_replace('##dateRV##', sprintf('%s à %s', $jour, $heure), $texte);
    $link = sprintf(BASEDIR.'/index.php?action=login&id=%s', $id);
    $texte = str_replace('##lien##', sprintf('<a href="'.$link.'">'.$link.'</a>'), $texte);

    $texte = $entete.$texte;

    $mailParent->ClearAddresses();
    $mailParent->AddAddress($data['mail']);
    $mailParent->addBCC($mailFrom);
    $mailParent->Body = $texte;

    $ok = $mailParent->Send();

/**
 * À CORRIGER POUR LA VERSION DÉFINITIVE
 * À CORRIGER POUR LA VERSION DÉFINITIVE
 * À CORRIGER POUR LA VERSION DÉFINITIVE
 */

    if (!$ok){
        $listeEnvois[] = sprintf('Envoyé à %s %s %s -> %s', $data['salutation'], $data['prenomParent'], $data['nomParent'], $data['mail']);
        // changer le statut en "invitationEnvoyee" (voir ligne 45)
        $nb = $Application->changeStatut(array($id), $statut);
        // noter la date de l'envoi dans la table des RV d'inscriptions
        $n = $Application->setDateEnvoiInvitation($id);
    }

/**
 * À CORRIGER POUR LA VERSION DÉFINITIVE
 * À CORRIGER POUR LA VERSION DÉFINITIVE
 * À CORRIGER POUR LA VERSION DÉFINITIVE
 */
    
}

$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';

$smarty->assign('listeEnvois', $listeEnvois);
$smarty->assign('listeMail', $listeMail);

// liste des mails envoyés qui sera affichée dans une bootbox
$smarty->display('listeEnvois.tpl');
