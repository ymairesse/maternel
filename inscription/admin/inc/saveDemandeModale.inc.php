<?php

session_start();

require_once '../../config.inc.php';

require_once INSTALL_DIR.'/inc/classes/class.Application.php';
$Application = new Application();

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
parse_str($formulaire, $form);

$n = $Application->updateDemande($form);
$n += $Application->saveAdmin($form);

$n = ($n > 1) ? 1 : $n;
echo $n;
