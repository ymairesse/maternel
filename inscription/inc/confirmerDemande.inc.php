<?php

session_start();

require_once '../config.inc.php';

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$id = isset($_POST['id']) ? $_POST['id'] : Null;
// enregistrement définitif de la demande (adresse mail confirmée)
$nb = $Application->confirmerDemande($id);

echo $nb;
