<?php

session_start();

require_once '../../config.inc.php';

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
parse_str($formulaire, $form);

$listeSelection = array();
foreach ($form['selection'] as $id) {
    $listeSelection[$id] = $Application->getRecord($id);
    }

$datesRV = $Application->getDatesRV();

$listeRVpris = $Application->getNbRV4dates();


$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';

$smarty->assign('listeSelection', $listeSelection);
$smarty->assign('datesRV', $datesRV);
$smarty->assign('listeRVpris', $listeRVpris);

$smarty->display('modal/modalTraitement.tpl');
