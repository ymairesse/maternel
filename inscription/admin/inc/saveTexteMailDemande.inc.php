<?php

session_start();

setlocale(LC_ALL, 'fr_FR.utf8');

require_once '../../config.inc.php';

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$texteType = isset($_POST['texteType']) ? $_POST['texteType'] : Null;

$nb = file_put_contents('../templates/lettres/corpsAccepte.html', $texteType);

echo $nb;
