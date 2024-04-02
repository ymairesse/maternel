<?php

session_start();

require_once '../../config.inc.php';

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

// définition de la class USER utilisée en variable de SESSION
require_once INSTALL_DIR.'/inc/classes/classUser.inc.php';

$User = isset($_SESSION[APPLICATION]) ? $_SESSION[APPLICATION] : null;

// si pas d'utilisateur authentifié en SESSION et répertorié dans la BD, on renvoie à l'accueil
if ($User == null) {
    die(Null);
}

echo "ok";