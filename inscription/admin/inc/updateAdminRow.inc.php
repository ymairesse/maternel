<?php

session_start();

setlocale(LC_ALL, 'fr_FR.utf8');

require_once '../../config.inc.php';

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$id = isset($_POST['id']) ? $_POST['id'] : Null;
$record = $Application->getRecord($id);

$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';

$smarty->assign('id', $id);
$smarty->assign('record', $record);
$statut = $record['statut'];
$smarty->assign('statut', $statut);
$smarty->assign('listeStatuts', $Application->getListeStatuts());

$smarty->display('inc/rowTableauAdmin.tpl');
