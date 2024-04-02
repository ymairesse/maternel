<?php

setlocale(LC_ALL, 'fr_FR.utf8');

require_once '../../config.inc.php';

// définition de la class USER utilisée en variable de SESSION
require_once INSTALL_DIR.'/inc/classes/classUser.inc.php';

session_start();

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

// if (!(isset($_SESSION[APPLICATION]))) {
//     exit;
// }

// définition de la class USER utilisée en variable de SESSION
require_once INSTALL_DIR.'/inc/classes/classUser.inc.php';
$User = isset($_SESSION[APPLICATION]) ? $_SESSION[APPLICATION] : Null;

// si pas d'utilisateur authentifié en SESSION et répertorié dans la BD, on renvoie à l'accueil
if ($User == null) {
	header('Location: '.BASEDIR.'/accueil.php');
	exit;
}

$idRV = isset($_GET['idRV']) ? $_GET['idRV'] : Null;

$listeParents = $Application->getListeParents4RV($idRV);
$dateHeure = str_replace(':','h', $Application->getDateRV($idRV));

$dateGeneration = date("d/m/Y");
$heureGeneration = str_replace(':', 'h', date("H:i"));

$chemin = getcwd();

$ds = DIRECTORY_SEPARATOR;
// définition de la classe Smarty
require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
$smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';

$smarty->assign('listeParents', $listeParents);
$smarty->assign('dateHeure', $dateHeure);
$smarty->assign('dateGeneration', $dateGeneration);
$smarty->assign('heureGeneration', $heureGeneration);

$smarty->assign('chemin', $chemin);

$listeParentsPDF = $smarty->fetch('listeParentsPDF.tpl');

require INSTALL_DIR.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('L', 'A4', 'fr', true, 'UTF-8');



// $html2pdf = new Html2Pdf('L','A4','fr');

$html2pdf->WriteHTML($listeParentsPDF);

$fileName = 'listeRVparents_'.$dateHeure['date'].'_'.$dateHeure['heure'].'.pdf';

$html2pdf->Output($fileName, 'D');
