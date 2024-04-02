<?php


setlocale(LC_ALL, 'fr_FR.utf8');

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$action = isset($_GET['action']) ? $_GET['action'] : Null;
if ($action == Null)
    $action = isset($_POST['action']) ? $_POST['action'] : Null;

$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';
