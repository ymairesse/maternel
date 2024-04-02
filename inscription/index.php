<?php

session_start();

require_once('config.inc.php');

require_once('inc/entete.inc.php');

$appli = 'inscriptionMat';

// suppression des demandes trop anciennes (48h)
$n = $Application->cleanDemandes(48);

$action = isset($_GET['action']) ? $_GET['action'] : Null;

switch ($action){
    case 'login':
        $id = isset($_GET['id']) ? $_GET['id'] : Null;

        $record = $Application->getRecord($id);

        if ($record != false) {
            $statut = ($record['statut'] == '') ? 'Attente de confirmation' : 'Demande confirmée';
            $smarty->assign('statut', $statut);
            $smarty->assign('record', $record);
            $smarty->assign('corpsPage', 'confirmation');
        }
        else $smarty->assign('corpsPage', 'erreurDemande');
        break;

    default:
        $Application->setSessionCaptcha($appli);
        $smarty->assign('calcul', $_SESSION[$appli]['nombre1'].$_SESSION[$appli]['operation'].$_SESSION[$appli]['nombre2']);

        $smarty->assign('corpsPage', 'inscription');

}


$smarty->display ('index.tpl');
