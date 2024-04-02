<?php

session_start();

require_once '../../config.inc.php';

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
parse_str($formulaire, $form);

$ids = isset($form['id']) ? $form['id'] : Null;
$idRV = isset($form['idRV']) ? $form['idRV'] : Null;

$nb = $Application->saveAcceptation($ids, $idRV);
if ($nb > 0) {
    $nb = $Application->changeStatut($ids, 'rvInscription');
}

echo $nb;
