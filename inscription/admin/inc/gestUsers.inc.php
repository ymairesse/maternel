<?php

setlocale(LC_ALL, 'fr_FR.utf8');

// configuration de la base de données
require_once '../../config.inc.php';

// définition de la class, y compris la lecture du fichier config.ini
require_once '../../inc/classes/class.Application.php';
$Application = new Application();

// définition de la class USER
require_once '../../inc/classes/classUser.inc.php';

session_start();
// récupération éventuelle du $User
$User = isset($_SESSION[APPLICATION]) ? $_SESSION[APPLICATION] : Null;

// si pas d'utilisateur authentifié en SESSION et répertorié dans la BD, on renvoie à l'accueil
if ($User == NULL) {
	header('Location: '.BASEDIR.'/accueil.php');
	exit;
}

$identite = $User->getIdentite();

$usersList = $Application->getUsersList();

$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';



$smarty->assign('identite', $identite);
$smarty->assign('usersList', $usersList);
$smarty->display('modal/modalGestUsers.tpl');