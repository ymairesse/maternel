<?php

session_start();
require_once '../config.inc.php';

// définition de la class APPLICATION
require_once '../inc/classes/class.Application.php';
$Application = new Application();


// définition de la class USER
require_once '../inc/classes/classUser.inc.php';

// extraire l'identifiant et le mot de passe
// l'identifiant est passé en majuscules => casse sans importance
$acronyme = isset($_POST['acronyme']) ? strtoupper($_POST['acronyme']) : null;
$mdp = isset($_POST['mdp']) ? $_POST['mdp'] : null;

// Les données acronyme et mdp ont été postées dans le formulaire de la page accueil.php
if (!empty($acronyme) && !empty($mdp)) {
    // recherche de toutes les informations sur l'utilisateur et les applications activées
    $user = new user($acronyme);

    $identification = $user->identification();

    // vérification du mot de passe
    if ($user->getPasswd() == md5($mdp)) {
        // mettre à jour la session avec les infos de l'utilisateur
        $_SESSION[APPLICATION] = $user;

        header('Location: index.php');
        exit;
    }
}
