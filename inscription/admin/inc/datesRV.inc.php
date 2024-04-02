<?php

setlocale(LC_ALL, 'fr_FR.utf8');

// configuration de la base de données
require_once '../../config.inc.php';

// définition de la class, y compris la lecture du fichier config.ini
require_once '../../inc/classes/class.Application.php';
$Application = new Application();




$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
parse_str($formulaire, $form);

// recharger les dates de RV
$datesRV = $Application->getDatesRV();
$datesAvecRV = $Application->getDatesAvecRV();
$nbRV4date = $Application->getNbRV4dates();

$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';


$smarty->assign('datesRV', $datesRV);
$smarty->assign('datesAvecRV', $datesAvecRV);
$smarty->assign('nbRV4date', $nbRV4date);

$smarty->display('modal/modalDatesRV.tpl');
