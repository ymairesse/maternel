<?php

session_start();

setlocale(LC_ALL, 'fr_FR.utf8');

require_once '../../config.inc.php';

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';

$textName = isset($_POST['textName']) ? $_POST['textName'] : Null;
$title = isset($_POST['title']) ? $_POST['title'] : Null;

$dataTexte = $Application->getTexteType($textName);

$title = $dataTexte['title'];
$texteType = $dataTexte['texte'];

$inserts = $Application->getInserts4Type($textName);

$smarty->assign('textName', $textName);
$smarty->assign('texteType', $texteType);
$smarty->assign('title', $title);
$smarty->assign('inserts', $inserts);

$smarty->display('modal/modalTexteType.tpl');
