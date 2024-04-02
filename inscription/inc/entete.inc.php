<?php

setlocale(LC_ALL, 'fr_FR.utf8');

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$action = isset($_GET['action']) ? $_GET['action'] : Null;

$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'templates_c';
