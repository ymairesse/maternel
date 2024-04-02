<?php

session_start();

setlocale(LC_ALL, 'fr_FR.utf8');

require_once '../../config.inc.php';


require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$idRV = isset($_POST['idRV']) ? $_POST['idRV'] : Null;

$nb = $Application->delDateRV($idRV);

echo $nb;
