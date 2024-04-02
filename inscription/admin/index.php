<?php

require_once('../config.inc.php');

require_once('inc/entete.inc.php');

// définition de la class USER utilisée en variable de SESSION
require_once INSTALL_DIR.'/inc/classes/classUser.inc.php';
$user = isset($_SESSION[APPLICATION]) ? $_SESSION[APPLICATION] : Null;

if (!isset($user)) {
    header ("Location: accueil.php");
    }
    else {
        $ds = DIRECTORY_SEPARATOR;
        // définition de la classe Smarty
        require_once INSTALL_DIR.$ds.'smarty/Smarty.class.php';
        $smarty = new Smarty();
        $smarty->template_dir = INSTALL_DIR.$ds.'admin/templates';
        $smarty->compile_dir = INSTALL_DIR.$ds.'admin/templates_c';

        $listeDemandes = $Application->getDemandes();
        $smarty->assign('listeDemandes', $listeDemandes);

        $listeStatuts = $Application->getListeStatuts();
        $smarty->assign('listeStatuts', $listeStatuts);

        $identite = $user->getIdentite();
        $smarty->assign('identite', $identite);
        $smarty->assign('corpsPage', 'admin');

        $smarty->display ('index.tpl');
    }
