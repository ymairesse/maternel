<?php

session_start();

require_once '../../config.inc.php';

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
parse_str($formulaire, $form);

$dateRV = isset($form['dateRV']) ? $form['dateRV'] : Null;

$dateRV = Application::dateMySQL($dateRV);
$heureRV = isset($form['heureRV']) ? $form['heureRV'] : Null;
$nbPlaces = isset($form['nbPlaces']) ? $form['nbPlaces'] : Null;
$nbMin = isset($form['nbMin']) ? $form['nbMin'] : Null;
$id = isset($form['id']) ? $form['id'] : Null;

if ($nbPlaces >= $nbMin) {
    $nb = $Application->setDateRV($dateRV, $heureRV, $nbPlaces, $id);

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

    $smarty->display('inc/tableauModalDatesRV.tpl');
}
else echo 'erreur';
