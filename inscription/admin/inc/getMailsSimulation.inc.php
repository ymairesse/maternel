<?php

session_start();

setlocale(LC_ALL, 'fr_FR.utf8');

require_once '../../config.inc.php';


require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$listeReady = $Application->getInscriptionBystatut('rvInscription');

$listeRV = $Application->getDatesRV();

$dataEntete = $Application->getTexteType('enteteMail');
$entete = $dataEntete['texte'];
$entete = str_replace('##date##', date("d/m/Y"), $entete);

$texteMails = '';
$data = $Application->getTexteType('invitation');
$texteType = $data['texte'];

foreach ($listeReady AS $idInscription => $data) {
    $texte = $texteType;
    $id = $data['id'];
    $idRV = $data['idRV'];
    $dateRV = $listeRV[$idRV];
    $jour = $dateRV['date']; $heure = $dateRV['heure'];
    
    $texte = str_replace('##salutation##', $data['salutation'], $texte);
    $texte = str_replace('##nomParent##', $data['nomParent'], $texte);
    $texte = str_replace('##prenomParent##', $data['prenomParent'], $texte);
    $texte = str_replace('##date##', $data['date'], $texte);
    $texte = str_replace('##prenomEnfant##', $data['prenomEnfant'], $texte);
    $texte = str_replace('##nomEnfant##', $data['nomEnfant'], $texte);
    $texte = str_replace('##nomClasse##', $data['nomClasse'], $texte);
    $texte = str_replace('##dateRV##', sprintf('%s à %s', $jour, $heure), $texte);
    $link = sprintf(BASEDIR.'/index.php?action=login&id=%s', $id);
    $texte = str_replace('##lien##', sprintf('<a href="'.$link.'">'.$link.'</a>'), $texte);
    $texteMails .= $entete.$texte;
}

$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';

$smarty->assign('listeRV', $listeRV);
$smarty->assign('texteMails', $texteMails);
$smarty->assign('listeReady', $listeReady);

$smarty->display('modal/modalSimulation.tpl');
