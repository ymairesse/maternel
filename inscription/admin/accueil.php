<?php

require_once '../config.inc.php';

// définition de la class USER
require_once '../inc/classes/classUser.inc.php';
session_start();
//
// if (!(isset($_SESSION['APPLICATION']))) {
//
// }
//
// $User = $_SESSION['APPLICATION'];

require_once '../smarty/Smarty.class.php';
$smarty = new Smarty();


// toutes les informations d'identification réseau (adresse IP, jour et heure)
$smarty->assign('identification', user::identification());

$smarty->display('accueil.tpl');
