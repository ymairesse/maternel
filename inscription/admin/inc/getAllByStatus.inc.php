<?php

session_start();

setlocale(LC_ALL, 'fr_FR.utf8');

require_once '../../config.inc.php';


require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$status = isset($_POST['status']) ? $_POST['status'] : Null;

$listToDelete = $Application->getAllByStatus($status);

$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';

$smarty->assign('status', $status);
$smarty->assign('listToDelete', $listToDelete);

$smarty->display('modal/modalDelByStatus.tpl');
