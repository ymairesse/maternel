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

$listeDemandes = $Application->listeDemandes($dateLimite);
Application::afficher($listeDemandes);
$smarty->assign('dateLimite', $dateLimite);
$smarty->assign('listeDemandes', $listeDemandes);

$smarty->display('modal/modalListe4date.tpl');
