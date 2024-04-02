<?php

session_start();

setlocale(LC_ALL, 'fr_FR.utf8');

require_once '../../config.inc.php';


require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$idInscription = isset($_POST['idInscription']) ? $_POST['idInscription'] : Null;
$idRV = isset($_POST['idRV']) ? $_POST['idRV'] : Null;

// suppression du RV
$nb = $Application->delRV($idInscription, $idRV);
// mise à jour du statut
$idInscription = array($idInscription => $idInscription);
$nb = $Application->changeStatut($idInscription, $statut);

echo $nb;
