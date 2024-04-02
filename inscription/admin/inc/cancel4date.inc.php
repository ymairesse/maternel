<?php

setlocale(LC_ALL, 'fr_FR.utf8');

// configuration de la base de données
require_once '../../config.inc.php';

// définition de la class, y compris la lecture du fichier config.ini
require_once '../../inc/classes/class.Application.php';
$Application = new Application();

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
parse_str($formulaire, $form);

$nb = 0;
foreach ($form['cbDate'] as $id) {
    $nb += $Application->changeStatut(array($id), 'annule');
}

echo $nb;