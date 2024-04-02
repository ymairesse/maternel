<?php

session_start();

setlocale(LC_ALL, 'fr_FR.utf8');

require_once '../../config.inc.php';


require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$dateLimite = isset($_POST['dateLimite']) ? $_POST['dateLimite'] : Null;

$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';

$nb = $Application->annuleDemandes($dateLimite);

// rafraîchir le tableau
$listeDemandes = $Application->getDemandes();
$smarty->assign('listeDemandes', $listeDemandes);

$listeStatuts = $Application->getListeStatuts();
$smarty->assign('listeStatuts', $listeStatuts);

$smarty->display('inc/allRowsTableauAdmin.tpl');
